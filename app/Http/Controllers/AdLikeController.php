<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use App\Models\Like;
use App\Mail\AdInterested;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdLikeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function showLikeAd($id)
    {
       

        $ads = Ad::select('ads.*')
        ->join('likes', 'likes.ad_id', '=', 'ads.id')
        ->where('likes.user_id', '=', $id)
        ->paginate(3);

        return view('users.ads.interestedin', [
            'ads' => $ads
        ]);
    }


    public function store(Ad $ad, Request $request)
    {
        if ($ad->likedBy($request->user())) {
            return response(null, 409);
        }
        $ad->likes()->create([
            'user_id' => $request->user()->id,
        ]);

        if (!$ad->likes()->onlyTrashed()->where('user_id', $request->user()->id)->count()) {
            Mail::to($ad->user)->send(new AdInterested(auth()->user(), $ad));
        }



        return back();
    }

    public function destroy(Ad $ad, Request $request)
    {
        $request->user()->likes()->where('ad_id', $ad->id)->delete();
        return back();
    }
}
