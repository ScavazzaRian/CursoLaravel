 @extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor Adicionar</p>
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
                <form action="{{ route('produtos.store') }}" method="post">
                    @csrf
                    <input type="text" name="nome" placeholder="Nome do produto" class="borda-preta" value="{{ old('nome') }}">
                    @error('nome')
                        {{ $message }}
                    @enderror

                    <input type="text" name="descricao" placeholder="Descricao do produto" class="borda-preta" value="{{ old('uf') }}">
                    @error('descricao')
                        {{ $message }}
                    @enderror
                    
                    <input type="text" name="peso" placeholder="Peso do produto" class="borda-preta" value="{{ old('email') }}">
                    @error('Peso')
                        {{ $message }}
                    @enderror

                    <!-- Seleção de Mesa -->
                    <div class="mb-4">
                        <label for="unidade_id" class="form-label">
                            <i class="bi bi-table"></i> Selecione a Mesa <span class="text-danger">*</span>
                        </label>
                        <select class="form-select @error('unidade_id') is-invalid @enderror" 
                                id="unidade_id" 
                                name="unidade_id" 
                                required>
                            <option value="">Escolha uma unidade...</option>
                            @foreach($unidades as $unidade)
                                <option value="{{ $unidade->id }}" {{ old('unidade_id') == $unidade->id ? 'selected' : '' }}>
                                    Unidade: {{ $unidade->unidade }}
                                </option>
                            @endforeach
                        </select>
                        @error('mesa_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
