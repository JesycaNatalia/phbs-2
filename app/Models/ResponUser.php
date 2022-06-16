<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'bulan_id',
        'user_id',
        'total_skor',
    ];
}
