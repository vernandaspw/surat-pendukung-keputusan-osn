<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Osn extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function pesertas() {
        return $this->hasMany(OsnPeserta::class);
    }
}
