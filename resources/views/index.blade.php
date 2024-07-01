@extends('layouts.app')

@section('title', 'Produtos')

@section('header', 'Cosméticos')

@section('content')

<table class="table table-dark table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Descrição</th>
            <th scope="col">Preço</th>
            <th scope="col">Estoque</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($products as $product)
        <tr>
            <td scope="row">{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td>
                <button type="button" class="btn btn-primary custom-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$product->id}}" data-bs-whatever="@mdo">Editar</button>
                <button onclick="confirmDelete('{{ $product->id }}')" type="button" class="btn btn-danger custom-danger">Deletar</button>
            </td>
            <div class="modal fade" id="exampleModal{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Novo produto</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                        </div>
                        <div class="modal-body">
                            <form id="form-submit{{$product->id}}" method="POST" action="{{ route('update', ['id' => $product->id]) }}">
                                @csrf <!-- Diretiva do Blade para proteção CSRF -->
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Nome: </label>
                                    <input type="text" class="form-control" id="recipient-name" value="{{ $product->name }}" name="name">
                                </div>

                                <div class="mb-3">
                                    <label for="recipient-description" class="col-form-label">Descrição: </label>
                                    <input type="text" class="form-control" id="recipient-description" value="{{ $product->description }}" name="description">
                                </div>

                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Preço: </label>
                                    <input type="text" class="form-control" id="recipient-price" value="{{ $product->price }}" name="price">
                                </div>

                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Estoque: </label>
                                    <input type="text" class="form-control" id="recipient-stock" value="{{ $product->stock }}" name="stock">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary" id="save-button{{$product->id}}">Salvar</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            </div>

            <script>
                function confirmDelete(productId) {
                    Swal.fire({
                        title: "Tem certeza?",
                        text: "Você não poderá reverter isso!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Sim, deletar!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch(`/products/${productId}`, {
                                    method: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                        'Content-Type': 'application/json'
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    Swal.fire({
                                        title: "Deletado!",
                                        text: "Seu arquivo foi deletado.",
                                        icon: "success"
                                    }).then(() => {
                                        window.location.href = "{{ route('index') }}";
                                    });
                                })
                                .catch(error => {
                                    console.error('Erro:', error);
                                    Swal.fire({
                                        title: "Erro!",
                                        text: "Algo deu errado.",
                                        icon: "error"
                                    });
                                });
                        }
                    });
                }
            </script>
        </tr>

        @endforeach
    </tbody>

</table>

@endsection