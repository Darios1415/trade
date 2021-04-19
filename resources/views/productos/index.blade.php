@extends('layouts.main', ['activePage' => 'Productos', 'titlePage' => 'Productos'])
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
<div class="content">
<div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
        <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header card-header-primary"> 
                <h4 class="card-title">Productos</h4>
                <p class="card-category">Productos Registrados</p>
            </div>
            <div class="card-body">
            <div class="row">
            <div class="col-12 text-right">
                <a href="{{ route('productos.create') }}" class="btn btn-sm btn-facebook">Añadir producto</a>
            </div>
            </div>
            <div class="table-responsive">
            <table id="productos" class="table">
                <thead class="text-primary">
                    <th>Clave</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Existencias</th>
                    <th>precio</th>
                    <th>Categoria</th>
                    <th>Descripcion</th>
                    <th class="text-right">Acciones</th>
                </thead>
                <tbody>
                @foreach ($productos as $pro)
                <tr>
                    <td>{{$pro->idpr}}</td>
                    <td><img src="/img/productos/{{$pro->img}}" width="100px" alt=""></td>
                    <td>{{$pro->nombre}}</td>
                    <td>{{$pro->existencia}}</td>
                    <td>{{$pro->precio}}</td>
                    <td>{{$pro->categorias}}</td>
                    <td>{{$pro->descripcion}}</td>
                    <td class="text-right">
                        <form action="{{route('productos.destroy',$pro->idpr)}}" method="POST" class="formulario-eliminar">   
                            @csrf
                            @method("DELETE")
                            <a href="/productos/{{$pro->idpr}}/edit" class="btn btn-warning"><i class="material-icons">edit</i></a>
                            @if($pro->deleted_at)
                            <a href="{{route('activarproducto', $pro->idpr)}}" class="btn btn-warning"> <i class="material-icons">done</i></a>
                            <button type="submit" class="btn btn-secondary"><i class="material-icons">delete</i></button>
                            @else
                            <a href="{{route('desactivaproducto', $pro->idpr)}}" class="btn btn-danger"> <i class="material-icons">dangerous</i></a>
                            @endif
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
            </div>
            <div class="card-footer mr-auto">
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>

@if (session('success') =='ok')
<script>
   Swal.fire({
  position: '',
  icon: 'success',
  title: 'Producto creado',
  showConfirmButton: false,
  timer: 1500
})
</script>
@endif


@if (session('success') =='edit')
<script>
   Swal.fire({
  position: '',
  icon: 'success',
  title: 'Producto Editado',
  showConfirmButton: false,
  timer: 1500
})
</script>
@endif

@if (session('success') =='desactiver')
<script>
Swal.fire('Producto desactivado')
</script>
@endif


@if (session('success') =='activer')
<script>
Swal.fire('Producto activado')
</script>
@endif

<script>
    $('.formulario-eliminar').submit(function(e){
        e.preventDefault();
            Swal.fire({
            title: '¿Desea eliminar este Producto?',
            text: "¡Este Producto se eliminara definitivamente!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡si, eliminar!',
            cancelButtonText: '¡Cancelar!',
            }).then((result) => {
            if (result.value) {
                this.submit();
            }
            })
    })
</script>

@if (session('success') =='delete')
<script>
       Swal.fire(
            'Producto Eliminado!',
            'El producto se elimino con exito.',
            'success'
       )
</script>
@endif

<!--Datatable-->
<script>
    $(function () {
       $('#productos').DataTable({
         "paging": true,
         "lengthChange": true,
         "searching": true,
         "ordering": true,
         "info": true,
         "autoWidth": false,
         "responsive": true,
         "language": {
         "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
       }
       });
     });
   </script>



@endsection