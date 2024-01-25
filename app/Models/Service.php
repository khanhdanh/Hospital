<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getStatusAttribute($value) {
        if ($value == 1) {
            return "Active";
        } else if ($value == 0) {
            return "Inactive";
        }
    }

    public function getPhotoAttribute($value) {
        return asset('storage/app/'. $value);
    }
}
