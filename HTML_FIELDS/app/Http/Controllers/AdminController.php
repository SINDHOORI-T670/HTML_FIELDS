<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\models\Field;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
class AdminController extends Controller
{
    public function index(){
        $list = Field::all();
        return view('admin.dashboard',compact('list'));
    }
    public function addform(){
        return view('admin.add');
    }
    public function add(Request $request){
        $validator = Validator::make($request->all(),
           [ 
               'label' => 'required',
                'sample' => 'required',
                'field' => 'required|not_in:0',
                'addmore.*.option' => 'required_if:field,==,select',
            ]);
        if ($validator->fails()) {
    
            $messages = $validator->messages();

            return redirect()->back()->withErrors($messages)->withInput();

        } else  {
            $string = '';

        foreach($request->addmore as $a)
        {    
            foreach($a as $b=>$c)
            {
                $string .= $c.',';
            }
        }

        $solution = substr($string,0,-1);

            $data = new Field();
            $data->label = $request->label;
            $data->sample = $request->sample;
            $data->field = $request->field;
            $data->comments = isset($solution)? $solution : null;
            $data->save();
            return back()->with('success', 'Record Created Successfully.');
        }
    }
    public function editform($id){
        $data = Field::find($id);
        return view('admin.edit',compact('data'));
    }
    public function updateform(Request $request){
        $validator = Validator::make($request->all(),
        [ 
             'label' => 'required',
             'sample' => 'required',
             'field' => 'required|not_in:0',
             'addmore.*.option' => 'required_if:field,==,select',
         ]);
     if ($validator->fails()) {
 
         $messages = $validator->messages();

         return redirect()->back()->withErrors($messages)->withInput();

     } else  {
         $string = '';
        if(isset($request->addmore)){
            // dd($request->addmore);
            foreach($request->addmore as $a)
            {    
                foreach($a as $b=>$c)
                {
                    $string .= $c.',';
                }
            }
        }

        $solution = substr($string,0,-1);

         $data =
         [
             'label' => $request->label,
             'sample' => $request->sample,
             'field' => $request->field,
             'comments' => isset($solution)? $solution : null
         ];
         Field::where('id',$request->id)->update($data);
         return back()->with('success', 'Record Updated Successfully.');
     }
    }
    public function deletefield($id){
        $data = Field::find($id);
        $data->delete();
        return back()->with('success', 'Field Deleted Successfully.');
    }
}
