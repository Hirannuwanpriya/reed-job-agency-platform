<?php

namespace App\Http\Controllers;

use App\Models\Auth\User;
use App\Models\CurriculumVitae;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get the currently authenticated user
        $user = Auth::user();
        // Get Curriculum Vitaes that belongs to the user
        $cvs =  $user->cv;

        return view('home', ['cvs' => $cvs]);
    }

}
