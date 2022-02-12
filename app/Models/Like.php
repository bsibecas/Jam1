<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id'
    ];
}
