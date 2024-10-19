<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Http\Requests\StoreStudentsRequest;
use App\Http\Requests\UpdateStudentsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $classes = DB::table('classes')->select()->get();

        $students = Students::orderBy("last_name")->leftJoin('classes', 'classes.id', '=', 'students.class_id')->select('students.*', 'classes.section', 'classes.grade')->filter($request->query())->paginate(30);

        if($request->header('hx-request') && $request->header('hx-target')=='div-target'){
            return view('students.partials.list', ['classes'=>$classes, 'students'=>$students]);
        }

        return view('students.students', ['classes'=>$classes, 'students'=>$students]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //do this 
        $sections = DB::table('classes')->select()->get();

        return view('students.add', ['sections'=>$sections]);

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
            'data.*.first_name'=> 'required|string|distinct',
            'data.*.last_name'=> 'required|string|distinct',
            'data.*.img'=> 'string|distinct|nullable',
            'data.*.class_id'=> 'numeric|nullable'
        ]);


        if ($validData->fails()) {
            return back()->withInput()->withErrors($validData->errors());
        }

        $datas = $validData->getData();

        foreach ($datas['data'] as $key => $value) {
            Students::create($value);
        }

        return redirect()->route('students')->with('message', 'Students are created!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Students $students)
    {
        //
        return view('students.profiles.student', ['student'=> $students]);
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
