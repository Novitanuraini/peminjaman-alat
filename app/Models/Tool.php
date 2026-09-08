<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'name', 'slug', 'category_id', 'description',
        'stock', 'available_stock', 'condition', 'image', 'daily_fine', 'is_active',
    ];

    protected $casts = [
        'daily_fine' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }

    public function isAvailable()
    {
        return $this->available_stock > 0;
    }
}