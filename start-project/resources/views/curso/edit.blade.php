@extends('templates.main')

@section('content')

    <form action="{{route('curso.update', $curso->id)}}" method="POST">
        @csrf
        @method('PUT')
        <label class="mt-3">Nome</label>
        <input type="text" name="nome" class="form-control mt-3" value="{{$curso->nome}}"/>
        <label class="mt-3">Abreviatura</label>
        <input type="text" name="Abreviatura"class="fotm-control" value="{{$curso->abreviatura}}"/>
        <label class="mt-3">Duração</label>
        <input type="number" name="duracao"class="fotm-control" value="{{$curso->duracao}}"/>
        <label class="mt-3">Eixo</label>
        <select name="eixo" class="form-control">
            <optinon disable></option>    
            @foreach ($eixos as $item)

            @if($item->id == $curso->eixo_id)
            <option value="{{$item->id}}" selected>{{ $item->name }}</option>
            @else
                <option value="{{$item->id}}">{{ $item->name }}</option>
            @endif
        @endforeach  
    </select>
        <input type="submit" value="Alterar" class="btn btn-danger mt-2">
    </form>

@endsection