@extends('layouts.admin')

@section('content')
    <h1>Listado de productos</h1>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Productos registrados
                        <a href="{{ url('admin/productos/create') }}" style="float:right" class="btn btn-primary"><i class="bi bi-plus"></i> Crear Nuevo</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ url('/admin/productos') }}" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" name="buscar" class="form-control" placeholder="Buscar..." value="{{ $_REQUEST['buscar'] ?? '' }}">
                                    <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i> Buscar</button>
                                    @if (isset($_REQUEST['buscar']))
                                        <a href="{{ url('/admin/productos') }}" class="btn btn-success">
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
                            <th>Categoria</th>
                            <th>Nombre</th>
                            <th>Codigo</th>
                            <th>Descripción Corta</th>
                            <th>Precio de compra</th>
                            <th>Precio de venta</th>
                            <th>Stock</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                             @php
                                $nro= ($productos->currentPage() - 1) * $productos->perPage() + 1;
                            @endphp
                            @foreach ($productos as $producto)
                                <tr>
                                     <td style="text-align: center">{{ $nro++ }}</td>
                                    <td>{{ $producto->categoria->nombre }}</td>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->codigo }}</td>
                                    <td>{{ $producto->descripcion_corta }}</td>
                                    <td>{{ $ajuste->divisa. " " . $producto->precio_compra }}</td>
                                    <td>{{ $ajuste->divisa. " " . $producto->precio_venta }}</td>
                                    <td style="text-align: center;">{{ $producto->stock }}</td>
                                    <td class="text-center" style="white-space: nowrap;">
                                        <a href="{{ url('/admin/producto/' .$producto->id) }}" class="btn btn-sm btn-info me-1"><i class="bi bi-eye"></i> Ver</a>
                                        <a href="{{ url('/admin/producto/' .$producto->id . '/imagenes') }}" class="btn btn-sm btn-warning me-1"><i class="bi bi-images"></i> Imagenes</a>
                                        <a href="{{ url('/admin/producto/' .$producto->id . '/edit') }}" class="btn btn-sm btn-success me-1"><i class="bi bi-pencil"></i> Editar</a>
                                        <form action="{{ url('/admin/producto/' .$producto->id) }}" method="POST" id="miFormulario{{ $producto->id }}" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="preguntar({{ $producto->id }}, event)">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody> 
                   </table>
                   @if ($productos->hasPages())
                       <div class="d-flex justify-content-between align-items-center mt-4 px-3">
                        <div class="text-muted">
                            Mostrando {{ $productos->firstItem() }} a {{ $productos->lastItem() }} de {{ $productos->total() }} registros
                        </div>
                        <div>
                            {{ $productos->links('pagination::bootstrap-4') }}
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