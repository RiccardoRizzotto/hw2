<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function reservations() {
        return $this->hasMany("App\Models\Reservation", 'id_utente_prenotazione');
    }
}
?>