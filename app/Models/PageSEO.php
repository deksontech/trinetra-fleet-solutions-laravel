<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class PageSEO extends Model { protected $table = 'page_seos'; protected $guarded = ['id']; protected function casts(): array { return ['no_index' => 'boolean']; } }
