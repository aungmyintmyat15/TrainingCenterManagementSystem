<?php

namespace App\Http\Controllers;
use App\Batch;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batch=Batch::get();
        return view('batches.show_batches',['batches'=>$batch]);    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course=Course::get();
        return view('batches.create_batches',['courses'=>$course]);    }

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
            
            'batch_name' => 'required',
            'batch_year' => 'required',
         ]);
              Batch::create([
                'course_id'=>$request->course_id,
                'batch_name'=>$request->batch_name,
                'batch_year'=>$request->batch_year,
              ]);
          return redirect('/batches/create')->with('status','Hey.....Successful Insert!');
       
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
        $batch=Batch::find($id);
        return view('batches.edit_batches',compact('courses','batch'));
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
        //
        $batch=Batch::find($id);
        $batch->course_id=$request->course_id;
        $batch->batch_name=$request->batch_name;
        $batch->batch_year=$request->batch_year;
        $batch->save();
        return redirect('/batches/'.$id.'/edit')->with('status','Hey....Update Successful!');
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
        Batch::destroy($id);
        return redirect('batches');
    }
}
