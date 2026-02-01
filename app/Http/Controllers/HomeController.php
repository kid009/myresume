<?php

namespace App\Http\Controllers;

use App\Models\PersonalInfo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $info = PersonalInfo::first();

        return view('home', [
            'info' => $info,
        ]);
    }
}
