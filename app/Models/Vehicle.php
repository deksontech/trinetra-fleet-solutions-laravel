<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
    protected function casts(): array { return ['features' => 'array', 'suitable_services' => 'array', 'published_at' => 'datetime', 'featured' => 'boolean']; }
    public function category(): BelongsTo { return $this->belongsTo(VehicleCategory::class, 'vehicle_category_id'); }
    public function images(): HasMany { return $this->hasMany(VehicleImage::class); }
}
