@extends('layouts.main', ['activePage' => 'Productos', 'titlePage' => 'Productos'])
@section('content')
<div class="content">
<div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
        <form action="/productos/{{$productos->idpr}}" method="post" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
            @method('Patch')
            @csrf
        <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Productos</h4>
            <p class="card-category">Editar Producto</p>
        </div> 
        <div class="card-body">
        <div class="col">
            <label  for="validationnombre">Nombre:</label>
            <input type="text" name="nombre" placeholder="Nombre" value="{{$productos->nombre}}" class="form-control" id="validationnombre" pattern="[A-Za-Z]" required>
            <div class="invalid-feedback">
                Nombre requerido.
            </div>
        </div>
        <br>
        <div class="col">
            <label for="validationexistencia">Existencias:</label>
            <input type="text" name="existencia" placeholder="Existencias" value="{{$productos->existencia}}" class="form-control" id="validationexistencia" pattern="[0-9]{1,10}" required>
        <div class="invalid-feedback">
            Existencia requerido.
        </div>
        </div>
        <br>
        <div class="col">
            <label for="validationdescripcion">Descripcion:</label><br>
                <textarea placeholder="Descripcion" name="descripcion" class="form-control" id="validationdescripcion" pattern="[A-Za-z0-9]" required>{{$productos->descripcion}}</textarea>
                <div class="invalid-feedback">
                    Descripcion requerido.
                </div>
            </div>
            <br>
        <div class="col">
            <label for="validationprecio">Precio:</label>
            <input type="text" placeholder="Precio" name="precio" value="{{$productos->precio}}" class="form-control" id="validationprecio" pattern="[0-9]{1,5}" required>
            <div class="invalid-feedback">
                Precio requerido.
            </div>
        </div>
        <br>
        <div class="col">
            <label   for="validationcategoria">Categoria:</label>
            <select name="idc" class="form-control" required>
            <option>--Seleccione Categoria--</option>
            @foreach($categorias as $cat)
            <option value="{{$cat->idc}}" @if ($cat->idc===$productos->idc)
            selected="selected"
            @endif>{{$cat->nombre}}</option>
            @endforeach
            </select>
            <div class="invalid-feedback">Seleccione una Categoria.</div>
        </div>
        <br>
        <div class="col">
            <label   for="validationimg">Imagen Producto: </label>
            <input type="file" name="img" value="{{$productos->img}}" onchange="preview(this)" accept="image/png, image/jpeg">
            <br>
            <img src="/img/productos/{{$productos->img}}" width="100px" id="img" alt="">
        </div>
        <br>
        <!--Footer-->
        <div class="card-footer ml-auto mr-auto">
            <button type="submit" class="btn btn-primary">Guardar</button>  
        </div>
        <!--End Footer--> 
        </div>
    </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
'use strict'
  // Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.querySelectorAll('.needs-validation')
  // Loop over them and prevent submission
Array.prototype.slice.call(forms)
    .forEach(function (form) {
    form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
        }
        form.classList.add('was-validated')
    }, false)
    })
})()
</script>

<script>
    function preview(e)
{
if(e.files && e.files[0]){
    // Comprobamos que sea un formato de imagen
    if (e.files[0].type.match('image.*')) {
        // Inicializamos un FileReader. permite que las aplicaciones web lean
        // ficheros (o información en buffer) almacenados en el cliente de forma
        // asíncrona
        // Mas info en: https://developer.mozilla.org/es/docs/Web/API/FileReader
        var reader=new FileReader();
        // El evento onload se ejecuta cada vez que se ha leido el archivo
        // correctamente
        reader.onload=function(e) {
            document.getElementById("img").src=e.target.result;
        }
        // El evento onerror se ejecuta si ha encontrado un error de lectura
        reader.onerror=function(e) {
            document.getElementById("img").scr="";
            alert('Hubo un error al cargar la imagen');
        }
        // indicamos que lea la imagen seleccionado por el usuario de su disco duro
        reader.readAsDataURL(e.files[0]);
    }else{
        // El formato del archivo no es una imagen
        document.getElementById("img").src="";
        alert("El archivo adjunto no es una imagen");
    }
}
}
</script>

    @stop