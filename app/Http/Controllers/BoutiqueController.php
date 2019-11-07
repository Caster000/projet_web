<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoutiqueController extends Controller
{
    public function index(){
        return view('boutique.boutique');
    }

    public function panier(){
        return view('boutique.panier');
    }

    public function article($numero){
        return view('boutique.article', compact('numero'));
    }

}
