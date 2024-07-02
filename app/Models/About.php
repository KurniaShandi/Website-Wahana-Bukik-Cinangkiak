<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'foto',
        'judul',
        'deskripsi',
        'alamat',
        'nomor_hp',
        'email',
        'link_youtube',
        'link_facebook',
        'link_instagram',
        'link_email',
        'link_twitter',
    ];
}
