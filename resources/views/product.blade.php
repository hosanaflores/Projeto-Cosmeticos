@extends('layouts.app')

@section('title', 'Cadastrar produto')

@section('header', 'Cadastrar novo Produto')

@section('content')

<form method="POST" action="{{ route('store') }}">
    @csrf
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" name="name" placeholder="Seu nome">
    </div>

    <div class="form-group">
        <label for="description">Descrição</label>
        <input type="text" class="form-control" name="description" placeholder="Descrição">
    </div>

    <div class="form-group">
        <label for="price">Preço</label>
        <input type="text" class="form-control" name="price" placeholder="Preço">
    </div>

    <div class="form-group">
        <label for="stock">Estoque</label>
        <input type="text" class="form-control" name="stock" placeholder="Estoque">
    </div>

    <div class="btn-new-product">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
</form>

@endsection