<?php

namespace App\Http\Controllers;

use App\Models\CurriculumVitae;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CurriculumVitaeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $cv = new CurriculumVitae();

        return view('cv/create', ['cv' => $cv]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'designation' => 'required|max:255',
            'email' => 'required|email|max:255',
        ]);
//dd( $request->input());
        $user = Auth::user();

        $cv = new CurriculumVitae();
        if($request->has('profile')) {

            $path = explode('public', $request->file('profile')->store('public/avatars'));

            $cv->img = $path[1];
        }

        $cv->user_id = $user->id;
        $cv->first_name = $request->input('first_name');
        $cv->address = $request->input('address');
        $cv->last_name = $request->input('last_name');
        $cv->mobile = $request->input('mobile');
        $cv->designation = $request->input('designation');
        $cv->email = $request->input('email');
        $cv->website = $request->input('website');
        $cv->linked_in = $request->input('linked_in');
        $cv->git_hub = $request->input('git_hub');
        $cv->twitter = $request->input('twitter');
        $cv->gender = $request->input('gender');
        $cv->status = $request->input('status');
        $cv->nationality = $request->input('nationality');
        $cv->dob = $request->input('dob');
        $cv->nic = $request->input('nic');
        $cv->personal_skills = json_encode($request->input('personal_skills'));
        $cv->p_qualification = json_encode($request->input('p_q'));
        $cv->p_strengths = json_encode($request->input('personal_skills'));
        $cv->summary = $request->input('summary');
        $cv->p_skills = json_encode($request->input('p_s'));
        $cv->eduction_qualification = json_encode($request->input('e_q'));
        $cv->employemnt_history = json_encode($request->input('w_e'));
        $cv->gcse_a_level = json_encode($request->input('a_l'));
        $cv->gcse_o_level = json_encode($request->input('o_l'));
        $cv->interests = $request->input('interests');
        $cv->achievements = $request->input('achievements');
        $cv->references = json_encode($request->input('ref'));

        $cv->save();

        return redirect(route('curriculum-vitae-edit', $cv->id))->with('success', 'Curriculum Vitae has Created.');

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
        $cv = CurriculumVitae::findOrFail($id);

        return view('cv/create', ['cv' => $cv]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CurriculumVitae $curriculumVitae
     * @return Response
     */
    public function edit(Request $request, $id)
    {
    
        $cv = CurriculumVitae::findOrFail($id);

        return view('cv/create', ['cv' => $cv]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param CurriculumVitae $curriculumVitae
     * @return void
     */
    public function update(Request $request, $id)
    {

        $cv = CurriculumVitae::findOrFail($id);

        $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'designation' => 'required|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user = Auth::user();

        if($request->has('profile')) {

            $path = explode('public', $request->file('profile')->store('public/avatars'));

            $cv->img = $path[1];
        }

        $cv->id = $id;
        $cv->user_id = $user->id;
        $cv->first_name = $request->input('first_name');
        $cv->address = $request->input('address');
        $cv->last_name = $request->input('last_name');
        $cv->mobile = $request->input('mobile');
        $cv->designation = $request->input('designation');
        $cv->email = $request->input('email');
        $cv->website = $request->input('website');
        $cv->linked_in = $request->input('linked_in');
        $cv->git_hub = $request->input('git_hub');
        $cv->twitter = $request->input('twitter');
        $cv->gender = $request->input('gender');
        $cv->status = $request->input('status');
        $cv->nationality = $request->input('nationality');
        $cv->dob = $request->input('dob');
        $cv->nic = $request->input('nic');
        $cv->personal_skills = json_encode($request->input('personal_skills'));
        $cv->p_qualification = json_encode($request->input('p_q'));
        $cv->p_strengths = json_encode($request->input('personal_skills'));
        $cv->summary = $request->input('summary');
        $cv->p_skills = json_encode($request->input('p_s'));
        $cv->eduction_qualification = json_encode($request->input('e_q'));
        $cv->employemnt_history = json_encode($request->input('w_e'));
        $cv->gcse_a_level = json_encode($request->input('a_l'));
        $cv->gcse_o_level = json_encode($request->input('o_l'));
        $cv->interests = $request->input('interests');
        $cv->achievements = $request->input('achievements');
        $cv->references = json_encode($request->input('ref'));

        $cv->save();

        return redirect(route('curriculum-vitae-edit', $cv->id))->with('success', 'Curriculum Vitae has Updated.');
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

        $cv = CurriculumVitae::findOrFail($id);

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
