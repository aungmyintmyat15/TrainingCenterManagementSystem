<?php

namespace App\Http\Controllers;
use App\Batch;
use App\Course;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $student=Student::get();
        return view('students.show_students',['students'=>$student]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $course=Course::get();
        $batch=Batch::get();
        return view('students.create_students',['courses'=>$course,'batches'=>$batch]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
      
            'student_name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'student_photo' => 'required',
            'student_phone' => 'required',
            'student_address' => 'required',
            'student_email' => 'required',
            'student_gender' => 'required',
            'student_date_of_birth' => 'required',
            'course_id' => 'required',
            'batch_id' => 'required',
         ]);
         $file=$request->file('student_photo');
         $fileName=uniqid().'_'.$file->getClientOriginalName();
         $file->move(public_path().'/uploads/',$fileName);
              Student::create([
                    'student_photo'=>$fileName,
                    'student_name'=>$request->student_name,
                    'father_name' =>$request->father_name,
                    'mother_name'=>$request->mother_name,
                    'student_photo'=>$fileName,
                    'student_phone' =>$request->student_phone,
                    'student_address' =>$request->student_address,
                    'student_email' =>$request->student_email,
                    'student_gender' =>$request->student_gender,
                    'student_date_of_birth' =>$request->student_date_of_birth,
                    'course_id'=>$request->course_id,
                    'batch_id' =>$request->batch_id,
                
              ]);
          return redirect('/students/create')->with('status','Hey.....Successful Insert!');
                
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $courses=Course::all();
        $batches=Batch::all();
        $student=Student::find($id);
        return view('students.edit_students',compact('courses','batches','student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->student_photo);
        $student=Student::find($id);
        if($request->file()){
            $file=$request->file('student_photo');
            $photo=uniqid().'_'.$file->getClientOriginalName();
            $file->move(public_path().'/uploads',$photo);
            $student->student_photo=$photo;
        }
        $student->student_name=$request->student_name;
        $student->father_name=$request->father_name;
        $student->mother_name=$request->mother_name;
        // $student->student_photo=$request->student_photo;
        $student->student_phone=$request->student_phone;
        $student->student_address=$request->student_address;
        $student->student_email=$request->student_email;
        $student->student_gender=$request->student_gender;
        $student->student_date_of_birth=$request->student_date_of_birth;
        $student->course_id=$request->course_id;
        $student->batch_id=$request->batch_id;
        $student->save();
        return redirect('/students/'.$id.'/edit')->with('status','Hey....Update Successful!');
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
        Student::destroy($id);
        return redirect('students');
    }
}
