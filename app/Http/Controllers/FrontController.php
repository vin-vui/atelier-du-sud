<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Work;

class FrontController extends Controller
{

    function indexArtists()
    {
        $artists = Artist::where('status', true)->get();
        return view('artists', compact('artists'));
    }

    function showArtist(Artist $artist)
    {
        return view('artist', compact('artist'));
    }

    function indexWorks()
    {
        $works = Work::where('status', true)->get();
        
        return view('works', compact('works'));
    }

    function showWork(Work $work)
    {
    
    return view('work', compact('work'));
    
    }

}