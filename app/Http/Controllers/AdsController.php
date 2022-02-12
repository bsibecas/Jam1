<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use App\Models\User;

class AdsController extends Controller
{
    public function index()
    {
        return view('ads.index');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'productname' => 'required',
            'price' => 'required',
            'category' => 'required',
            'location' => 'required',
            'condition' => 'required',
            'description' => 'required',
            'file' => 'mimes:jpeg,bmp,png,jpg'
        ]);


        if ($file = $request->hasFile('file')) {

            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path();
            $file->move($destinationPath, $fileName);
        }

        $request->user()->ads()->create([
            'productname' => $request->productname,
            'price' => $request->price,
            'category' => $request->category,
            'location' => $request->location,
            'condition' => $request->condition,
            'description' => $request->description,
            'file_path' => $request->file->getClientOriginalName()

        ]);

        return back();
    }

    public function search()
    {
        $search_text = $_GET['query'];
        $ads = Ad::where('productname', 'LIKE', '%' . $search_text . '%')->orWhere('price', 'LIKE', '%' . $search_text . '%')->orWhere('category', 'LIKE', '%' . $search_text . '%')->orWhere('location', 'LIKE', '%' . $search_text . '%')->orWhere('condition', 'LIKE', '%' . $search_text . '%')->paginate(3);;
        return view('ads.search', [
            'ads' => $ads,
            'search_text' => $search_text
        ]);
    }
}

// or 'price', 'LIKE', '%' . $search_text . '%' or 'category', 'LIKE', '%' . $search_text . '%' or 'location', 'LIKE', '%' . $search_text . '%' or 'condition', 'LIKE', '%' . $search_text . '%'