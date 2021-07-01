<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSceeondRequest;
use Illuminate\Http\Request;

class SeccondController extends Controller
{

    public function store(StoreSceeondRequest $req)
    {
        dd('hit');
    }
}
