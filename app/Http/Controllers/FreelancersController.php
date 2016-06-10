<?php

namespace App\Http\Controllers;

use App\Field;
use App\Freelancer;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class FreelancersController extends Controller
{
    public function index()
    {
        $freelancers = Freelancer::all();
        return view('freelancers.index', compact('freelancers'));
    }

    public function freelancerDetails($id)
    {
        $freelancer = Freelancer::findOrFail($id);
        if ($freelancer->profile->description != null) {
            $displayField = 'display:none;';
            $displayForm = "";
        }
        else {
            $displayForm = 'display:none;';
            $displayField = "";
        }

        $fields = Field::all();

        return view('freelancers.details', compact('freelancer', 'displayForm', 'displayField', 'fields'));
    }

    public function fetch($id)
    {
        return $id->profile;
    }

    public function fetchExp($id, $exp)
    {
        $freelancer = Freelancer::findOrFail($id);
        return $freelancer->experiences()->findOrFail($exp);
    }

    public function edit(Request $request, $id){
        if ($request->has('summaryDescription')){
            $description = $request->summaryDescription;
            $id->profile->update([
                'description' => $description,
            ]);
        }

        if($request -> has('fields')){
            $id->fields()->sync($request->fields);
            return $id->fields;
        }
        
        if ($request -> has('title')){
            $title = $request->title;
            $description = $request->description;
            return $id->experiences()->create([
                'title' => $title,
                'description' => $description,
            ]);
        }
    }
    
    public function editExp(Request $request, $id, $exp)
    {
        $freelancer = Freelancer::findOrFail($id);
        $title = $request->title;
        $description = $request->description;
        $freelancer->experiences()->findOrFail($exp)->update([
            'title' => $title,
            'description' => $description
        ]);
        return $freelancer->experiences()->find($exp);
    }

    public function expDelete($id, $exp)
    {
        $freelancer = Freelancer::findOrFail($id);
        $freelancer->experiences()->findOrFail($exp)->delete();
    }

    public function upload(Request $request)
    {
        $freelancer = Freelancer::findOrFail($request->input('freelancer_id'));

        if ($request->hasFile('file')){
            $file = $request->file('file');

            $filename = uniqid() . $file->getClientOriginalName();

            if (!file_exists('freelancer/images')) {
                mkdir('freelancer/images', 0777, true);
            }
            $file->move('freelancer/images', $filename);

            if (!file_exists('freelancer/images/thumbs')) {
                mkdir('freelancer/images/thumbs', 0777, true);
            }
            Image::make('freelancer/images/' . $filename)->resize(200,180)->save('freelancer/images/thumbs/' . $filename, 60);

            $freelancer->profile()->update([
                'image_name' => $filename,
                'image_path' => 'freelancer/images/' . $filename,
            ]);

            $return = [
                'image_name' => $freelancer->profile->image_name,
                'image_path' => $freelancer->profile->image_path,
            ];
            return $return;
        }

    }

    public function doRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'freelancer_name'=>'required|min:3',
            'freelancer_email' => 'required|email|unique:freelancers,email',
            'freelancer_password' => 'required|min:6',
            'freelancer_password_confirm' => 'same:freelancer_password'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $freelancer = new Freelancer;

        $freelancer->name = $request->input('freelancer_name');
        $freelancer->email = $request->input('freelancer_email');
        $freelancer->password = bcrypt($request->input('freelancer_password'));
        $freelancer->save();

        $freelancer->profile()->create([]);

        $credentials = [
            'email' => $request->input('freelancer_email'),
            'password' => $request->input('freelancer_password'),
        ];
        if (!auth()->guard('freelancers')->attempt($credentials)){
            return redirect()->back();
        }
        return redirect('/freelancer-details/'.auth()->guard('freelancers')->user()->id);
    }


    public function login()
    {
        return view('freelancers.login');
    }


    public function doLogin(Request $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (!auth()->guard('freelancers')->attempt($credentials)){
//            Session::flash('flash_error', 'Something went wrong with your credentials!');
            return redirect()->back();
        }

//        Session::flash('flash_message', 'You have successfully logged in!');
        return redirect('/freelancer-details/'.auth()->guard('freelancers')->user()->id);
    }

    public function doLogout()
    {
        auth()->guard('freelancers')->logout();
        return redirect('/');
    }
}
