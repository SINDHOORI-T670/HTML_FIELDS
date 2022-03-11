<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Field;
class GeneralController extends Controller
{
    public function index(){
        $data = Field::all();
        return view('welcome',compact('data'));
    }
}
