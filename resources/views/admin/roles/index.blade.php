@extends('layouts.admin')

@section('content')
    <h1>Listado de roles</h1>
    <hr>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Roles registrados
                        <a href="{{ url('admin/roles/create') }}" style="float:right" class="btn btn-primary"><i class="bi bi-plus"></i> Crear Nuevo</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ url('/admin/roles') }}" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" name="buscar" class="form-control" placeholder="Buscar..." value="{{ $_REQUEST['buscar'] ?? '' }}">
                                    <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i> Buscar</button>
                                    @if (isset($_REQUEST['buscar']))
                                        <a href="{{ url('/admin/roles') }}" class="btn btn-success">
                                            <i class="bi bi-trash"></i> Limpiar</a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                   <table class="table table-bordered table-hover table-striped">
                       <thead>
                        <tr>
                            <th>Nro</th>
                            <th>Nombre del rol</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                             @php
                                $nro= ($roles->currentPage() - 1) * $roles->perPage() + 1;
                            @endphp
                            @foreach ($roles as $role)
                                <tr>
                                     <td style="text-align: center">{{ $nro++ }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td class="text-center" style="white-space: nowrap;">
                                        <a href="{{ url('/admin/rol/' .$role->id) }}" class="btn btn-sm btn-info me-1"><i class="bi bi-eye"></i> Ver</a>
                                        <a href="{{ url('/admin/roles/' .$role->id . '/edit') }}" class="btn btn-sm btn-success me-1"><i class="bi bi-pencil"></i> Editar</a>
                                        <form action="{{ url('/admin/roles/' .$role->id) }}" method="POST" id="miFormulario{{ $role->id }}" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="preguntar({{ $role->id }}, event)">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody> 
                   </table>
                   @if ($roles->hasPages())
                       <div class="d-flex justify-content-between align-items-center mt-4 px-3">
                        <div class="text-muted">
                            Mostrando {{ $roles->firstItem() }} a {{ $roles->lastItem() }} de {{ $roles->total() }} registros
                        </div>
                        <div>
                            {{ $roles->links('pagination::bootstrap-4') }}
                        </div>
                       </div>
                   @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        function preguntar(id, event) {
            event.preventDefault();

            Swal.fire({
                title: '¿Desea eliminar este registro?',
                text: '',
                icon: 'question',
                showDenyButton: true,
                confirmButtonText: 'Eliminar',
                confirmButtonColor: '#a5161d',
                denyButtonColor: '#270a0a',
                denyButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('miFormulario' + id).submit();
                }
            });
        }
    </script>
@endsection