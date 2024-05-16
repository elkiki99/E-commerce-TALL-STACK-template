<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagsController extends Controller
{
    public function index()
    {
        if(auth()->user()->admin === 0) {
            return redirect()->route('home');
        }

        $this->authorize('viewAny', Tag::class);
        return view('tags.index');
    }

    public function create()
    {
        if(auth()->user()->admin === 0) {
            return redirect()->route('home');
        }

        $this->authorize('create', Tag::class);
        return view('tags.create');
    }

    public function show(Tag $tag)
    {
        return view('tags.show', [
            'tag' => $tag
        ]);
    }

    public function edit(Tag $tag)
    {
        if(auth()->user()->admin === 0) {
            return redirect()->route('home');
        }
        
        $this->authorize('update', $tag);
        return view('tags.edit', [
            'tag' => $tag
        ]);
    }
}
