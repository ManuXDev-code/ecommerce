@extends('layouts.admin')

@section('content')
    <h1>Listado de usuarios</h1>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Usuarios registrados
                        <a href="{{ url('admin/usuarios/create') }}" style="float:right" class="btn btn-primary"><i class="bi bi-plus"></i> Crear Nuevo</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ url('/admin/usuarios') }}" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" name="buscar" class="form-control" placeholder="Buscar..." value="{{ $_REQUEST['buscar'] ?? '' }}">
                                    <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i> Buscar</button>
                                    @if (isset($_REQUEST['buscar']))
                                        <a href="{{ url('/admin/usuarios') }}" class="btn btn-success">
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
                            <th>Rol del usuario</th>
                            <th>Nombre del usuario</th>
                            <th>Email</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $nro= ($usuarios->currentPage() - 1) * $usuarios->perPage() + 1;
                            @endphp
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td style="text-align: center">{{ $nro++ }}</td>
                                    <td>{{ $usuario->roles->pluck('name')->implode(', ') }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>
                                        @if ($usuario->estado == 0)
                                        <span class="badge bg-danger">Inactivo</span>
                                        @else
                                        <span class="badge bg-success">Activo</span>
                                        @endif
                                    </td>
                                    <td class="text-center" style="white-space: nowrap;">
                                        @if ($usuario->estado == 1)
                                            <a href="{{ url('/admin/usuario/' .$usuario->id) }}" class="btn btn-sm btn-info me-1"><i class="bi bi-eye"></i> Ver</a>
                                            <a href="{{ url('/admin/usuarios/' .$usuario->id . '/edit') }}" class="btn btn-sm btn-success me-1"><i class="bi bi-pencil"></i> Editar</a>
                                            <form action="{{ url('/admin/usuario/' . $usuario->id) }}"
                                                  method="post" id="miFormulario{{ $usuario->id }}" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="preguntar({{ $usuario->id }}, event)">
                                                    <i class="fas fa-trash"></i> Eliminar
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('admin.usuarios.restore', $usuario->id) }}" method="POST" id="formRestaurar{{ $usuario->id }}" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-warning"
                                                        onclick="confirmarRestaurar({{ $usuario->id }}, event)">
                                                    <i class="bi bi-arrow-counterclockwise"></i> Restaurar
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                   </table>
                   @if ($usuarios->hasPages())
                       <div class="d-flex justify-content-between align-items-center mt-4 px-3">
                        <div class="text-muted">
                            Mostrando {{ $usuarios->firstItem() }} a {{ $usuarios->lastItem() }} de {{ $usuarios->total() }} registros
                        </div>
                        <div>
                            {{ $usuarios->links('pagination::bootstrap-4') }}
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

        function confirmarRestaurar(id, event) {
            event.preventDefault();

            Swal.fire({
                title: '¿Desea restaurar este registro?',
                text: '',
                icon: 'question',
                showDenyButton: true,
                confirmButtonText: 'Restaurar',
                confirmButtonColor: '#198754',
                denyButtonColor: '#270a0a',
                denyButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('formRestaurar' + id).submit();
                }
            });
        }
    </script>
@endsection