<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dinner extends Model
{
    use HasFactory;

    protected $table = 'dinner';

    protected $fillable = ['nama', 'descripsi', 'harga', 'meal_id'];

    public function meal()
    {
        return $this->belongsTo(menu::class, 'meal_id');
    }
}
