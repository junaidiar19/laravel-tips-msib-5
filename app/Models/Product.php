<?php

namespace App\Models;

use App\Enums\PublishmentEnum;
use App\Models\Scopes\OrderingScope;
use App\Traits\PublishmentTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, PublishmentTrait;

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new OrderingScope);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Scope for Filter
     */
    public function scopeFilter($query, array $params)
    {
        if (@$params['category_id']) {
            $query->where('category_id', $params['category_id']);
        }

        if (@$params['search']) {
            $query->where('name', 'like', "%{$params['search']}%");
        }
    }
}
