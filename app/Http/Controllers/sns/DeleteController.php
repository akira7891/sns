<?php

namespace App\Http\Controllers\sns;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Services\TweetService;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,TweetService $tweetService)
    {
        $tweetId=(int) $request->route('tweetId');
        if(!$tweetService->checkUserId($request->user()->id,$tweetId))
        {
            return "他のユーザーの投稿は操作することはできません";
        }
        $tweet=Tweet::where('id',$tweetId)->first();
        $tweet->delete();

        return redirect()
        ->route('top.index')
        ->with('feedback.success',"$tweetId" . "の" . "つぶやきを削除しました");
    }
}
