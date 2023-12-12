<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OsnPeserta extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function data_peserta()
    {
        return $this->belongsTo(DataPeserta::class, 'data_peserta_id', 'id');
    }
}
