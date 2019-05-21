<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminCurriculumVitaeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.cv_list');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cv/create');
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
     * @param  \App\AdminCurriculumVitae  $AdminCurriculumVitae
     * @return \Illuminate\Http\Response
     */
    public function show(AdminCurriculumVitae $AdminCurriculumVitae)
    {
        //
        
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdminCurriculumVitae  $AdminCurriculumVitae
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminCurriculumVitae $AdminCurriculumVitae)
    {
        //
        return view('cv/edit');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdminCurriculumVitae  $AdminCurriculumVitae
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminCurriculumVitae $AdminCurriculumVitae)
    {
        //
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdminCurriculumVitae  $AdminCurriculumVitae
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminCurriculumVitae $AdminCurriculumVitae)
    {
        //
    }
}
