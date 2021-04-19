@extends('layouts.main', ['activePage' => 'categorias', 'titlePage' => 'Detalle de Categoria'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col md-12">
                <div class="card">
                    <div class="card-header card-header-primary"> 
                        <div class="card-title">Categoria</div>
                        <p class="card-category">Vista detalle de Categoria {{ $categorias->nombre }}</p>
                    </div>
                    <!--body-->
                    <div class="card-body">
                        @if(session('success'))   
                        <div class="alert alert-success" role="success">
                         {{ session('success') }}
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card card-user">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <div class="author">
                                                <a href="#" class="d-flex">
                                                    <img src="{{ asset('/img/category.jpg') }}" alt="image" class="category">
                                                    <h5 class="title mx-3">{{ $categorias->nombre }}</h5>
                                                </a>
                                                <p class="description">                                               
                                                {{ $categorias->descripcion }} <br>
                                                {{ $categorias->created_at }}  
                                                </p>
                                            </div>
                                        </p>
                                    </div>
                                     <div class="card-footer">
                                        <div class="button-container">
                                            <a href="{{ route('categorias.index') }}" class="btn btn-sm btn-success mr-3">Volver </a>
                                            <button class="btn btn-sm btn-primary">Editar</button>
                                        </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection