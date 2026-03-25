<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CafeteriaSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
        'notes',
        'sold_at',
    ];

    protected function casts(): array
    {
        return [
            'sold_at' => 'datetime',
            'total' => 'decimal:2',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(CafeteriaSaleItem::class, 'sale_id');
    }
}
