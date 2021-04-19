@extends('layouts.main', ['activePage' => 'categorias', 'titlePage' => 'Editar Categoria'])
@section('content')
   <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('categorias.update', $categoria->id) }}" method="post" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header card-header-primary">
                            <h4 class="card-title">Categoria</h4>
                            <p class="card-category">Editar datos de categoria</p>
                            </div> 
                            <div class="card-body">
                                <div class="row">
                                    <label for="nombre" class="col-sm-2  col-form-label">Nombre</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="nombre" value="{{ old('nombre', $categoria->nombre) }}" autofocus>
                                            @if ($errors->has('nombre'))
                                            <span class="error text-danger" for="input nombre">{{ $errors->first('nombre') }}</span>

                                            @endif
                                        </div>
                                </div>
                                <div class="row">
                                    <label for="descripcion" class="col-sm-2  col-form-label">Descripcion</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="descripcion" value="{{ old('descripcion' $user->descripcion }}">
                                            @if ($errors->has('descripcion'))
                                            <span class="error text-danger" for="input descripcion">{{ $errors->first('descripcion') }}</span>

                                            @endif
                                        </div>
                                </div>
                            </div>  
                                <!--Footer-->
                                <div class="card-footer ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary">Actualizar</button>  
                                </div>
                                <!--End Footer-->                
                        </div>
                    </form>

                </div>
            </div>
        </div>
   </div>
@endsection
