 @extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor Adicionar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            {{ isset($mensagem) && $mensagem != '' ? $mensagem : '' }}
            <div style="width:30%; margin-left: auto; margin-right: auto;">
                <form action="{{ route('app.fornecedor.adicionar.post') }}" method="post">
                    @csrf
                    <input type="text" name="nome" placeholder="Nome" class="borda-preta" value="{{ old('nome') ?? $fornecedor->nome }}">
                    {{ $errors->has('nome') ? $errors->first() : '' }}

                    <input type="text" name="uf" placeholder="UF" class="borda-preta" value="{{ old('uf') ?? $fornecedor->uf  }}">
                    {{ $errors->has('uf') ? $errors->first() : '' }}
                    
                    <input type="text" name="email" placeholder="Email" class="borda-preta" value="{{ old('email') ?? $fornecedor->email  }}">
                    @error('email')
                        {{ $message }}
                    @enderror
                    <button type="submit">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
