<?php

namespace App\Http\Controllers;

use App\DTOs\HomeDto;
use Illuminate\Support\Facades\App;

class PortfolioController extends Controller
{
    public function index()
    {
        App::setlocale('th');

        $homeData = HomeDto::make();

        return view('portfolio.index', [
            'homeData' => $homeData,
        ]);
    }
}
