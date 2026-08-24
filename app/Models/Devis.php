<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
    protected $fillable = [
        'client_id',
        'type_evenement',
        'nb_convives',
        'date_evenement',
        'message',
        'statut',
    ];

    protected $casts = [
        'date_evenement' => 'date',
    ];

    // Un devis appartient à un client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}