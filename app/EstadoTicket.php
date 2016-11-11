<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoTicket extends Model
{
    protected $table='estado_ticket';
    protected $fillable=['name','descripcion'];

    public function ticket(){
        return $this->belongsTo(ticket::class);
    }


}
