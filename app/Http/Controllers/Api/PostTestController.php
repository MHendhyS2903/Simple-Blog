<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\PostSent;
use App\Post;

class PostTestController extends Controller
{
    public function postAPI(Request $request)
    {
        $postID = Post::find($request);

        event(new PostSent($postID));

        return response()->json([
            'status' => 'Mantap !',
            'data' => $postID,
            'message' => 'Data Ditemukan'
        ]);
    }
}
