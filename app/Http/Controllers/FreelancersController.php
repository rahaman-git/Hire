<?php

namespace App\Http\Controllers;

use App\Freelancer;
use Illuminate\Http\Request;

use App\Http\Requests;

class FreelancersController extends Controller
{
    public function index()
    {
        $freelancers = Freelancer::all();
        return view('freelancers.index', compact('freelancers'));
    }

    public function show($freelancer){
        return view('freelancers.show', compact('freelancer'));
    }
}
