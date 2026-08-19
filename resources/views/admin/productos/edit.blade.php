@extends('layouts.admin')

@section('content')
    <h1>Modificacion datos del producto: {{ $producto->nombre }}</h1>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Llene los campos del formulario</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/producto/' . $producto->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="categoria_id">Categoría (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-tag"></i></span>
                                        <select name="categoria_id" id="categoria_id" class="form-control" required>
                                            <option value="">Seleccione una categoría...</option>
                                            @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria->id }}"
                                                    {{ old('categoria_id', $producto->categoria_id) == $categoria->id ? 'selected' : '' }}>
                                                    {{ $categoria->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('categoria_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre">Nombre del Producto (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-box-seam"></i></span>
                                        <input type="text" name="nombre" id="nombre" class="form-control"
                                            value="{{ old('nombre', $producto->nombre) }}"
                                            placeholder="Nombre completo del producto" required>
                                    </div>
                                    @error('nombre')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="codigo">Código (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-upc-scan"></i></span>
                                        <input type="text" name="codigo" id="codigo" class="form-control"
                                            value="{{ old('codigo', $producto->codigo) }}"
                                            placeholder="Código único del producto" required>
                                    </div>
                                    @error('codigo')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="descripcion_corta">Descripción Corta (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-text-left"></i></span>
                                        <input type="text" name="descripcion_corta" id="descripcion_corta"
                                            class="form-control" maxlength="255"
                                            value="{{ old('descripcion_corta', $producto->descripcion_corta) }}"
                                            placeholder="Descripción breve del producto (máx. 255 caracteres)"
                                            oninput="document.getElementById('contadorCorta').innerText = this.value.length"
                                            required>
                                    </div>
                                    <small class="text-muted"><span id="contadorCorta">0</span>/255 caracteres</small>
                                    @error('descripcion_corta')
                                        <small class="text-danger d-block">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="descripcion_larga">Descripción Larga (*)</label>
                                <div class="input-group">
                                    <div style="width: 100%">
                                        <textarea name="descripcion_larga" id="descripcion_larga" class="form-control ckeditor" rows="1"
                                            placeholder="Descripción detallada del producto">{{ old('descripcion_larga', $producto->descripcion_larga) }}</textarea>
                                    </div>
                                </div>
                                @error('descripcion_larga')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // Editor para el contenido (más completo)
                                ClassicEditor
                                    .create(document.querySelector('#descripcion_larga'), {
                                        toolbar: {
                                            items: [
                                                'heading', '|',
                                                'bold', 'italic', 'underline', 'strikethrough', 'subscript', 'superscript', '|',
                                                'link', 'bulletedList', 'numberedList', '|',
                                                'outdent', 'indent', '|',
                                                'alignment', '|',
                                                'blockQuote', 'insertTable', 'mediaEmbed', '|',
                                                'undo', 'redo', '|',
                                                'fontBackgroundColor', 'fontColor', 'fontSize', 'fontFamily', '|',
                                                'code', 'codeBlock', 'htmlEmbed', '|',
                                                'sourceEditing'
                                            ],
                                            shouldNotGroupWhenFull: true
                                        },
                                        language: 'es',
                                    })
                                    .catch(error => {
                                        console.error(error);
                                    });
                            });
                        </script>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="precio_compra">Precio de Compra (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" step="0.01" min="0" name="precio_compra"
                                            id="precio_compra" class="form-control"
                                            value="{{ old('precio_compra', $producto->precio_compra) }}" placeholder="0.00" required>
                                    </div>
                                    @error('precio_compra')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="precio_venta">Precio de Venta (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" step="0.01" min="0" name="precio_venta"
                                            id="precio_venta" class="form-control"
                                            value="{{ old('precio_venta', $producto->precio_venta) }}" placeholder="0.00" required>
                                    </div>
                                    @error('precio_venta')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="stock">Stock (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-box2"></i></span>
                                        <input type="number" min="0" name="stock" id="stock" class="form-control"
                                            value="{{ old('stock', $producto->stock) }}" placeholder="0" required>
                                    </div>
                                    @error('stock')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('/admin/productos') }}" class="btn btn-secondary">Cancelar</a>
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