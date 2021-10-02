<?php

namespace App\Http\Controllers;

use App\Models\galleries;
use App\Models\Screenshots;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    public function index(){
        return view('pages.Gallery.Gallery',[
            'listImages'=> Screenshots::orderBy('id','asc')->limit(12)->get(),
            'listGalery'=> galleries::orderBy('id','asc')->limit(12)->get(),
        ]);
    }
}
