<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuisoner extends Model
{
    use HasFactory;

    protected $fillable = [
        'pertanyaan',
        'penjelasan',
    ];

    public function jawaban()
    {
        return $this->hasMany('App\Models\IsiKuisoner');
    }
}
