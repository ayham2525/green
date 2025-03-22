<?php

namespace App\Http\Controllers;

use App\Models\Admin\Branches;
use App\Models\Admin\Academy;
 use App\Models\Admin\Programs;
use App\Models\Admin\Registered;
use DataTables;
use DB;
use Carbon\Carbon;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branches::all();
   

    
        return view('admin.branch.index',compact('branches'));
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
            'branch_name' => 'required',
         ]);
    
        Branches::create($request->all());
     
        return redirect()->route('branch.index')
         ->with('success','branch created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Branches  $branches
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request , $id )
    {



        


 
  
        DB::table('instalments')->whereDate('end_date', '>', now())->update(['statues' => 'active']);
        DB::table('instalments')->whereDate('end_date', '<', now())->update(['statues' => 'expired']);

        
        if ($request->ajax()) {
 
              $data = Registered::join('instalments', 'instalments.registerd_id', '=', 'registereds.id')
            -> join('branches', 'branches.id', '=', 'registereds.branch_id')
            -> join('academies', 'academies.id', '=', 'registereds.academy_id')
            -> join('programs', 'programs.academy_id', '=', 'academies.id')
    
            ->select(array('registereds.*','instalments.end_date' , 'instalments.statues' ,'instalments.amount' ,'branches.branch_name', 'academies.academy_name' ,'instalments.start_date' ,'instalments.end_date'  , 'instalments.start_time' , 'instalments.end_time' , 'instalments.registerd_id') )
            ->where( 'registereds.branch_id' , '=' ,$id)
     
             ->orderBy('instalments.id')
             ->latest('instalments.id')
             ->get()->unique(); 


             

             return Datatables::of($data)
             ->addIndexColumn()
             ->addColumn('action', function($data){

                $actionBtn = '<a href="'.url('student',$data->id).'" class="edit btn btn-success btn-sm">Edit</a>
                 ';

                     return $actionBtn;
             })
             ->rawColumns(['action'])
             ->make(true);
 }
 
         $branches = Branches::with('academy')->find($id);


        return view('admin.branch.show' ,compact('branches'))->with('data', ['branch' => $id] ) ;




  
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Branches  $branches
     * @return \Illuminate\Http\Response
     */
    public function edit(Branches $branches)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Branches  $branches
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branches $branches , $id)
    {
        $request->validate([
            'branch_name' => 'required',
         ]);


         $branches = Branches::find($id);
         $branches->branch_name = $request->branch_name;
         $branches->save();


    
     
        return redirect()->route('branch.index')
        ->with('success','branch updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Branches  $branches
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branches $branches , $id)
    {
   

        $branches = Branches::find($id);

         $branches->delete();
         return redirect()->back()->with('error','Data Deleted');

    
 
    }
}
