<?php

namespace App\Http\Controllers;

use App\Models\CurriculumVitae;
use Illuminate\Http\Request;

class CurriculumVitaeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    
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
    public function show(Request $request, $id)
    {
        // Get Curriculum Vitae from it`s id
        $cv = CurriculumVitae::find($id);

        return view('cv/show', ['cv' => $cv]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CurriculumVitae $curriculumVitae
     * @return \Illuminate\Http\Response
     */
    public function edit(CurriculumVitae $curriculumVitae)
    {
        //
        return view('cv/edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param CurriculumVitae $curriculumVitae
     * @return void
     */
    public function update(Request $request, CurriculumVitae $curriculumVitae)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CurriculumVitae $curriculumVitae
     * @return void
     */
    public function destroy(CurriculumVitae $curriculumVitae)
    {
        //
    }
}
