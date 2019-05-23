<?php

namespace App\Http\Controllers;

use App\Models\CurriculumVitae;
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
    
        $cvs = CurriculumVitae::all();
        
        return view('admin.cv_list', ['cvs' => $cvs]);
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
     * @param Request $request
     * @param $id
     * @return void
     */
    public function show(Request $request , $id)
    {
    
        $cv = CurriculumVitae::find($id);
        
        return view('cv.show', ['cv' => $cv]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminCurriculumVitae  $AdminCurriculumVitae
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
     * @param  \App\Models\AdminCurriculumVitae  $AdminCurriculumVitae
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminCurriculumVitae $AdminCurriculumVitae)
    {
        //
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminCurriculumVitae  $AdminCurriculumVitae
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminCurriculumVitae $AdminCurriculumVitae)
    {
        //
    }
}
