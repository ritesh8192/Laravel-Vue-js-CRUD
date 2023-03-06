<?php

namespace App\Http\Controllers\API;

use App\Education;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function get_all_education(){
        $education = Education::orderBy('id','DESC')->get();

        return response()->json(['education' => $education],200);
    }

    public function create_education(Request $request){

        $this->validate($request,[
            'institution'=> 'required',
        ]);

        $education = new Education();
        $education->institution = $request->institution;
        $education->period = $request->period;
        $education->department = $request->department;
        $education->degree = $request->degree;
        $education->save();
    }

    public function update_education(Request $request,$id){

        $education = Education::find($id);

        $this->validate($request,[
            'institution'=> 'required',
        ]);

        $education->institution = $request->institution;
        $education->period = $request->period;
        $education->department = $request->department;
        $education->degree = $request->degree;
        $education->save();
    }

    public function delete_education(Request $request,$id){

        $education = Education::findorFail($id);
        $education->delete();
    }
}
