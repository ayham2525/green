<?php

namespace App\Http\Controllers;
use DataTables;
use App\Models\Admin\Registered;
use App\Models\Admin\Instalment;
use App\Models\Admin\Programs;
use App\Models\Admin\Academy;


use App\Models\Admin\Uniform;
use DB;
use Carbon\Carbon;
use Monarobase\CountryList\CountryListFacade;



use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function active(Request $request , $branch , $academy)
    {

    


        if ($request->ajax()) {
 
             
            $today = Carbon::today();


        $data = Registered::join('branches', 'branches.id', '=', 'registereds.branch_id')
        ->join('academies', 'academies.id', '=', 'registereds.academy_id')
        ->join('instalments', 'registereds.id', '=', 'instalments.registerd_id')

         ->where(  'registereds.branch_id' , '=' ,$branch)
        ->where(  'registereds.academy_id' , '=' , $academy)
          ->get();
 


        
             return Datatables::of($data)
             ->addIndexColumn()
             ->addColumn('action', function($data){

                $actionBtn = '<a href="'.url('student',$data->registerd_id).'" class="edit btn btn-success btn-sm">Edit</a>
                 ';

                     return $actionBtn;
             })
             ->rawColumns(['action'])
             ->make(true);
 }
 
 

        return view('admin.student.index')->with('data', ['branch' => $branch, 'academy' => $academy] ) ;
             
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.student.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


         $request->validate([
            'branch_id' => 'required',
            'academy_id' => 'required',
            'programe_id' => 'required',
            'name' => 'required',
            'nationality' => 'required',
            'birth_date' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'reg_date' => 'required',


         ]);
    
         $registered =  Registered::create($request->all());

          $id = $registered->id ;
        return redirect('student'.'/'.$id)
         ->with('success','Student created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $registered =   Registered::find($id);
      $payments =   Registered::with('payment_student')->find($id);
      $uniform =   Registered::with('uniform_student')->find($id);
      $attend =   Registered::with('attendance_student')->find($id);

      $countries = CountryListFacade::getList('en');
      $academy_id = $registered->academy_id ;
		
		      $payment =     $registered->payment_student()->latest()->first();
	 
		

 
      $allprograme = Academy::with('program')->where('id'  , '=' , $academy_id)->get();
 
  
 
   
         return view('admin.student.profile' , compact('registered' , 'payment',  'payments' , 'uniform' , 'countries' , 'allprograme' , 'attend'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Registered $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {



        $request->validate([
            'branch_id' => 'required',
            'academy_id' => 'required',
 
 


         ]);

           $registered = Registered::find($id);
          $registered->branch_id = $request->branch_id;
          $registered->programe_id = $request->programe_id;

 
          $registered->academy_id = $request->academy_id;
          $registered->name = $request->name;
          $registered->nationality = $request->nationality;
           $registered->birth_date = $request->birth_date;
          $registered->phone = $request->phone;
          $registered->reg_date = $request->reg_date;

          $registered->email = $request->email;
          $registered->address = $request->address;
        
        
          $registered->save();


          
         
          return redirect('student'.'/'.$registered->id)
          ->with('success','student updated successfully.');
        } 
     



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\student  $student
     * @return \Illuminate\Http\Response
     */
     public function destroy(Registered $student , Request $request)
    {

      

 
 
        $student->delete();
        $url = $request->academy_id;
        return redirect('academy'.'/'.$url)
        ->with('success','student deleted successfully.');  
    
    
    
    }
}
