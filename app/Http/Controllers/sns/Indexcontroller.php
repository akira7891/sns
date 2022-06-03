<?php

namespace App\Http\Controllers\sns;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;

class Indexcontroller extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $tweets=Tweet::all();
        $data=["tweets"=>$tweets];
        return view('sns.index',$data);
    }
}
