<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'prenom',
        'nom',
        'email',
        'telephone',
    ];

    // Un client peut avoir plusieurs devis
    public function devis()
    {
        return $this->hasMany(Devis::class);
    }
}