<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;

class CategorySearch extends Controller
{
    public function catSearch()
    {
        $search_text = $_GET['cat'];
        $ads = Ad::where('category', 'LIKE', '%' . $search_text . '%')->paginate(3);
        return view('ads.catSearch', [
            'ads' => $ads,
            'search_text' => $search_text
        ]);
    }
}
