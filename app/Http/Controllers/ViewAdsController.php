<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ViewAdsController extends Controller
{
    public function index()
    {

        $ads = Ad::latest()->with(['user', 'likes'])->paginate(3);
        return view('ads.viewads', [
            'ads' => $ads
        ]);
    }

    public function show(Ad $ad)
    {

        return view('ads.show', [
            'ad' => $ad
        ]);
    }

    public function destroy(Ad $ad)
    {
        $this->authorize('delete', $ad);
        $image_path = public_path() . '/' . $ad->file_path;
        unlink($image_path);
        $ad->delete();

        return back();
    }

    public function edit(Ad $ad, $id)
    {

        $ad = Ad::find($id);
        return view('ads.edit', [
            'ad' => $ad
        ]);
    }


    public function update(Request $request, $id)
    {

        $result = Ad::find($id);
        if (File::exists($request->hasFile('file'))) {
            $image_path = public_path() . '/' . $result->file_path;
            unlink($image_path);
        }

        $result->productname = $request->input('productname');
        $result->price = $request->input('price');
        $result->category = $request->input('category');
        $result->location = $request->input('location');
        $result->condition = $request->input('condition');
        $result->description = $request->input('description');
        if ($file = $request->hasFile('file')) {

            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path();
            $file->move($destinationPath, $fileName);
            $result->file_path = $fileName;
        }
        $result->save();
        return redirect('viewads');
    }
}
