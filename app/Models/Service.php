<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
    protected function casts(): array { return ['features' => 'array', 'process' => 'array', 'is_optional' => 'boolean', 'published_at' => 'datetime']; }
}
