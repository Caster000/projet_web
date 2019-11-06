<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoutiqueController extends Controller
{
    public function boutique(){
        return view('boutique');
    }

    public function article($numero){
        return view('article', compact('numero'));
    }

}
