<?php

namespace App\Http\Controllers;

use App\Models\Tag;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {


        $tags = Tag::paginate(5);

        return view('tags.index', ['tags' => $tags]);
    }

    public function edit(Tag $tag)
    {

        return view('tags.edit', ['tag' => $tag]);
    }


    public function destroy(Tag $tag)
    {
        $tag->delete();
        return back()->with("message", "Tag is deleted");
    }


    public function update(Request $request, Tag $tag)
    {
        $data = $request->validate([
            'tag' => 'required|max:250',

        ]);

        $tag->update($data);

        return back()->with("message", "Tag has updated");
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'tag' => 'required|max:250',

        ]);


        Tag::create($data);

        return back()->with("massage", "tagu u krijua me sukses");
    }

    
}
