<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreUser extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari nama model
    protected $table = 'pre_users';

    // Tentukan kolom yang bisa diisi secara mass-assignment
    protected $fillable = [
        'username',
        'fullname',
        'email',
        'wa_number',
        'gender',
        'activation_code',
        'activation_code_expired_at',
    ];

    // Kolom yang harus dikecualikan dari mass-assignment (defaultnya adalah id dan timestamps)
    protected $guarded = [];
}
