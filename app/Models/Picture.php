<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_path',
        'pictureable_id',
        'picturable_type',
    ];

    public function pictureable()
    {
        return $this->morphTo();
    }
}
