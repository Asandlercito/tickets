<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ticket;
use App\EstadoTicket;

class HomeController extends Controller
{
  public function loginView(){
      return view('login');
  }

  public function agregarTicketView(){
      $tickets=Ticket::All();
      $estados=EstadoTicket::ALL();
      return view('agregarTickets',compact('tickets','estados'));
  }

  public function showTickets(){

        $tickets=Ticket::All();
        //dd($tickets);
        return view('index',compact('tickets'));

  }




}
