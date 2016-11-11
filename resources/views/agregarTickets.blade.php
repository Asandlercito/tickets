
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
          <div class="panel panel-default">
              <div class="panel-heading">
                  Nuevo Ticket
              </div>

              <div class="panel-body">
                  <!-- Display Validation Errors -->
                  @include('common.errors')

                  <!-- New ticket Form -->
                  <form action="{{route('ticket.store')}}" method="POST" class="form-horizontal">
                      {{ csrf_field() }}

                      <!-- Task Name -->
                      <div class="form-group">
                          <!-- <label for="task-name" class="col-sm-3 control-label">Nombre</label> -->

                          <div class="col-sm-6">
                            Paciente:<input type="text" name="nombre" id="name" class="form-control">
                          </div>

                          <!-- <label for="task-name" class="col-sm-3 control-label">Descripcion</label> -->

                          <div class="col-sm-6">
                            Descripcion:<input type="text" name="descripcion" id="descripcion" class="form-control">
                          </div>
                          <!-- <label for="task-name" class="col-sm-3 control-label">Estado</label> -->

                          <div class="col-sm-6">
                            Estado:
                            <select name="estadoTicket_id">
                                @foreach ($estados as $estado)
                                  <option value="{{$estado->id}}" >{{$estado->name}}</option>
                                @endforeach
                            </select>
                          </div>


                      </div>

                      <!-- Add Task Button -->
                      <div class="form-group">
                          <div class="col-sm-offset-3 col-sm-6">
                              <button type="submit" class="btn btn-default">
                                  <i class="fa fa-btn fa-plus"></i>Agregar Ticket
                              </button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>


        </div>
    </div>
@endsection
