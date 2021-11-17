<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exhibition extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
    ];

    public function cabinets()
    {
        return $this->hasMany(Cabinet::class);
    }
}
