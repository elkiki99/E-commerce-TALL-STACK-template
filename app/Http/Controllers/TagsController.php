<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagsController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Tag::class);
        return view('tags.index');
    }

    public function create()
    {

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
        $this->authorize('update', $tag);
        return view('tags.edit', [
            'tag' => $tag
        ]);
    }
}
