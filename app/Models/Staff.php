<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getPhotoAttribute($value) {
        return asset('storage/' . $value);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
?>
