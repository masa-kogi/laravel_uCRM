<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Purchase;
use App\Models\SecondaryCategory;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'item_code',
        'category',
        'memo',
        'price',
        'is_selling'
    ];

    public function category()
    {
        return $this->belongsTo(SecondaryCategory::class, 'secondary_category_id');
    }

    public function purchases()
    {
        return $this->belongsToMany(Purchase::class)
            ->withPivot('quantity');
    }
}
