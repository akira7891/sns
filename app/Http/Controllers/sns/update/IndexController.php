<?php

namespace App\Http\Controllers\sns\update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Services\TweetService;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,TweetService $tweetService)
    {
        $tweetId= (int) $request->route('tweetId');
        if(!$tweetService->checkUserId($request->user()->id,$tweetId))
        {
            return "他のユーザーの投稿は操作することはできません";
        }

        $tweet=Tweet::where('id',$tweetId)->first();
        $data=['tweet'=>$tweet,'tweetId'=>$tweetId];
        if(is_null($tweet)){
            return '存在しないつぶやきです';
        }
        return view('sns.update',$data);
    }
}
