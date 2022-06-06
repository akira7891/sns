<?php

namespace App\Http\Controllers\sns\update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\sns\UpdateRequest;
use App\Models\Tweet;
use App\Services\TweetService;

class PutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateRequest $request,TweetService $tweetService)
    {
        $tweetId=$request->route('tweetId');
        if(!$tweetService->checkUserId($request->user()->id,$tweetId))
        {
            return "他のユーザーの投稿は操作することはできません";
        }
        $tweet=Tweet::where('id',$request->id())->first();
        $tweet->content=$request->tweet();
        $tweet->save();
        return redirect()
        ->route('update.index',['tweetId'=>$tweet->id])
        ->with('feedback.success',"つぶやきを編集しました");
    }
}
