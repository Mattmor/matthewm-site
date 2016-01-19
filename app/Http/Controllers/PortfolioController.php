<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PortfolioController extends Controller
{
    public function jason()
    {
        $pagetitle = 'Jason\'s Barbers';
        return view('portfolio.jason')->with('pagetitle', $pagetitle);
    }
}
