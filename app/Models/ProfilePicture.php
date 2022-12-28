<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilePicture extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_path',
        'user_id',
    ];
    // protected $attributes = [
    //     'file_path' => url("images/blank-profile-picture.png"),
    // ];


    public function user(){
        return $this->hasOne(User::class);
    }
}
