<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
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
     */
    public function store(Request $request)
    {
        User::find(Auth::user()->id)
        ->myTasks()
        ->create([
            'description' => $request->description,
            'expiration' => $request->expiration
        ]);

        return redirect (route('dashboard'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
       //
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
       //
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
       $task = Task::findOrFail($id);
       $task->update([
        'description' => $request->description,
        'expiration' => $request->expiration,
       ]);

        return redirect (route('dashboard'));
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
      $task = Task::findOrFail($id);  
      $task->delete();

      return redirect (route('dashboard'));
    }
    
}
