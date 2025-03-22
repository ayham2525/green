<?php

namespace App\Http\Controllers;

use App\Models\Admin\Instalment;
use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PaymobController;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
       
    public function index(Request $request)
    {
        // Update statues based on end_date
        DB::table('instalments')->whereDate('end_date', '>', now())->update(['statues' => 'active']);
        DB::table('instalments')->whereDate('end_date', '<', now())->update(['statues' => 'expired']);

        // Return JSON if AJAX request (DataTables)
        if ($request->ajax()) {
            $data = DB::table('instalments')
                ->join('registereds', 'registereds.id', '=', 'instalments.registerd_id')
                ->join('branches', 'branches.id', '=', 'instalments.branch_id')
                ->join('academies', 'academies.id', '=', 'instalments.academy_id')
                ->select([
                    'instalments.id',
                    'instalments.registerd_id',
                    'registereds.name',
                    'branches.branch_name as branch_name',
                    'academies.academy_name as academy_name',
                    'instalments.payment_date',
                    'instalments.amount',
                    'instalments.pay_method',
                    'instalments.start_date',
                    'instalments.end_date',
                    'instalments.statues',
                ])
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<a href="' . url('student', $row->registerd_id) . '" class="btn btn-sm btn-info">Show</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        // Return view for the page
        return view('admin.payments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.payments.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $PaymobController = new PaymobController();
        
          $request->validate([
            'branch_id' => 'required',
            'academy_id' => 'required',
            'registerd_id' => 'required',
            'amount' => 'required',
            'payment_date' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
 
         ]);

     


          $registered =  Instalment::create($request->all());

          if ($request->pay_method == 45639 || $request->pay_method == 45648 || $request->pay_method == 46230 ) {
          

             $paymentLink = $PaymobController->createPaymentLink($request->amount , $request->registerd_name , $request->registerd_email, $request->phone_number ,[$request->pay_method] );
		 
            return redirect('student'.'/'.$request->registerd_id)
            ->with('success',  $paymentLink );   
  
          }

        
          
        return redirect('student'.'/'.$request->registerd_id)
        ->with('success','payment created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Instalment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Instalment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id) 
    {
        $request->validate([
            'branch_id' => 'required',
            'academy_id' => 'required',
            'registerd_id' => 'required',
 
 

          ]);
          $payment = Instalment::find($id);
          $payment->branch_id = $request->branch_id;

          $payment->academy_id = $request->academy_id;
          $payment->registerd_id = $request->registerd_id;


          $payment->payment_date = $request->payment_date;
           $payment->start_date = $request->start_date;
          $payment->end_date = $request->end_date;
          $payment->status_student = $request->status_student;


          $payment->amount = $request->amount;

          $payment->discount = $request->discount;
          $payment->still = $request->still;

          $payment->pay_method = $request->pay_method;
          $payment->note = $request->note;
          $payment->start_time = $request->start_time;
          $payment->end_time = $request->end_time;
		
		
		




          $payment->save();

          
  
         
          return redirect('student'.'/'.$request->registerd_id)
          ->with('success','payment updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id)
    {
        $payment = Instalment::find($id);

        $payment->delete();
        return redirect()->back()->with('error','Data Deleted');
    }
}
