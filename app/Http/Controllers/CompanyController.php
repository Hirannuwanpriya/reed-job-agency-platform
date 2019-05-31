<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $companies = Company::all();
        
        return view('company.list', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        return view('company.add');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {

        $company = new Company();

        $company->name = $request->get('name');

        $company->contact = $request->get('contact');

        $company->email = $request->get('email');

        $company->save();

        return redirect(route('admin.company.add'))->with('success', 'Company has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @return Response
     */
    public function show(Company $company, $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @return Response
     */
    public function edit(Company $company ,$id)
    {
        
        $company = Company::findOrFail($id);

        return view('company.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $company= Company::findOrFail($id);

        $company->name = $request->get('name');

        $company->contact = $request->get('contact');

        $company->email = $request->get('email');

        $company->save();

        return redirect(route('admin.company.edit', $company->id))->with('success', 'Company has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
