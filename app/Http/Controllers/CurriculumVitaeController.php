<?php

namespace App\Http\Controllers;

use App\Models\CurriculumVitae;
use Dompdf\Dompdf;
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
    public function edit(Request $request, $id)
    {
    
        $cv = CurriculumVitae::find($id);
        
        return view('cv/edit', ['cv' => $cv]);
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
    
    public function generateCv(Request $request, $id)
    {
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
    
        $dompdf->loadHtml('hello world');
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');
        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF to Browser
        $dompdf->stream();
    }
}
