<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDo;

class TodoController extends Controller
{

    public $restful = true;
    /**
     * Method to list on all the task in the database
     * @return $todos - an array of todos retrieved from the database
     */
    public function getIndex()
    {
        $todos = Todo::all();
        return view("index", ['todos' => $todos]);
    }

    /**
     * Method to add task to the database
     * @return void
     */
    public function postAdd(Request $request)
    {
        if ($request->ajax()) {
            $todo = new Todo();
            $todo->title = $request->input("title");
            $todo->save();
            $last_todo = $todo->id;
            $todos = Todo::whereId($last_todo)->get();
            return view("ajaxData", ['todos' => $todos]);
        }
    }

    /**
     * Method to update the task
     * @param $id
     * @return string
     */

    public function postUpdate(Request $request, $id)
    {
        if ($request->ajax()) {
            $task = Todo::find($id);
            $task->title = $request->input("title");
            $task->save();
            return "OK";
        }
    }

    /**
     * Method to the delete task
     * @return response
     */
    public function getDelete(Request $request, $id)
    {
        if ($request->ajax()) {
            $todo = Todo::whereId($id)->first();
            $todo->delete();
            return "OK";

            // return response()->json(['message' => 'The resource has been deleted.'], 200);
        }
    }

    /**
     * Method to update status of tasks
     * @param $id
     * @return response
     */
    public function getDone(Request $request, $id)
    {
        if ($request->ajax()) {
            $task = Todo::find($id);
            $task->status = 1;
            $task->save();
            return "OK";
        }
    }

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
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
