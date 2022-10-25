<?php

namespace App\Models;

use App\Models\SecondaryCategory;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrimaryCategory extends Model
{
    use HasFactory;

    public function secondaries()
    {
        return $this->hasMany(SecondaryCategory::class);
    }
}
