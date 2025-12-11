@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Produtos Listar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width:90%; margin-left: auto; margin-right: auto;">
                @if ($produtos->count() > 0)
                    <table border="1" width="100%">

                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Descricao</th>
                                <th>Peso</th>
                                <th>Unidade Id</th>
                                <th>Comprimento</th>
                                <th>Altura</th>
                                <th>Largura</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($produtos as $produto)
                                <tr>
                                    <td>{{ $produto->nome }}</td>
                                    <td>{{ $produto->descricao }}</td>
                                    <td>{{ $produto->peso }}</td>
                                    <td>{{ $produto->unidade_id }}</td>
                                    <td>{{ $produto->produtoDetalhe->comprimento ?? '' }}</td>
                                    <td>{{ $produto->produtoDetalhe->altura ?? '' }}</td>
                                    <td>{{ $produto->produtoDetalhe->largura ?? '' }}</td>
                                    <td>
                                        <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Excluir</button>
                                        </form>
                                    </td>
                                    <td><a href="{{ route('produtos.edit', $produto) }}">Editar</a></td>
                                    <td><a href="{{ route('produtos.show', $produto) }}">Visualizar</a></td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    {{ $produtos->appends($request)->links('pagination::bootstrap-4') }}
                    <!--
                    <br>
                    {{ $produtos->count() }} - Total de registro por pagina
                    <br>
                    {{ $produtos->total() }} - Total de registro por consulta
                    <br>
                    {{ $produtos->firstItem() }} - Numero do primeira registro na consulta
                    <br>
                    {{ $produtos->lastItem() }} - Numero do ultimo registro na consulta
                    -->
                    <br>
                    Exibindo {{ $produtos->count() }} produtos de {{ $produtos->total() }} ({{ $produtos->firstItem() }} a {{ $produtos->lastItem() }})
                @else
                    <br>    
                    Sem produtos
                @endif
            </div>
        </div>
    </div>
@endsection