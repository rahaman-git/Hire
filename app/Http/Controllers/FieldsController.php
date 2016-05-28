<?php

namespace App\Http\Controllers;

use App\Field;
use Illuminate\Http\Request;

use App\Http\Requests;

class FieldsController extends Controller
{
    public function show(Field $field)
    {
        $freelancers = $field->freelancers()->get();
        return view('freelancers.index', compact('freelancers', 'field'));
    }
}
