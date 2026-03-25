<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CafeteriaProduct extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'category',
        'sale_price',
        'cost_price',
        'stock',
        'min_stock',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'sale_price' => 'decimal:2',
            'cost_price' => 'decimal:2',
        ];
    }

    public function saleItems(): HasMany
    {
        return $this->hasMany(CafeteriaSaleItem::class, 'product_id');
    }

    public function isLowStock(): bool
    {
        return $this->stock <= $this->min_stock;
    }
}
