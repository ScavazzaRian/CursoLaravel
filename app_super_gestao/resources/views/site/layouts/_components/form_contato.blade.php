    {{ $slot }}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action={{ route('site.contato') }} method="POST">
        @csrf
        <input name="nome" value='{{ old('nome') }}' type="text" placeholder="Nome"
            {{-- Caso haja erro com o name="nome" ele irá exibilo --}}
            @if ($errors->has('nome'))
                {{ $errors->first('nome') }}
            @endif
            class=""{{ $classe }}">            
        <br>
        <input name="telefone" value='{{ old('telefone') }}' type="text" placeholder="Telefone"
            {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}
            class=""{{ $classe }}">
        <br>
        <input name="email" value='{{ old('email') }}' type="text" placeholder="E-mail"
            {{ $errors->has('email') ? $errors->first('email') : '' }}
            class=""{{ $classe }}">
        <br>
        <select name="motivo_contatos_id" class="{{ $classe }}">
            <option value="">Qual o motivo do contato?</option>
            @foreach ($motivo_contatos as $key => $motivo_contato)
                <option value="{{ $motivo_contato->id }}" {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : '' }}> {{ $motivo_contato->motivo_contato }} </option>
            @endforeach
        </select>
        {{ $errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : '' }}
        <br>
        <textarea name="mensagem" class=""{{ $classe }}">@if(old('mensagem') != ''){{ old('mensagem') }}@else Preencha aqui a sua mensagem @endif Preencha aqui a sua mensagem</textarea>
        {{ $errors->has('mensagem') ? $errors->first('mensagem') : '' }}
        <br>
        <button type="submit" class=""{{ $classe }}">ENVIAR</button>
    </form>

    {{-- Caso haja qualquer erro na hora de enviar o formulário ele irá exibir todos na tela --}}
    {{-- @if ($errors->any())
        @foreach ($errors->all() as $erro)
            <div class="alert alert-danger">{{ $erro }}</div
        @endforeach
    @endif --}}
