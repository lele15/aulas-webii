@extends('templates.main')

@section('content')

    <form action="{{route('eixo.update', $eixo->id)}}" method="POST">
        @csrf
        @method('PUT')
        <label class="mt-3">Nome</label>
        <input type="text" name="name" class="form-control mt-3" value="{{$eixo->name}}"/>
        <label class="mt-3">Descrição</label>
        <textarea name="description" rows="5" class="form-control mt-2">
            {{$eixo->description}}
        </textarea>
        <input type="submit" value="Alterar" class="btn btn-danger mt-2">
    </form>

@endsection