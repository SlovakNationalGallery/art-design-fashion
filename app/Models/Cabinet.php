<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabinet extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'location',
        'exhibition_id',
    ];

    public function exhibition()
    {
        return $this->belongsTo(Exhibition::class);
    }
}
