<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petani extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'jenis_kelamin',
        'lokasi',
        'luas',
    ];

    protected $dates = ['tanggal_lahir'];

    public function getTanggalLahirAttribute($value)
    {
        return Carbon::parse($value);
    }
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
