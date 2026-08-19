@extends('layouts.admin')

@section('content')
    <h1>Modificar rol: {{ $rol->name }}</h1>
    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Llene los campos del formulario</h4>
                </div>
                <div class="card-body">
                   <form action="{{ url('/admin/roles/' . $rol->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                             <label for="name">Nombre del rol (*)</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                                <input type="text" name="name" id="name" value="{{ $rol->name }}" class="form-control" placeholder="Ingrese el nombre del rol">
                            </div>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                           </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('/admin/roles')}}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-success">Actualizar</button>
                            </div>
                        </div>
                    </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
@endsection