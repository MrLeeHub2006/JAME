@extends ('layouts.admin')
@section ('content')
    <div>
        <h1>Usuario: {{$usuario->name}}</h1>
    </div>

    <hr>

    <div class="row">
    <div class="col-md-6">
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">Datos registrados</h3>
              </div>
              <div class="card-body">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <label for="">Nombre del Usuario</label>
                            <p>{{$usuario->name}}</p>
                        </div>

                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <label for="">Email</label>
                            <p>{{$usuario->email}}</p>
                        </div>

                    </div>
                </div>

                <br> 

                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <a href="{{url('admin/usuarios')}}" class="btn btn-secundary">Cancelar</a>
                        </div>

                    </div>
                </div>
                


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
    </div>
@endsection