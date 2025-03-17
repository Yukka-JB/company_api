<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firma extends Model
{
    use HasFactory;

    protected $fillable = [
        'nazwa',
        'NIP',
        'adres',
        'miasto',
        'kod_pocztowy',
    ];

    public function pracownicy()
    {
        return $this->hasMany(Pracownik::class);
    }
}
