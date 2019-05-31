<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $vacancies = Vacancy::all();
        
        return view('vacancy.list', ['vacancies' => $vacancies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = Company::all();

        return view('vacancy.create', ['companies' => $company]);
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
            'company' => 'required',
            'title' => 'required|max:255',
        ]);

        $vacancy = new Vacancy();

        $vacancy->company_id = $request->input('company');
        $vacancy->title = $request->input('title');
        $vacancy->description = $request->input('description');

        $vacancy->save();

        return redirect(route('admin.vacancy.edit', $vacancy->id ))->with('success', 'Vacancy has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function show(Vacancy $vacancy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacancy $vacancy, $id)
    {
        $companies = Company::all();

        $vacancy = Vacancy::findOrFail($id);

        return view('vacancy.edit', ['vacancy' => $vacancy, 'companies' => $companies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vacancy = Vacancy::findOrFail($id);

        $vacancy->id = $id;
        $vacancy->company_id = $request->input('company');
        $vacancy->title = $request->input('title');
        $vacancy->description = $request->input('description');

        $vacancy->save();

        return redirect(route('admin.vacancy.edit', $vacancy->id ))->with('success', 'Vacancy has been updated.');
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
        $vacancy = Vacancy::findOrFail($id);

        $vacancy->delete();

        return redirect(route('admin.vacancy' ))->with('success', 'Vacancy has been Deleted.');
    }
}
