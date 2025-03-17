<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pracownik extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'firma_id',
        'imie',
        'nazwisko',
        'email',
        'numer_telefonu',
    ];

    public function firma()
    {
        return $this->belongsTo(Firma::class);
    }
}
