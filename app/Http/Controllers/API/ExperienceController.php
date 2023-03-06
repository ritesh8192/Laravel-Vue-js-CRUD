<?php

namespace App\Http\Controllers\API;

use App\Experience;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function get_all_experiences(){

        $experiences = Experience::orderBy('id','DESC')->get();

        return response()->json(['experiences' => $experiences],200);
    }

    public function create_experience(Request $request){

        $this->validate($request,[
            'company'=> 'required',
        ]);

        $experiences = new Experience();
        $experiences->company = $request->company;
        $experiences->period = $request->period;
        $experiences->position = $request->position;
        $experiences->save();
    }

    public function update_experience(Request $request,$id){

        $experiences = Experience::find($id);

        $this->validate($request,[
            'company'=> 'required',
        ]);
        $experiences->company = $request->company;
        $experiences->period = $request->period;
        $experiences->position = $request->position;
        $experiences->save();

    }

    public function delete_experience(Request $request,$id){

        $experiences = Experience::findorFail($id);
        $experiences->delete();
    }
}
