@extends('layouts.main', ['activePage' => 'categorias', 'titlePage' => 'Categorias'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary"> 
                                 <h4 class="card-title">Categorias</h4>
                                 <p class="card-category">Categorias registradas</p>
                                </div>
                                <div class="card-body">
                                    @if(session('success'))   
                                    <div class="alert alert-success" role="success">
                                        {{ session('success') }}
                                    </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <a href="{{ route('categorias.create') }}" class="btn btn-sm btn-facebook">Añadir categoria</a>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Descripcion</th>
                                                <th class="text-right">Acciones</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($categorias as $categoria)
                                                    <tr>
                                                        <td>{{ $categoria->id }}</td>
                                                        <td>{{ $categoria->nombre }}</td>
                                                        <td>{{ $categoria->descripcion }}</td>                                                      
                                                        
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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