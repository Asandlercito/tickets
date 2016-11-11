<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
  protected $table='ticket';
  protected $fillable=['nombre','descripcion','estadoTicket_id','users_id'];

  public function estadoTicket(){
   return $this->hasOne(EstadoTicket::class,'id','estadoTicket_id');
  }

  public function user(){
   return $this->belongsTo(User::class,'users_id','id');
  }

}
