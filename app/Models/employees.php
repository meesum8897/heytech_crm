<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function company()
    {
        return $this->belongsTo(companies::class);
    }
}
