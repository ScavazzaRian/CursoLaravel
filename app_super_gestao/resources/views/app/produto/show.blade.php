 @extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Visualizar produto</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            {{ isset($mensagem) && $mensagem != '' ? $mensagem : '' }}
            <div style="width:30%; margin-left: auto; margin-right: auto;">
                <table border="1px">
                    <tr>
                        <td>ID</td>
                        <td>{{$produto->id}}</td>
                    </tr>
                    <tr>
                        <td>Nome</td>
                        <td>{{$produto->nome}}</td>
                    </tr>
                    <tr>
                        <td>Descricao</td>
                        <td>{{$produto->descricao}}</td>
                    </tr>
                    <tr>
                        <td>Peso</td>
                        <td>{{$produto->peso}}</td>
                    </tr>
                    <tr>
                        <td>Unidade de medida</td>
                        <td>{{$produto->unidade_id}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
