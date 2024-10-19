<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Http\Requests\StoreClassesRequest;
use App\Http\Requests\UpdateClassesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ClassesController extends Controller
{
    /*kkkkkkkkkkkkkk
     * Display a listing of the resource.
     */
    public function index()
    {

        // $listOfClasses = DB::table('classes')->leftJoin('users', 'classes.user_id', '=', 'users.id')->select('classes.*', 'users.name')->get();
        $listOfClasses = Classes::orderBy('grade')->filter(request(['search']))->leftJoin('users', 'classes.user_id', '=', 'users.id')->select('classes.*', 'users.name')->get();
        
        return view('classes.index', ['classes'=>$listOfClasses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $advisers = DB::table('users')->select()->get();

        return view('classes.add', ['advisers'=>$advisers]);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'data'=>'required|array',
            'data.*.section'=>'required|string',
            'data.*.grade'=>'numeric|required',
            'data.*.user_id'=>'nullable|numeric|exists:users,id'
        ]);
        
        if ($validatedData->fails()) {
            return back()->withInput()->withErrors($validatedData->errors());
        }

        $datas = $validatedData->getData();

        foreach ($datas['data'] as $key => $value) {
            Classes::create($value);
        }

        return redirect()->route('classes')->with('message', 'Classes created successfully!');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Classes $classes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classes $classes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassesRequest $request, Classes $classes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classes $classes)
    {
        //
    }
}
