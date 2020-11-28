@extends('plantilla')

@section('seccion')

    @if(session('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">{{session('mensaje')}}</h4>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    @endif
    @if(session('eliminacion'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">{{session('eliminacion')}}</h4>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    @endif
<div class="card" id="cuadro">
<center>
  <h5 class="card-header" id="encabezado">Mapa de Acámbaro</h5>
  </center>
  <div class="card-body">
    <div class="row">
    
    <div class="col-sm-6">
    <center>
    <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59978.14582187908!2d-100.74754676935626!3d20.02386535699751!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842cd56e02d6a25d%3A0xbf3da03f38963328!2zQWPDoW1iYXJvLCBHdG8u!5e0!3m2!1ses-419!2smx!4v1604187296366!5m2!1ses-419!2smx"
                width="500"
                height="400"
                frameborder="0"
                style="border: 0"
                allowfullscreen=""
                aria-hidden="false"
                tabindex="0"
                ></iframe>
        </center>
    </div>
    <div class="col-sm-6">
    <form action="{{route('mapa.nuevoMapa')}}" method="POST" enctype="multipart/form-data">
        @csrf

            @error('marcador')
            <div class="alert alert-warning" role="alert">
            Elige una imagen para el marcador
            </div>
            @enderror
        <div class="form-group">
        <label for="marcador">Subir marcador</label>
        <input type="file" class="form-control" id="marcador" name="marcador">
        </div>
            @error('lugar')
            <div class="alert alert-warning" role="alert">
            Ingresa el nombre del lugar o establecimiento
            </div>
            @enderror
        <div class="form-group">
        <label for="lugar">Lugar/Establecimiento</label>
        <input type="text" class="form-control" id="lugar" name="lugar">
        </div>
            @error('npersonas')
            <div class="alert alert-warning" role="alert">
            Ingresa el número de personas permitidas por familia
            </div>
            @enderror
        <div class="form-group">
        <label for="npersonas">Personas permitidas</label>
        <input type="text" class="form-control" id="npersonas" name="npersonas">
        </div>
            @error('niños')
            <div class="alert alert-warning" role="alert">
            Indica si la entrada de niños es Autorizada/No autorizada
            </div>
            @enderror
        <div class="form-group">
        <label for="niños">Entrada de niños</label>
        <input type="text" class="form-control" id="niños" name="niños">
        </div>
            @error('medidas')
            <div class="alert alert-warning" role="alert">
            Indica si hay medidas sanitarias adicionales 
            </div>
            @enderror
        <div class="form-group">
        <label for="medidas">Medidas adicionales</label>
        <input type="text" class="form-control" id="medidas" name="medidas">
        </div>
<center>
        <button type="submit" class="btn btn-primary">Registrar</button>
</center>
            </form>
    </div>
    </div>

  </div>
</div>
        

<table class="table table-striped" id="table">
<thead id="thead">
<tr>
    <th scope="col">Id</th>
    <th scope="col">Marcador</th>
    <th scope="col">Lugar/Establecimiento</th>
    <th scope="col">No. personas permitidas</th>
    <th scope="col">Entrada de niños</th>
    <th scope="col">Medidas adicionales</th>
    <th></th>
    <th scope="col">Acciones</th>
    <th></th>
</tr>
</thead>
<tbody>
@foreach ($coleccion as $item)
<tr>
<th scope="row">{{$item->id}}</th>
<td><img src="{{asset('storage/'.$item->marcador)}}" alt="marcador" width="50px;" heigth="50px;"></td>
<td>{{$item->lugar}}</td>
<td>{{$item->npersonas}}</td>
<td>{{$item->niños}}</td>
<td>{{$item->medidas}}</td>
<td><a href="{{route('mapa.detalleMapa',$item->id)}}" class="btn btn-ligth btn-sm">Detalles</a></td>
<td><a href="{{route('mapa.editarMapa',$item->id)}}" class="btn btn-success btn-sm">Editar</a></td>
<td>
<form action="{{route('mapa.eliminarMapa',$item->id)}}" method='POST'>
    @csrf
    @method('DELETE')
    <button class="btn btn-danger btn-sm" >Eliminar</button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
<div class="d-flex justify-content-center">
    {!! $coleccion->links() !!}
</div>

@endsection

<style>
#cuadro{
    margin-top:30px;
}
#encabezado{
    background-color:#a2231d;
    color:#F7F9FF;
}
#table{
    margin-top:30px;
}
#thead{
    background-color:#06389D;
    color:#F7F9FF;
}
</style>