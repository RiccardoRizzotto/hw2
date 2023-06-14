<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';
    public $timestamps = false;

    public function users()
    {
        return $this->belongsTo("App\Models\User", "id_utente_prenotazione");
    }
}
?>