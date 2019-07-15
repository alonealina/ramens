<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ramen; // 追加

class RamensController extends Controller
{
    public function index()
    {
        $ramens = Ramen::orderBy('id', 'desc')->paginate(10);

        return view('ramens.index', [
            'ramens' => $ramens,
        ]);
    }
    
    public function show($id)
    {
        $ramen = Ramen::find($id);

        return view('ramens.show', [
            'ramen' => $ramen,
        ]);
    }
    
}