<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_pemesanan',
        'bukti_pembayaran',
        'kode_tiket',
        'jumlah_tiket',
        'tanggal_transaksi',
        'total_bayar',
        'status',
        'jadwal_id',
        'user_id',
        'wahana_id',
        'payment_id',
    ];

    public function wahana()
    {
        return $this->belongsTo(Wahana::class);
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
