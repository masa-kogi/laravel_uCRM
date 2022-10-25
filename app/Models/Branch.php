<?php

namespace App\Models;
use App\Models\Purchase;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
