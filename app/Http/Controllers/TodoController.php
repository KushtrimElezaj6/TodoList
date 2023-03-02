<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Tag;
use App\Models\Todo;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;


class TodoController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('search')) {
            $search = request('search');
            $todos = Todo::where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            })->where('user_id', Auth::user()->id)->paginate(5);
        } else {
            $todos = Todo::with('tags')->orderBy('created_at',  'desc')->where('user_id', Auth::user()->id)->paginate(5);
        }
        return view('todo.index', ['todos' => $todos, 'priorities' => Todo::getPriority(), 'tags' => Tag::all(), 'projects' =>Project::all()]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tags = Tag::all();
        return view('todos.index', ['tags' => $tags ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:250',
            'content' => 'required|max:250',
            'due_date' => 'required|after:yesterday',
            'priority' => 'nullable',
            'tags' => 'nullable',
            'project_id'=>'nullable'

        ]);


        $todos = Todo::create([...['user_id' => Auth::user()->id], ...$data]);

        if ($request->has('tags')) {
            foreach ($request->tags as $tag) {
                $todos->tags()->attach(explode(',', $tag));
            }
        }

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
        $this->authorize('view', $Todo);

        $todo = $Todo->load('tags');


        return view('todo.edit', ['todo' => $Todo, 'priorities' => Todo::getPriority(), 'tags' => Tag::all(), 'tagIds' => $todo->tags->pluck('id')->toArray()]);
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
        $data = $request->validate([
            'title' => 'required|max:250',
            'content' => 'required|max:250',
            'priority' => 'nullable',
            'due_date' => 'nullable',
            'tags'=>'nullable',
        ]);

        $Todo->update($data);
        $Todo->tags()->detach();
        if ($request->has('tags')) {
            foreach ($request->tags as $tag) {
                $Todo->tags()->attach(explode(',', $tag));
            }
        }

        return back()->with("message", "Todo has been updated");
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


    public function completed(Request $request, Todo $todo)
    {



        $todo->update(['completed_at' => now()]);

        return back()->with("message", "Completed Succesfully");
    }
}
