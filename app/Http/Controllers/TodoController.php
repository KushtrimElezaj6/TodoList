<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $todos= Todo::paginate(18);
      return view('todo.index', ['todos'=>$todos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data= $request->validate 
       ([
             'title' =>'required|max:250',
             'content'=> 'required|max:250',
             'complated_at' => 'required|date'
       ]);

       Todo::create($data);
       
       return back()->with("massage", "todo u krijua me sukses");


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $Todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $Todo)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $Todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $Todo)
    {
        
        return view('todo.edit',['todo'=>$Todo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $Todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $Todo)
    {
        $data= $request->validate 
       ([
             'title' =>'required|max:250',
             'content'=> 'required|max:250',
             'completed_at'=> 'required|date'
       ]);

       $Todo->update($data);
       
       return back()->with("message", "Todo has updatet");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $Todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $Todo)
    {
        $Todo->delete();
        return back()->with("message", "Todo is deleted");
    }


    public function completed(Request $request,Todo $todo){



        $todo->update(['completed_at' => now()]);
 
        return back()->with("message","Completed Succesfully");
 
 
     }
 
 
 
}
