<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;

    protected $fillable = [
        'wahana_id',
        'user_id',
        'komentar',
    ];

    public function wahana()
    {
        return $this->belongsTo(Wahana::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
