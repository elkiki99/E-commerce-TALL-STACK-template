<?php

namespace App\Http\Controllers;

use App\Models\Like;

class LikeController extends Controller
{
    public function index()
    {
        $this->authorize('viewLikes', Like::class);
        return view('likes.index');
    }
}