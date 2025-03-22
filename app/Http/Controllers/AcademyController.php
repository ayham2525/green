<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Admin\Academy;
use App\Models\Admin\Branches;
use App\Models\Admin\Programs;
use App\Models\Admin\Registered;
use DataTables;
use Carbon\Carbon;
use DB;





use Monarobase\CountryList\CountryListFacade;



class AcademyController extends Controller
{



 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academys = Academy::all();
        $branch = Branches::all();





   
       return view('admin.academy.index',compact('academys' , 'branch' ));
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
            'academy_name' => 'required',

         ]);
    
         Academy::create($request->all());

 
 

     
        return redirect()->route('academy.index')
         ->with('success','academy created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Request  $request , $id)
    {



              
 $active = Registered::join('instalments', 'instalments.registerd_id', '=', 'registereds.id')
    ->join('branches', 'branches.id', '=', 'registereds.branch_id')
    ->join('academies', 'academies.id', '=', 'registereds.academy_id')
    ->join('programs', 'programs.academy_id', '=', 'academies.id')
    ->select([
        'registereds.*', 
        'instalments.end_date', 
        'instalments.statues', 
        'branches.branch_name', 
        'academies.academy_name', 
        'instalments.start_date', 
        'instalments.end_date', 
        'instalments.start_time', 
        'instalments.end_time', 
        'instalments.registerd_id'
    ])
    ->where('registereds.academy_id', '=', $id)
    ->where('instalments.statues', '=', 'active')
    ->orderBy('instalments.id', 'desc') // ترتيب حسب instalments.id نزولا
    ->get()
    ->unique()
    ->count(); // احسب العدد


		
$expired = Registered::join(DB::raw('(SELECT MAX(id) as max_id, registerd_id FROM instalments GROUP BY registerd_id) as latest_instalment'), 'latest_instalment.registerd_id', '=', 'registereds.id')
    ->join('instalments', 'instalments.id', '=', 'latest_instalment.max_id') // الانضمام إلى آخر دفعة فقط
    ->where('instalments.statues', '!=', 'active') // استبعاد الدفعات التي حالتها "active"
    ->where('registereds.academy_id', '=', $id) // جلب المشتركين في الأكاديمية المحددة
    ->count(); // حساب العدد
		
        $today = Carbon::today();
  

		
		

        
        
        if ($request->ajax()) {
 
       

            $today = Carbon::today();
       
            $data = Registered::join('instalments', 'instalments.registerd_id', '=', 'registereds.id')
            -> join('branches', 'branches.id', '=', 'registereds.branch_id')
            -> join('academies', 'academies.id', '=', 'registereds.academy_id')
            -> join('programs', 'programs.academy_id', '=', 'academies.id')
    
             ->select(array('registereds.*','instalments.end_date' , 'instalments.statues' ,'branches.branch_name', 
             'academies.academy_name' ,'instalments.start_date' ,'instalments.end_date'  , 'instalments.start_time' , 'instalments.end_time' ,
              'instalments.registerd_id') )
             ->where( 'registereds.academy_id' , '=' ,$id)
     
             ->orderBy('instalments.id')
             ->latest('instalments.id')
             ->get()->unique(); 
            
               
        
             return Datatables::of($data)
             ->addIndexColumn()
             ->addColumn('action', function($data){

                $actionBtn = '<a href="'.url('student',$data->id).'" class="edit btn btn-success btn-sm">Edit</a>';

                     return $actionBtn;
             })
             ->rawColumns(['action'])
             ->make(true);
 }


 
        

        $countries = CountryListFacade::getList('en');
        $academy = Academy::find($id);
         $academy_program = Academy::with('program')->find($id);


         
         $nopay = Registered::leftJoin('instalments', 'instalments.registerd_id', '=', 'registereds.id')
     
         -> join('academies', 'academies.id', '=', 'registereds.academy_id')
         -> join('programs', 'programs.academy_id', '=', 'academies.id')

          ->whereNull('instalments.registerd_id')
          ->where( 'registereds.academy_id' , '=' ,$id)
          ->select('registereds.id' , 'registereds.name' , 'registereds.email', 'registereds.reg_date', 'registereds.phone','programs.programe_name' , 'registereds.birth_date')

             ->get();

            

        
 
 
        
 
 
    
 
  
        return view('admin.academy.show',compact('academy' , 'academy_program','countries' , 'active' , 'expired' ,'nopay'))->with('data', ['academy' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Academy $academys , $id)
    {
        $request->validate([
            'branch_id' => 'required',
            'academy_name' => 'required',
          ]);
          $academys = Academy::find($id);
          $academys->academy_name = $request->academy_name;
          $academys->branch_id = $request->branch_id;

          $academys->save();
 

  
     
        return redirect()->route('academy.index')
        ->with('success','academy updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $academy = Academy::find($id);

        $academy->delete();
        return redirect()->back()->with('error','Data Deleted');
    }
}
