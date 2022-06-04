<?php

namespace App\Http\Controllers\sns;

use App\Http\Controllers\Controller;
use App\Http\Requests\sns\CreateRequest;
use Illuminate\Http\Response;
use App\Models\Tweet;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CreateRequest $request,Response $response)
    {
        $tweet= new Tweet;
        $tweet->content=$request->tweet();
        $tweet->save();
        return "<pre>$request</pre> . <pre>$response</pre>" . $request->tweet() . redirect("/");
    }
}
