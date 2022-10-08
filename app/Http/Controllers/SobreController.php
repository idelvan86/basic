<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homesobre;
class SobreController extends Controller
{
 
public function HomeAbout(){
    $homeabout = HomeSobre::latest()->get();
    return view('admin.sobre.index', compact('homeabout'));
 }

}
