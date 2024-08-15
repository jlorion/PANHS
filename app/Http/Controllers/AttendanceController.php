<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Mockery\Undefined;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('scan');
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'student_id'=> 'required|numeric|exists:students,id',
            'date'=> 'required|string|',
            'time_in'=> 'string',
            'time_out' => 'string'
        ]);

        if ($validator->fails()) {
            
            return view('attendance.errors', ['handle' => $validator->errors()->messages()]);
            # code...
        }

        $validRequest = $validator->validated();




        if(DB::table('attendances')->where('student_id', $validRequest['student_id'])->where('date', $validRequest['date'])->exists()) {
            if (array_key_exists('time_in', $validRequest)) {
                DB::table('attendances')->where('student_id', $validRequest['student_id'])->where('date', $validRequest['date'])->update(['time_in'=> $validRequest['time_in']]);
            }else{
                DB::table('attendances')->where('student_id', $validRequest['student_id'])->where('date', $validRequest['date'])->update(['time_out'=> $validRequest['time_out']]);
            }
        }else{
            Attendance::insert($validRequest);
        }

        $returnData = DB::table('students')->join('attendances', 'students.id', '=', 'attendances.student_id')->
        where('attendances.date', $validRequest['date'])->where('students.id', $validRequest['student_id'])->
        select('students.*', 'attendances.date', 'attendances.time_in', 'attendances.time_out')->get();
        // dd($data);
        
        return view('attendance.profile', ['student' => $returnData[0]]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        $data = DB::table('students')->join('attendances', 'students.id', '=', 'attendances.student_id')->
        orderBy('attendances.id', 'DESC')->
        select('students.*', 'attendances.date', 'attendances.time_in', 'attendances.time_out')->get();

        return view('attendance.list', ['scanned' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttendanceRequest $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
