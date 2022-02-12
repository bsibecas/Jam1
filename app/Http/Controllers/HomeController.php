<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function show(Ad $user)
    {
        config()->set('database.connections.mysql.strict', false);
        DB::reconnect();

        $ads = Ad::select('ads.*')
            ->join('likes', 'likes.ad_id', '=', 'ads.id')
            ->groupby('likes.ad_id')
            ->orderBy(DB::raw('count(likes.ad_id)'),'DESC') 
            ->LIMIT(3)
            ->get();

        config()->set('database.connections.mysql.strict', true);
        DB::reconnect();

        return view('home', [
            'ads' => $ads,
            
          
           
        ]);

    }
}

