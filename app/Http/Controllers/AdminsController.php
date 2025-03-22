<?php

namespace App\Http\Controllers;
use App\Models\Admin\Branches;
use App\Models\Admin\Academy;
use App\Models\Admin\Admins;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::get();
        $branch = Branches::get();
        $academy = Academy::get();
        return view('admin.admins.index' , compact('branch' , 'academy' , 'users'));




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
        User::create([
            'name' => $request['name'],
            'branch_id' => $request['branch_id'],
            'academy_id' => $request['academy_id'],
            'admin_type' => $request['admin_type'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

         
        return redirect()->route('admins.index')
         ->with('success','admin created successfully.');

         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function show(Admins $admins)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function edit(Admins $admins)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user ,  $id)
    {
        $user = User::find($id);


        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'branch_id' => $request['branch_id'],
            'academy_id' => $request['academy_id'],
            'admin_type' => $request['admin_type'],
        ]);

        if ($request->password) {
            $user->update([
                'password' => bcrypt($request->password),
            ]);
        }


            
        return redirect()->route('admins.index')
         ->with('success','admin updated successfully.');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user , $id) 
    {

        $user = User::find($id);

         $user->delete();
          
   
          return redirect()->back()->with('error','Data Deleted');
    }
}
