<?php
namespace App\Services;

use App\Models\Tweet;

class TweetService
{
    public function getTweets()
    {
        return Tweet::orderBy('created_at','DESC')->get();
    }

    public function checkUserId(int $userId,int $tweetId): bool
    {
        //データベースのレコードを一つ取得
        $tweet=Tweet::where('id',$tweetId)->first();
        
        //中身がない場合false ある場合true　逆になる　中身がない場合true ある場合false
        if(!$tweet){
            return false;
        }else{
            return $tweet->user_id === $userId;
        }
    }
}
