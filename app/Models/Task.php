<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'content',
        'status',
        'category_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }
}
