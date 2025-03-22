<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Branches;
use App\Models\Admin\Programs;

use App\Models\Admin\Academy;
use App\Models\Admin\Instalment;
use App\Models\Admin\Registered;
use App\Models\Admin\Uniform;










class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $branch = Branches::with('academy')->get();
 

        return view('admin.report.report' , compact('branch'));
    }


    
    


    public function getAcademyByBranch($branch_id)
    {
        $academy = Academy::where('branch_id', $branch_id)->get();
    
        return response()->json(['academy' => $academy]);
    }


    public function getTotalIncome(Request $request)
    {

        if($request->branch_id && $request->academy_id && $request->from_date=='' && $request->to_date==''  )
        {

            $invoices = Instalment::join('registereds', 'registereds.id', '=', 'instalments.registerd_id')
            ->join('branches', 'branches.id', '=', 'instalments.branch_id')
            ->join('academies', 'academies.id', '=', 'instalments.academy_id')
            ->where('instalments.branch_id' , '=' , $request->branch_id )->where('instalments.academy_id' , '=' , $request->academy_id )
                ->get();

                $amount = Instalment::join('registereds', 'registereds.id', '=', 'instalments.registerd_id')
                ->join('branches', 'branches.id', '=', 'instalments.branch_id')
                ->join('academies', 'academies.id', '=', 'instalments.academy_id')
                ->where('instalments.branch_id' , '=' , $request->branch_id )->where('instalments.academy_id' , '=' , $request->academy_id )
                ->sum('instalments.amount');


                $card = Instalment::join('registereds', 'registereds.id', '=', 'instalments.registerd_id')
                ->join('branches', 'branches.id', '=', 'instalments.branch_id')
                ->join('academies', 'academies.id', '=', 'instalments.academy_id')
                ->where('instalments.branch_id' , '=' , $request->branch_id )
                ->where('instalments.academy_id' , '=' , $request->academy_id )
                ->where('instalments.pay_method' , '=' , 'card')
                ->sum('instalments.amount');


                $cash = Instalment::join('registereds', 'registereds.id', '=', 'instalments.registerd_id')
                ->join('branches', 'branches.id', '=', 'instalments.branch_id')
                ->join('academies', 'academies.id', '=', 'instalments.academy_id')
                ->where('instalments.branch_id' , '=' , $request->branch_id )
                ->where('instalments.academy_id' , '=' , $request->academy_id )
                ->where('instalments.pay_method' , '=' , 'cash')
                ->sum('instalments.amount');


                $online = Instalment::join('registereds', 'registereds.id', '=', 'instalments.registerd_id')
                ->join('branches', 'branches.id', '=', 'instalments.branch_id')
                ->join('academies', 'academies.id', '=', 'instalments.academy_id')
                ->where('instalments.branch_id' , '=' , $request->branch_id )
                ->where('instalments.academy_id' , '=' , $request->academy_id )
                ->where('instalments.pay_method' , '=' , 'online')
                ->sum('instalments.amount');


                
 

            $branch = Branches::with('academy')->get();

            return view('admin.report.report' , compact('invoices' , 'branch' ,'amount' , 'card' , 'cash' , 'online'))->withDetails($invoices);

        }

        else{
            $from_date = date($request->from_date);
            $to_date = date($request->to_date);
            $branch_id = $request->branch_id ;
            $academy_id = $request->academy_id ;
            $branch = Branches::with('academy')->get();


            $invoices = Instalment::join('registereds', 'registereds.id', '=', 'instalments.registerd_id')
            ->join('branches', 'branches.id', '=', 'instalments.branch_id')
            ->join('academies', 'academies.id', '=', 'instalments.academy_id')
            ->whereBetween('instalments.payment_date',[$from_date,$to_date])
            ->where('instalments.branch_id','=',$request->branch_id)->where('instalments.academy_id','=',$request->academy_id)->get();



            $amount = Instalment::join('registereds', 'registereds.id', '=', 'instalments.registerd_id')
            ->join('branches', 'branches.id', '=', 'instalments.branch_id')
            ->join('academies', 'academies.id', '=', 'instalments.academy_id')
            ->whereBetween('instalments.payment_date',[$from_date,$to_date])
            ->where('instalments.branch_id','=',$request->branch_id)
            ->where('instalments.academy_id','=',$request->academy_id)
            ->sum('instalments.amount');



            $card = Instalment::join('registereds', 'registereds.id', '=', 'instalments.registerd_id')
            ->join('branches', 'branches.id', '=', 'instalments.branch_id')
            ->join('academies', 'academies.id', '=', 'instalments.academy_id')
            ->whereBetween('instalments.payment_date',[$from_date,$to_date])

            ->where('instalments.branch_id' , '=' , $request->branch_id )
            ->where('instalments.academy_id' , '=' , $request->academy_id )
            
            ->where('instalments.pay_method' , '=' , 'card')
            ->sum('instalments.amount');


            $cash = Instalment::join('registereds', 'registereds.id', '=', 'instalments.registerd_id')
            ->join('branches', 'branches.id', '=', 'instalments.branch_id')
            ->join('academies', 'academies.id', '=', 'instalments.academy_id')
            ->whereBetween('instalments.payment_date',[$from_date,$to_date])

            ->where('instalments.branch_id' , '=' , $request->branch_id )
            ->where('instalments.academy_id' , '=' , $request->academy_id )
            ->where('instalments.pay_method' , '=' , 'cash')
            ->sum('instalments.amount');


            $online = Instalment::join('registereds', 'registereds.id', '=', 'instalments.registerd_id')
            ->join('branches', 'branches.id', '=', 'instalments.branch_id')
            ->join('academies', 'academies.id', '=', 'instalments.academy_id')
            ->whereBetween('instalments.payment_date',[$from_date,$to_date])

            ->where('instalments.branch_id' , '=' , $request->branch_id )
            ->where('instalments.academy_id' , '=' , $request->academy_id )
            ->where('instalments.pay_method' , '=' , 'online')
            ->sum('instalments.amount');


            $uniform_incom = Uniform::join('registereds', 'registereds.id', '=', 'uniforms.registerd_id')
            ->join('branches', 'branches.id', '=', 'uniforms.branch_id')
            ->join('academies', 'academies.id', '=', 'uniforms.academy_id')
            ->whereBetween('uniforms.order_date',[$from_date,$to_date])

            ->where('uniforms.branch_id' , '=' , $request->branch_id )
            ->where('uniforms.academy_id' , '=' , $request->academy_id )
             ->sum('uniforms.amount');



             $uniform_incom_card = Uniform::join('registereds', 'registereds.id', '=', 'uniforms.registerd_id')
             ->join('branches', 'branches.id', '=', 'uniforms.branch_id')
             ->join('academies', 'academies.id', '=', 'uniforms.academy_id')
             ->whereBetween('uniforms.order_date',[$from_date,$to_date])
 
             ->where('uniforms.branch_id' , '=' , $request->branch_id )
             ->where('uniforms.academy_id' , '=' , $request->academy_id )

             ->where('uniforms.p_method' , '=' , 'card')

              ->sum('uniforms.amount');
  



              $uniform_incom_cash = Uniform::join('registereds', 'registereds.id', '=', 'uniforms.registerd_id')
              ->join('branches', 'branches.id', '=', 'uniforms.branch_id')
              ->join('academies', 'academies.id', '=', 'uniforms.academy_id')
              ->whereBetween('uniforms.order_date',[$from_date,$to_date])
  
              ->where('uniforms.branch_id' , '=' , $request->branch_id )
              ->where('uniforms.academy_id' , '=' , $request->academy_id )
              ->where('uniforms.p_method' , '=' , 'cash')

               ->sum('uniforms.amount');



               $uniform_incom_online = Uniform::join('registereds', 'registereds.id', '=', 'uniforms.registerd_id')
               ->join('branches', 'branches.id', '=', 'uniforms.branch_id')
               ->join('academies', 'academies.id', '=', 'uniforms.academy_id')
               ->whereBetween('uniforms.order_date',[$from_date,$to_date])
   
               ->where('uniforms.branch_id' , '=' , $request->branch_id )
               ->where('uniforms.academy_id' , '=' , $request->academy_id )
               ->where('uniforms.p_method' , '=' , 'online')

                ->sum('uniforms.amount');
    
   
   
   
  
  
 
 
 





             $new = Instalment::join('registereds', 'registereds.id', '=', 'instalments.registerd_id')
             ->join('branches', 'branches.id', '=', 'instalments.branch_id')
             ->join('academies', 'academies.id', '=', 'instalments.academy_id')
             ->whereBetween('instalments.payment_date',[$from_date,$to_date])
 
             ->where('instalments.branch_id' , '=' , $request->branch_id )
             ->where('instalments.academy_id' , '=' , $request->academy_id )
             ->where('instalments.status_student' , '=' , 'new')
             ->count();



             
             $renwal = Instalment::join('registereds', 'registereds.id', '=', 'instalments.registerd_id')
             ->join('branches', 'branches.id', '=', 'instalments.branch_id')
             ->join('academies', 'academies.id', '=', 'instalments.academy_id')
             ->whereBetween('instalments.payment_date',[$from_date,$to_date])
 
             ->where('instalments.branch_id' , '=' , $request->branch_id )
             ->where('instalments.academy_id' , '=' , $request->academy_id )
             ->where('instalments.status_student' , '=' , 'renewal')
             ->count();

 


            

 
 
            return view('admin.report.report' , compact('invoices' , 'branch' ,'amount' , 'card' , 'cash' , 'online' , 'uniform_incom' , 'new' ,'renwal' , 
            'uniform_incom_card' , 'uniform_incom_cash' , 'uniform_incom_online'
            
            ))->withDetails($invoices);
 

        }

      

    }





    public function statusreport()
{


    $branch = Branches::with('academy')->get();


    return view('admin.report.status' , compact( 'branch' ));


}




    
    public function statustotal(Request $request)
    {

        if( $request->branch_id && $request->academy_id && $request->from_date && $request->to_date && $request->statues==''  )
        {

            $from_date = date($request->from_date);
            $to_date = date($request->to_date);
            $branch_id = $request->branch_id ;
            $academy_id = $request->academy_id ;
            $branch = Branches::with('academy')->get();


            $invoices = Instalment::join('registereds', 'registereds.id', '=', 'instalments.registerd_id')
            ->join('branches', 'branches.id', '=', 'instalments.branch_id')
            ->join('academies', 'academies.id', '=', 'instalments.academy_id')
            ->whereBetween('instalments.end_date',[$from_date,$to_date])
            ->where('instalments.branch_id','=',$request->branch_id)->where('instalments.academy_id','=',$request->academy_id)->get();
  
  

            $branch = Branches::with('academy')->get();
 


            return view('admin.report.status' , compact('invoices' , 'branch' ))->withDetails($invoices);

        }

        else{
            
            $from_date = date($request->from_date);
            $to_date = date($request->to_date);
            $branch_id = $request->branch_id ;
            $academy_id = $request->academy_id ;
            $statues = $request->statues ;

      

            $branch = Branches::with('academy')->get();



            $invoices = Instalment::join('registereds', 'registereds.id', '=', 'instalments.registerd_id')
            ->join('branches', 'branches.id', '=', 'instalments.branch_id')
            ->join('academies', 'academies.id', '=', 'instalments.academy_id')
            ->whereBetween('instalments.payment_date',[$from_date,$to_date])
            ->where('instalments.branch_id','=',$request->branch_id)
        

            ->where('instalments.academy_id','=',$request->academy_id)
            
            ->where('instalments.statues','=',$request->statues)->orderBy('instalments.id')
            
            ->get(); 
          



  
   
            return view('admin.report.status' , compact('invoices' , 'branch' ))->withDetails($invoices);
 

        }

      

    }




    public function uniformreport()  {
        $branch = Branches::with('academy')->get();

        return view('admin.report.uniform' , compact('branch'));
    }



    public function uniformincom(Request $request)  {




        if($request->branch_id && $request->academy_id && $request->from_date=='' && $request->to_date==''  )
        {

            $invoices =Registered::join('uniforms', 'uniforms.registerd_id', '=', 'registereds.id')
            -> join('branches', 'branches.id', '=', 'registereds.branch_id')
            -> join('academies', 'academies.id', '=', 'registereds.academy_id')
            ->where('uniforms.branch_id' , '=' , $request->branch_id )->where('uniforms.academy_id' , '=' , $request->academy_id )
                ->get();

 
                $amount = Registered::join('uniforms', 'uniforms.registerd_id', '=', 'registereds.id')
                -> join('branches', 'branches.id', '=', 'registereds.branch_id')
                -> join('academies', 'academies.id', '=', 'registereds.academy_id')
                ->where('uniforms.branch_id' , '=' , $request->branch_id )->where('uniforms.academy_id' , '=' , $request->academy_id )
                ->sum('uniforms.amount');


                     
 

            $branch = Branches::with('academy')->get();

            return view('admin.report.uniform' , compact('invoices' , 'branch' ,'amount'))->withDetails($invoices);

        }

        else{
            $from_date = date($request->from_date);
            $to_date = date($request->to_date);
            $branch_id = $request->branch_id ;
            $academy_id = $request->academy_id ;
            $branch = Branches::with('academy')->get();


            $invoices = Registered::join('uniforms', 'uniforms.registerd_id', '=', 'registereds.id')
            -> join('branches', 'branches.id', '=', 'registereds.branch_id')
            -> join('academies', 'academies.id', '=', 'registereds.academy_id')
            ->whereBetween('uniforms.order_date',[$from_date,$to_date])->where('uniforms.branch_id','=',$request->branch_id)->where('uniforms.academy_id','=',$request->academy_id)->get();



            $amount = Registered::join('uniforms', 'uniforms.registerd_id', '=', 'registereds.id')
            -> join('branches', 'branches.id', '=', 'registereds.branch_id')
            -> join('academies', 'academies.id', '=', 'registereds.academy_id')
            ->whereBetween('uniforms.order_date',[$from_date,$to_date])
            ->where('uniforms.branch_id','=',$request->branch_id)
            ->where('uniforms.academy_id','=',$request->academy_id)
            ->sum('uniforms.amount');

 
 
            return view('admin.report.uniform' , compact('invoices' , 'branch' ,'amount'))->withDetails($invoices);
 

        }

     

 

     }



     public function programdata(Request $request)
     {

        

        
        if($request->branch && $request->academy && $request->program  && $request->from_date=='' && $request->to_date==''  )

        {


            $registered = Registered::join('programs', 'programs.id', '=', 'registereds.programe_id')
            -> join('branches', 'branches.id', '=', 'registereds.branch_id')
            -> join('academies', 'academies.id', '=', 'registereds.academy_id')
            -> join('instalments', 'instalments.registerd_id', '=', 'registereds.id')
            ->where('registereds.programe_id' , '=' , $request->program )
            ->where('instalments.branch_id' , '=' , $request->branch )
            ->where('instalments.academy_id' , '=' , $request->academy )

          

            ->get();

         
            $branch = Branches::get();
           
            return view('admin.report.programe' , compact('registered' , 'branch'))->withDetails($registered);


        }


     

            $from_date = date($request->from_date);
            $to_date = date($request->to_date);
            $branch = $request->branch ;
            $academy = $request->academy ;
            $program = $request->program ;


            

            $registered = Registered::join('programs', 'programs.id', '=', 'registereds.programe_id')
            -> join('branches', 'branches.id', '=', 'registereds.branch_id')
            -> join('academies', 'academies.id', '=', 'registereds.academy_id')
            -> join('instalments', 'instalments.registerd_id', '=', 'registereds.id')
            ->where('registereds.programe_id' , '=' , $request->program )

            ->where('instalments.branch_id' , '=' , $request->branch )
            ->where('instalments.academy_id' , '=' , $request->academy )
            ->whereBetween('instalments.payment_date',[$from_date,$to_date])
         

            ->get();

         
            $branch = Branches::get();
           
            return view('admin.report.programe' , compact('registered' , 'branch'))->withDetails($registered);




    

        
     }




     public function programreport()
     {

        $branch = Branches::get();
        return view('admin.report.programe' , compact('branch'));
     }


     public function getAcademy($id)
{
    $academy = Academy::where('branch_id', $id)->pluck('academy_name', 'id');
    return response()->json($academy);
    dd($academy);
}

public function getProgram($id)
{
    $program = Programs::where('academy_id', $id)->pluck('programe_name', 'id');
    return response()->json($program);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
