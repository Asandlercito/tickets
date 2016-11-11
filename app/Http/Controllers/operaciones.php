<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ticket;
use App\EstadoTicket;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
class operaciones extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      $tickets=Ticket::All();
      $estados=EstadoTicket::ALL();
      return view('index',compact('tickets','estados'));
    }

    public function searchTicket(Request $request){

      // dd($request->all());

      $tickets = Ticket::where('nombre','=',$request->name)
                      ->orWhere('descripcion','=',$request->descripcion)->get();
      if(!$tickets){
        return redirect()->action('operaciones@index');
      }
      else {
        return view('index', compact('tickets'));
      }

    }
    public function agregarView(){
        $estados=EstadoTicket::ALL();
       return view('agregarTickets',compact('estados'));
    }

    public function updateView(){
        $estados=EstadoTicket::ALL();
       return view('update',compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           //dd($request->all());
      try {
        $usuario="1";
        $obj=new Ticket();
        $obj->users_id = $usuario;
        $obj->fill($request->all());
        $obj->save();
        return redirect()->action('operaciones@index');
      } catch (Exception $e) {

      }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $ticket=Ticket::findOrFail($id);
      $estados=EstadoTicket::ALL();
      return view('update',compact('ticket','estados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //
      try {

        $ticket=Ticket::findOrFail($id);

        $ticket->fill($request->all());
        $ticket->save();
        return redirect()->action('operaciones@index');
      } catch (Exception $e) {

      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $ticket = Ticket::findOrFail($id);

      $ticket->delete();

      Session::flash('flash_message', 'Task successfully deleted!');

      return redirect()->route('index');
    }
}
