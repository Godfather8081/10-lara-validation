<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreThirdRequest;
use Illuminate\Http\Request;

class ThirdController extends Controller
{
    public function add(StoreThirdRequest $req)
    {
        dd('hit');
    }
}
