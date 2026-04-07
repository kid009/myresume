<?php

namespace App\Http\Controllers;

use App\DTOs\HomeDto;
use App\DTOs\PortfolioDto;
use Illuminate\Support\Facades\App;

class PortfolioController extends Controller
{
    public function index()
    {
        $homeData = HomeDto::make();

        $getProjects = PortfolioDto::getProjects();

        return view('portfolio.index', [
            'homeData' => $homeData,
            'getProjects' => $getProjects,
        ]);
    }
}
