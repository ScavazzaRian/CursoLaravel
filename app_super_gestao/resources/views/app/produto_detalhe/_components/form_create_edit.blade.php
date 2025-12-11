{{-- VERIFICAÇÃO SEGURA: Checa se a variável existe E se tem ID --}}
@if (isset($produto_detalhe) && $produto_detalhe->id)
    <form action="{{ route('produto-detalhes.update', $produto_detalhe->id) }}" method="post">
    @method('PUT')
@else
    <form action="{{ route('produto-detalhes.store') }}" method="post">
@endif
    @csrf
    <input type="text" name="produto_id" placeholder="ID do produto" class="borda-preta" 
           value="{{ old('produto_id') ?? ($produto_detalhe->produto_id ?? '') }}">
    @error('produto_id')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <input type="text" name="comprimento" placeholder="Comprimento do produto" class="borda-preta" 
           value="{{ old('comprimento') ?? ($produto_detalhe->comprimento ?? '') }}">
    @error('comprimento')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <input type="text" name="largura" placeholder="Largura do produto" class="borda-preta" 
           value="{{ old('largura') ?? ($produto_detalhe->largura ?? '') }}">
    @error('largura')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <input type="text" name="altura" placeholder="Altura do produto" class="borda-preta" 
           value="{{ old('altura') ?? ($produto_detalhe->altura ?? '') }}">
    @error('altura')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <div class="mb-4">
        <select class="form-select @error('unidade_id') is-invalid @enderror" id="unidade_id" name="unidade_id" required>
            <option value="">Escolha uma unidade...</option>
            @foreach($unidades as $unidade)
                <option value="{{ $unidade->id }}" 
                    {{ (old('unidade_id') ?? ($produto_detalhe->unidade_id ?? '')) == $unidade->id ? 'selected' : '' }}>
                    Unidade: {{ $unidade->unidade }}
                </option>
            @endforeach
        </select>
        @error('unidade_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">Cadastrar</button>
    
</form> 