@extends('layouts.main') 
@section('contenido')
    <div class="container">
        <h2 class="text-center mt-5">Añadir Registro</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="container">
                <div class="col-md-3 mb-3">
                    Libro:
                    <select name="id_libro" id="" required>
                        <option value="">Seleccionar un libro</option>
                        @foreach ($libros as $libro)
                            <option value="{{ $libro["id_libro"] }}">{{ $libro["titulo"] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    Usuario:
                    <select name="id_usuario" id="" required>
                        <option value="">Seleccionar un usuario</option>
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario["id_usuario"] }}">{{ $usuario["nombre"] }}</option>
                        @endforeach
                    </select>
                </div>
                <p>
                    <input type="submit" value="Añadir">
                </p>
            </div>
        </form>
    </div>  
@endsection