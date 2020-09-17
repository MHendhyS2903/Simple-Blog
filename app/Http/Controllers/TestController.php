<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class TestController extends Controller
{
    public function test() {
        $data = "Data All test";
        return response()->json($data, 200);
    }

    public function testAuth() {
        $data = "Welcome " . Auth::user()->name;
        return response()->json($data, 200);
    }
}
