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

 public function HomeAdd(){
    $homeabout = HomeSobre::latest()->get();
    return view('admin.sobre.create', compact('homeabout'));
 }

 public function HomeSalvar(){
   
 }


}
