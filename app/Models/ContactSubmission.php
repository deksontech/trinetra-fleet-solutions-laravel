<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ContactSubmission extends Model { use SoftDeletes; protected $guarded = ['id']; protected function casts(): array { return ['consent' => 'boolean']; } }
