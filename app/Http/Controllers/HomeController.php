<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class HomeController extends Controller
{

    public function HomeSlider(){
$sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));

    }


}
