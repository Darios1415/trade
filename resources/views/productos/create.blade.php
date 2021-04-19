@extends('layouts.main', ['activePage' => 'Productos', 'titlePage' => 'Productos'])
@section('content')
<div class="content">
<div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
        <form action="{{route('productos.store')}}" method="post" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
        @csrf
        <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Productos</h4>
            <p class="card-category">Ingresar datos del producto</p>
        </div> 
        <div class="card-body">
        <div class="col">
            <label  for="validationnombre"></label>
            <input type="text" name="nombre" placeholder="Nombre" value="{{old('nombre')}}" class="form-control" id="validationnombre" pattern="[A-Za-Z]" required>
            <div class="invalid-feedback">
                Nombre requerido.
            </div>
        </div>
        <br>
        <div class="col">
            <label for="validationexistencia"></label>
            <input type="text" name="existencia" placeholder="Existencias" value="{{old('existencia')}}" class="form-control" id="validationexistencia" pattern="[0-9]{1,10}" required>
        <div class="invalid-feedback">
            Existencia requerido.
        </div>
        </div>
        <br>
        <div class="col">
            <label for="validationdescripcion"></label><br>
                <textarea placeholder="Descripcion" name="descripcion" class="form-control" id="validationdescripcion" pattern="[A-Za-z0-9]" required>{{old('descripcion')}}</textarea>
                <div class="invalid-feedback">
                    Descripcion requerido.
                </div>
            </div>
            <br>
        <div class="col">
            <label for="validationprecio"></label>
            <input type="text" placeholder="Precio" name="precio" value="{{old('precio')}}" class="form-control" id="validationprecio" pattern="[0-9]{1,5}" required>
            <div class="invalid-feedback">
                Precio requerido.
            </div>
        </div>
        <br>
        <div class="col">
            <label for="validationcategoria"></label>
            <select name="idc" class="form-control" id="validationcategoria" required>
            <option value="">--Seleccione una Categoria--</option>
            @foreach($categorias as $cat)
            <option value="{{$cat->idc}}">{{$cat->nombre}}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            Categoria requerido.
        </div>
        </div>
        <br>
        <div class="col">
            <label for="validationimg">Imagen de producto: </label>
            <input type="file" name="img" id="file" onchange="return fileValidation()" required>
            <div class="invalid-feedback">
                Imagen requerida.
            </div>
            <!-- Image preview -->
            <div id="imagePreview" ></div>
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
    function fileValidation(){
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
    var allowedExtensions = /(.jpg|.jpeg|.png|.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('por favor solo suba archivos con extencion .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'" style="width:150px; height:150px;"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}
</script>

    @stop