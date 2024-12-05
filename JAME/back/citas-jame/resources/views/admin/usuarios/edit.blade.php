@extends ('layouts.admin')
@section ('content')
    <div>
        <h1>Editar usuario: {{$usuario->name}}</h1>
    </div>

    <hr>

    <div class="row">
    <div class="col-md-6">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">Complete los datos</h3>
              </div>
              <div class="card-body">
                <form action="{{url('admin/usuarios',$usuario->id) }}" method="POST">
                @method('PUT')    
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <label for="">Usuario</label> <p>*</p>
                            <input type="text" value="{{$usuario->name}}" name="name" class="form-control" required>
                            @error('name')
                            <small style="color:red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <label for="">Email</label> <p>*</p>
                            <input type="email" value="{{$usuario->name}}" name="email" class="form-control" required>
                            @error('email')
                            <small style="color:red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <label for="">Contraseña</label>
                            <input type="password" value="{{old('password')}}" name="password" class="form-control">
                            @error('password')
                            <small style="color:red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <label for="">Confirme su Contraseña</label>
                            <input type="password" value="{{old('password_confirmation')}}" name="password_confirmation" class="form-control">
                            @error('password_confirmation')
                            <small style="color:red">{{$message}}</small>
                            @enderror
                        </div>

                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <a href="{{url('admin/usuarios')}}" class="btn btn-secundary">Cancelar</a>
                            <button type="submit" class="btn btn-success">Actualizar usuario</button>
                        </div>

                    </div>
                </div>
                </form>


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
    </div>
@endsection