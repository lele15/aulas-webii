@extends('templates.main')

@section('content')

    <form action="{{route('eixo.store')}}" method="POST">
        @csrf
        <label class="mt-3">Nome</label>
        <input type="text" name="name" class="form-control mt-3"/>
        <label class="mt-3">Descrição</label>
        <textarea name="description" rows="5" class="form-control mt-2">
        </textarea>
        <input type="submit" value="salvar" class="btn btn-danger mt-2">
    </form>

@endsection