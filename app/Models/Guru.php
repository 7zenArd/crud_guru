<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'gurus';
    protected $primaryKey = 'nip';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nip',
        'nama_guru',
        'tgl_lahir',
        'jabatan',
        'mata_pelajaran',
        'sosmed',
    ];

    protected $casts = [
        'tgl_lahir' => 'date',
    ];
}
