@extends('layouts.admin')

@section('content')
    <h1>Creacion de un nuevo rol</h1>
    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Llene los campos del formulario</h4>
                </div>
                <div class="card-body">
                   <form action="{{ url('/admin/roles/create') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                             <label for="name">Nombre del rol (*)</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Ingrese el nombre del rol">
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
                                <button type="submit" class="btn btn-primary">Registrar</button>
                            </div>
                        </div>
                    </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
@endsection