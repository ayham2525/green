<?php

namespace App\Http\Controllers;

use App\Models\Admin\Programs;
use App\Models\Admin\Academy;
use Illuminate\Http\Request;

class ProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $programs = Programs::all();
        $academy = Academy::all();

        return view('admin.program.index' , compact('programs' , 'academy'));

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
            'programe_name' => 'required',
            'academy_id' => 'required',

            'days' => 'required',
            'classes' => 'required',
            'price' => 'required',


            
         ]);
    
         Programs::create($request->all());
     
        return redirect()->route('programs.index')
         ->with('success','program created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Programs  $programs
     * @return \Illuminate\Http\Response
     */
    public function show(Programs $programs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Programs  $programs
     * @return \Illuminate\Http\Response
     */
    public function edit(Programs $programs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Programs  $programs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programs $programs , $id)
    {
        $request->validate([
            'programe_name' => 'required',
         ]);


         $programs = Programs::find($id);
         $programs->programe_name = $request->programe_name;
         $programs->academy_id = $request->academy_id;


         $programs->classes = $request->classes;
         $programs->days = $request->days;
         $programs->price = $request->price;





         $programs->from_sunday = $request->from_sunday;
         $programs->to_sunday = $request->to_sunday;
         $programs->from_monday = $request->from_monday;
         $programs->to_monday = $request->to_monday;
         $programs->from_tuesday = $request->from_tuesday;
         $programs->to_tuesday = $request->to_tuesday;
         $programs->from_wednesday = $request->from_wednesday;
         $programs->to_wednesday = $request->to_wednesday;
         $programs->from_thursday = $request->from_thursday;
         $programs->to_thursday = $request->to_thursday;
         $programs->from_friday = $request->from_friday;
         $programs->to_friday = $request->to_friday;
         $programs->from_saturday = $request->from_saturday;
         $programs->to_saturday = $request->to_saturday;

 
         $programs->save();


    
     
        return redirect()->route('programs.index')
        ->with('success','programs updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Programs  $programs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programs $programs  , $id)
    {
        

        $programs = Programs::find($id);

         $programs->delete();
         return redirect()->back()->with('error','Data Deleted');

    }
}
