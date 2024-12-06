@extends ('layouts.admin')
@section ('content')
    <div>
        <h1>listado de Usuarios</h1>

        <hr>

        
  <div class="row">
  <div class="col-md-10">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Usuarios Registrados</h3>

                <div class="card-tools">
                  <a href="{{url('admin/usuarios/create')}}"  class="btn btn-primary">
                    Regitrar nuevo
                  </a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if( (($message = Session::get('mensaje')) && ($icono = Session::get('icono'))) )
                <script>
                  Swal.fire({
                  position: "top-end",
                  icon: "{{$icono}}",
                  title: "{{$message}}",
                  showConfirmButton: false,
                  timer: 4500
});
                </script>
                @endif
              <table id="example1" class="table table-striped table-bordered table-hover table-sm">
      <thead class="table-dark">
        <tr>
          <td style="text-align: center"><b>Nmro</b></td>
          <td style="text-align: center"><b>Nombre</b></td>
          <td style="text-align: center"><b>Email</b></td>
          <td style="text-align: center"><b>Acciones</b></td>
        </tr>
      </thead>
  <tbody>
    <?php $contador=1;?>
  @foreach($usuarios as $usuarios)
        <tr>
            <td style="text-align: center">{{$contador++}}</td>
            <td>{{$usuarios->name}}</td>
            <td>{{$usuarios->email}}</td>
            <td>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="{{url('admin/usuarios/'.$usuarios->id)}}" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye-fill">Ver</i></a>
                <a href="{{url('/admin/usuarios/'.$usuarios->id.'/edit')}}" type="button" class="btn btn-succes btn-sm"><i class="bi bi-pen">Editar</i></a>
                <a href="{{url('/admin/usuarios/'.$usuarios->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash2-fill">Eliminar</i></a>
</div>
            </td>
        </tr>
        @endforeach
  </tbody>
</table>
<script>
                        $(function () {
                            $("#example1").DataTable({
                                "pageLength": 10,
                                "language": {
                                    "emptyTable": "No hay información",
                                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
                                    "infoFiltered": "(Filtrado de _MAX_ total Usuarios)",
                                    "infoPostFix": "",
                                    "thousands": ",",
                                    "lengthMenu": "Mostrar _MENU_ Usuarios",
                                    "loadingRecords": "Cargando...",
                                    "processing": "Procesando...",
                                    "search": "Buscador:",
                                    "zeroRecords": "Sin resultados encontrados",
                                    "paginate": {
                                        "first": "Primero",
                                        "last": "Ultimo",
                                        "next": "Siguiente",
                                        "previous": "Anterior"
                                    }
                                },
                                "responsive": true, "lengthChange": true, "autoWidth": false,
                                buttons: [{
                                    extend: 'collection',
                                    text: 'Reportes',
                                    orientation: 'landscape',
                                    buttons: [{
                                        text: 'Copiar',
                                        extend: 'copy',
                                    }, {
                                        extend: 'pdf'
                                    },{
                                        extend: 'csv'
                                    },{
                                        extend: 'excel'
                                    },{
                                        text: 'Imprimir',
                                        extend: 'print'
                                    }
                                    ]
                                },
                                    {
                                        extend: 'colvis',
                                        text: 'Visor de columnas',
                                        collectionLayout: 'fixed three-column'
                                    }
                                ],
                            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                        });
                    </script>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
            
    
</div>

    </div>

    
@endsection