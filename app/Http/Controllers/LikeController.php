<?php

namespace App\Http\Controllers;

use App\Model\Like;
use App\Model\Reply;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LikeController extends Controller
{
    public function likeIt(Reply $reply)
    {
        $reply->likes()->create(['user_id'=>auth()->user()->id]);
        return response()->json(['message'=>'Reply liked'],Response::HTTP_CREATED);
    }

    public function unLikeIt(Reply $reply)
    {
        $reply->likes()->where(['user_id'=>auth()->user()->id])->first()->delete();
        return \response()->json(['message'=>'Reply unliked'],203);
    }
}
