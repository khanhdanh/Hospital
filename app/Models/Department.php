<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getPhotoAttribute($value) {
        return asset('storage/app/'. $value);
    }

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

}
