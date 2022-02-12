<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserAdController extends Controller
{
    public function index(User $user)
    {
        $ads = $user->ads()->with(['user', 'likes'])->paginate(3);
        return view('users.ads.index', [
            'user' => $user,
            'ads' => $ads
        ]);
    }
}
