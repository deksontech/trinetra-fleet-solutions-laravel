<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tour extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
    protected function casts(): array { return ['itinerary' => 'array', 'inclusions' => 'array', 'exclusions' => 'array', 'notes' => 'array', 'published_at' => 'datetime']; }
    public function images(): HasMany { return $this->hasMany(TourImage::class); }
}
