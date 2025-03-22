<?php

namespace App\Http\Controllers;

use App\Models\Admin\Uniform;
use App\Models\Admin\Registered;
use DataTables;
 
use Illuminate\Http\Request;

class UniformController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {


  


         if ($request->ajax()) {
 
             
            $data = Registered::join('uniforms', 'uniforms.registerd_id', '=', 'registereds.id')
            -> join('branches', 'branches.id', '=', 'registereds.branch_id')
            -> join('academies', 'academies.id', '=', 'registereds.academy_id')
     
       
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


 



        return view('admin.uniform.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'registerd_id' => 'required',
            'size' => 'required',
    

         ]);

       
    


          $registered =  Uniform::create($request->all());

          
        return redirect('student'.'/'.$request->registerd_id)
        ->with('success','Uniform created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Uniform  $uniform
     * @return \Illuminate\Http\Response
     */
    public function show(Uniform $uniform)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Uniform  $uniform
     * @return \Illuminate\Http\Response
     */
    public function edit(Uniform $uniform)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Uniform  $uniform
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) 
    {
        $request->validate([
            'branch_id' => 'required',
            'academy_id' => 'required',
            'registerd_id' => 'required',
 
 

          ]);
          $uniform = Uniform::find($id);
          $uniform->branch_id = $request->branch_id;

          $uniform->academy_id = $request->academy_id;
          $uniform->registerd_id = $request->registerd_id;
          $uniform->size = $request->size;
           $uniform->amount = $request->amount;
          $uniform->order_date = $request->order_date;
          $uniform->branch_status = $request->branch_status;

          $uniform->office_status = $request->office_status;
          $uniform->p_method = $request->p_method;

          $uniform->note = $request->note;


          $uniform->save();
 

  
         
          return redirect('student'.'/'.$request->registerd_id)
          ->with('success','uniform updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Uniform  $uniform
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, $id)
    {
        $uniform = Uniform::find($id);
  
        $uniform->delete();
           
           
        return redirect('student'.'/'.$request->registerd_id)
        ->with('danger','uniform deleted successfully.');
     }
}
