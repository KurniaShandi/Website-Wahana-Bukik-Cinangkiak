<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'wahana_id',
        'waktu_mulai',
        'waktu_selesai',
        'hari_operasional',
        'stock',
    ];

    public function wahana()
    {
        return $this->belongsTo(Wahana::class);
    }
}
