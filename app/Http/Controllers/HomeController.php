<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $annonces = Annonce::where('status', true)->orderBy('created_at', 'desc')->get();
        return view('home', compact('annonces'));
    }

}
