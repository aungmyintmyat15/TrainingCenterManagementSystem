<?php

namespace App\Http\Controllers;

use App\Trainer;
use App\Course;
use App\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $trainer=Trainer::all();
        return view('trainers.show_trainers',compact('trainer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $batches=Batch::get();
        $courses=Course::get();
        return view('trainers.create_trainers',['courses'=>$courses,'batches'=>$batches]); 
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
      
            'course_id' => 'required',
            
            'batch_id' => 'required',
            'teacher_name' => 'required',
            'teacher_phone' => 'required',
            'teacher_photo'=>'required',
            'teacher_address'=>'required',
            'teacher_email'=>'required'
         ]);
        $trainer= new Trainer();
       
            $fileName = time().'_'.$request->teacher_photo->getClientOriginalName();
            $request->teacher_photo->move(public_path('uploads'), $fileName);
            $trainer->teacher_photo=$fileName;
            $trainer->course_id=$request->course_id;
            $trainer->batch_id=$request->batch_id;
            $trainer->teacher_name=$request->teacher_name;
            $trainer->teacher_phone=$request->teacher_phone;
            $trainer->teacher_address=$request->teacher_address;
            $trainer->teacher_email=$request->teacher_email;
            $trainer->save();
            return redirect('/trainers')->with('status','Hey....Successful Insert!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function show(Trainer $trainer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $courses=Course::all();
        $batches=Batch::all();
        $trainer=Trainer::find($id);
        return view('trainers.edit_trainers',compact('courses','batches','trainer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $trainer=Trainer::find($id);
        if($request->file()){
            $file=$request->file('teacher_photo');
            $photo=uniqid().'_'.$file->getClientOriginalName();
            $file->move(public_path().'/uploads',$photo);
            $trainer->teacher_photo=$photo;
        }
        $trainer->course_id=$request->course_id;
        $trainer->batch_id=$request->batch_id;
        $trainer->teacher_name=$request->teacher_name;
        $trainer->teacher_phone=$request->teacher_phone;
        //$trainer->teacher_photo=$request->teacher_photo;
        $trainer->teacher_address=$request->teacher_address;
        $trainer->teacher_email=$request->teacher_email;
        $trainer->save();
        return redirect('/trainers/'.$id.'/edit')->with('status','Hey....Update Successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Trainer::destroy($id);
        return redirect('trainers');
    }
}
