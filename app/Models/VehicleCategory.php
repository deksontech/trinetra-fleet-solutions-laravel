<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleCategory extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
    public function vehicles(): HasMany { return $this->hasMany(Vehicle::class); }
}
