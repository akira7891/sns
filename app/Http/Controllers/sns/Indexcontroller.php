<?php

namespace App\Http\Controllers\sns;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $data=["name"=>"あきら"];
        return view('sns.index',$data);
    }
}
