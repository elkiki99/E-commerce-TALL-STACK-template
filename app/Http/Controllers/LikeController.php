<?php

namespace App\Http\Controllers;

use App\Models\Like;

class LikeController extends Controller
{
    public function index()
    {
        // $this->authorize('viewAny', $like);
        return view('likes.index');
    }


    // public function store(Request $request, $productId)
    // {
    //     $like = Like::firstOrCreate([
    //         'user_id' => Auth::id(),
    //         'product_id' => $productId,
    //     ]);

    //     return redirect()->back();
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy($productId)
    // {
    //     $like = Like::where('user_id', Auth::id())->where('product_id', $productId)->first();
    //     if ($like) {
    //         $like->delete();
    //     }

    //     return redirect()->back();
    // }
}