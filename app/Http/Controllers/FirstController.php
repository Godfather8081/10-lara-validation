<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFirstRequest;
use Illuminate\Http\Request;

class FirstController extends Controller
{
    //

    public function firstReq(StoreFirstRequest $req)
    {
        // keep in mind by doing this validated method will return simple array
        // so we can't get data like $validated->title we have to de $validated['title]
        // $validated = $req->validated();


        dd([

            'req data' => $req->all(),
            'validated data' => $req->validated(),


        ]);
    }
}
