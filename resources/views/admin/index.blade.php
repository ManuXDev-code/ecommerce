@extends('layouts.admin')

@section('content')
    <<div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Bienvenido, {{ Auth::user()->name }}</h3>
                
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Rol del usuario</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ Auth::user()->roles->pluck('name')->first() }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    <div class="row">
                <div class="col-md-3">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                        <a href="{{ url('/admin/roles') }}">
                            <div class="stats-icon purple mb-2">
                                <i class=""><i class="bi bi-shield-check"></i></i>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-8 col-lg-8 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Roles registrados</h6>
                        <h6 class="font-extrabold mb-0">{{ $total_roles }} roles</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                        <a href="{{ url('/admin/usuarios') }}">
                             <div class="stats-icon blue mb-2">
                                <i class="bi bi-people"></i>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-8 col-lg-8 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Usuarios registrados</h6>
                        <h6 class="font-extrabold mb-0">{{ $total_usuarios }} usuarios</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>


     <div class="col-md-3">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                        <a href="{{ url('/admin/usuarios') }}">
                             <div class="stats-icon green mb-2">
                                <i class="bi bi-tags"></i>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-8 col-lg-8 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Categorías registradas</h6>
                        <h6 class="font-extrabold mb-0">{{ $total_categorias }} categorías</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-3">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                        <a href="{{ url('/admin/usuarios') }}">
                             <div class="stats-icon red mb-2">
                                <i class="bi bi-box-seam"></i>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-8 col-lg-8 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Productos registrados</h6>
                        <h6 class="font-extrabold mb-0">{{ $total_productos }} productos</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
            </div>
    
    
@endsection