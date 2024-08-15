<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Http\Requests\StoreStudentsRequest;
use App\Http\Requests\UpdateStudentsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('students.students');
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //do this 
        return view('students.add');

        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validData = Validator::make($request->all(), [
            'data'=> 'required|array',
            'data.*.id'=> 'required|numeric|unique:students,id|distinct',
            'data.*.name'=> 'required|string|distinct',
            'data.*.img'=> 'string|distinct|nullable',
            'data.*.class_id'=> 'numeric|nullable'
        ]);
        $datas = $request->data;

        foreach ($datas as $key => $value) {
            $value['class_id']= null;
            Students::insert($value);
        }
        return redirect()->route('dashboard');

    }

    /**
     * Display the specified resource.
     */
    public function show(Students $students)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Students $students)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentsRequest $request, Students $students)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Students $students)
    {
        //
    }
}
