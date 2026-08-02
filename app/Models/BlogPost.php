<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
    protected function casts(): array { return ['published_at' => 'datetime']; }
    public function category(): BelongsTo { return $this->belongsTo(BlogCategory::class, 'blog_category_id'); }
}
