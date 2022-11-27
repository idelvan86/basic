<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Portifolio;
use App\Http\Controllers\UserController;

class PortfolioController extends Controller
{
    public function HomePortfolio(){
        $portfolio = Portifolio::latest()->get();
        return view('admin.portfolio.index', compact('portfolio'));
     }}
