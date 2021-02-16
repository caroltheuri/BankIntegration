<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Student;
use App\Http\Resources\Student as StudentResource;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $student = new Student();
        $student->student_admission_no =$request->input('student_admission_no');
        $student->first_name=$request->input('first_name');
        $student->last_name=$request->input('last_name');
        $student->save();
        return new StudentResource($student);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        if(Student::where('student_admission_no',$id)->exists()){
                $student = Student::where('student_admission_no',$id)->get();
                return response()->json([
                    "ResponseCode"=>"1000",
               
                "ResponseMessage"=>$student
                ]);
        }
        else{
            return response()->json([
                "ResponseCode"=>"1001",
               
                "ResponseMessage"=>"Sorry the student doesnt exist"
            ]);
        }      
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
