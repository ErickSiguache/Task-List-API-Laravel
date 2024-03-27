<?php

namespace App\Models;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function task(): HasMany {
        return $this->hasMany(Task::class);
    }
}
