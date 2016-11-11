
@extends('layouts.app')

@section('content')
@if(Session::has('flash_message'))
           <div class="alert alert-success">
               {{ Session::get('flash_message') }}
           </div>
       @endif
    <div class="container">
      <form action="{{route('ticket.searchTicket')}}" method="post">
         {{ csrf_field() }}
         <input type="text" name="name" placeholder="Search..">
         <button type="submit" class="btn btn-primary ">
             <i class=""></i>Buscar
         </button>
     </form>
    </div>
    <div class="container">
      <a href="{!!route('ticket.otro')!!}">Agregar Ticket</a>

        <div class="col-sm-offset-2 col-sm-8">

            <!-- Current Tasks -->
            @if (count($tickets) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tickets Actuales
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Paciente</th>
                                <th>Descripcion</th>
                                <th>Estado</th>
                                <th>By</th>
                                <th>Fecha</th>
                            </thead>
                            <tbody>
                                @foreach ($tickets as $ticket)
                                    <tr>
                                        <td class="table-text"><div>{{$ticket->nombre}}</div></td>
                                        <td class="table-text"><div>{{$ticket->descripcion}}</div></td>
                                        <td class="table-text"><div>{{$ticket->estadoTicket->name}}</div></td>
                                        <td class="table-text"><div>{{$ticket->user->name}}</div></td>
                                        <td class="table-text"><div>{{$ticket->created_at}}</div></td>
                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="{{route('ticket.delete',$ticket->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>

                                        </td>
                                        <td>
                                          <form action="{{route('ticket.edit',$ticket->id)}}" method="get">
                                             {{ csrf_field() }}

                                             <button type="submit" class="btn btn-primary ">
                                                 <i class=""></i>Edit
                                             </button>
                                         </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @else
                  <h1>No existen tickets aun!</h1>
            @endif
        </div>
    </div>
@endsection
