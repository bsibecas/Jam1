<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'productname',
        'price',
        'category',
        'location',
        'condition',
        'description',
        'file_path',
    ];
    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
