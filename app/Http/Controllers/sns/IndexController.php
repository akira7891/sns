<?php

namespace App\Http\Controllers\sns;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $tweets=Tweet::orderBy('created_at','DESC')->get();
        $data=["tweets"=>$tweets];
        return view('sns.index',$data);
    }
}
