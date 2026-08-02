<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
    protected function casts(): array { return ['pickup_date' => 'datetime', 'return_date' => 'datetime', 'follow_up_date' => 'datetime', 'raw_payload' => 'array']; }
    public function notes(): HasMany { return $this->hasMany(LeadNote::class); }
    public function statusHistory(): HasMany { return $this->hasMany(LeadStatusHistory::class); }
}
