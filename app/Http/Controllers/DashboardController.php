<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PortfolioCategory as Category;
use App\Models\Portfolio;
use App\Models\Landing;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index()
    {
    	return view('pages.dashboard');
    }

    public function landing()
    {
    	return view('welcome', compact('item'));
    }
}
