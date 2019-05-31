<?php

namespace App\Http\Controllers;

use App\Models\Auth\Administrator;
use App\Models\Auth\User;
use App\Models\CurriculumVitae;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $admins = Administrator::all();
    
        return view('admin.list',['admins' => $admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
        ]);

        $admin = new Administrator();

        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('password'));

        $admin->save();

        return redirect(route('admin.user.edit', $admin->id ))->with('success', 'User has been created.');

    }
    
    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param $id
     * @return void
     */
    public function show(Request $request, $id)
    {
        
        $admin = Administrator::findOrFail($id);
        
        return view('admin.edit', ['admin' => $admin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
        ]);

        $admin = Administrator::findOrFail($id);

        $admin->id = $id;
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password =  Hash::make($request->input('password'));

        $admin->save();

        return redirect(route('admin.user.edit', $admin->id ))->with('success', 'User has been updated.');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param $id
     * @return void
     */
    public function destroy(Request $request, $id)
    {
        $admin = Administrator::findOrFail($id);

        $admin->delete();

        return redirect(route('admin.user' ))->with('success', 'User has been Deleted.');
    }

    public function userList()
    {

        $users = User::all();

        return view('user.list',['users' => $users]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userDestroy(Request $request, $id)
    {

        $users = User::findOrFail($id);

        $users->delete();

        return redirect(route('user.list' ))->with('success', 'User has been Deleted.');
    }
}
