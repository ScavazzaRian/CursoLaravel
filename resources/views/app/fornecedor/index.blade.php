<h1>Fornecedores</h1>

{{-- @if E @unless --}}
@if (count($fornecedores) > 0 && count($fornecedores) < 10) 
    <h3>Existem alguns fornecedores</h3>
@elseif (count($fornecedores) > 10)
    <h3>Existem vários fornecedores cadastrados</h3>
@else
    <h3>Nao existem fornecedores cadastrados</h3>
@endif

@if(count($fornecedores) > 0)
    <ul>
        @foreach ($fornecedores as $fornecedor)
            <li>Fornecedor: {{ $fornecedor['nome'] }}</li>
            <li>Status: {{ $fornecedor['status'] }}</li>
            <li>DDD: {{ $fornecedor['DDD'] ?? '' }}</li>
            <li>Telefone: {{ $fornecedor['telefone'] ?? '' }}</li>
            @switch($fornecedor['DDD'])
                @case(11)
                    <li>Regiao: Sao Paulo</li>
                    @break
                @case(85)
                    <li>Regiao: Bahia</li>
                    @break
                @case(32)
                    <li>Regiao: Minas Gerais</li>
                    @break
                @default
                    <li>Regiao: Nao informado</li>
            @endswitch
            {{-- $variavel testada nao estiver definida ou se seu valor for null --}}
        @endforeach
    </ul>
@else
    <p>Nenhum fornecedor encontrado.</p>
@endif

Fornecedor: {{ $fornecedores[0]['nome'] }}
<br>
Status: {{ $fornecedores[0]['status'] }}
<br>
@unless ($fornecedores[0]['status'] == 'S') 
    Fornecedor Inativo
@endunless    
<br>    
@if($fornecedores[0]['status']=='N')
        Fornecedor Inativo
@endif        


{{-- @isset > Verifica se a variavel estao ou nao definidos --}}
{{-- @empty > Verifica se a variavel está vazia --}}
@isset($fornecedores)
    Fornecedor: {{ $fornecedores[0]['nome'] }}
    <br>
    Status: {{ $fornecedores[0]['status'] }}
    <br>
    CNPJ: {{ $fornecedores[0]['CNPJ'] }}
    @empty($fornecedores[0]['CNPJ'])
        - Vazio
    @endempty
    <br>
@endisset

@isset($fornecedores)
    Fornecedor: {{ $fornecedores[1]['nome'] }}
    <br>
    Status: {{ $fornecedores[1]['status'] }}
    <br>
    @isset($fornecedores[1]['CNPJ'])
        CNPJ: {{ $fornecedores[1]['CNPJ'] }}
    @endisset
    <br>
@endisset

{{-- FOR --}}
@for ($i = 0; $i < count($fornecedores); $i++)
    <hr>
    Fornecedor: {{ $fornecedores[$i]['nome'] }}
    <br>
    Status: {{ $fornecedores[$i]['status'] }}
    <br>
    CNPJ: {{ $fornecedores[$i]['CNPJ'] }}
    <br>
    Telefone: {{ $fornecedores[$i]['telefone'] }}
@endfor

{{-- WHILE --}}
@isset($fornecedores)
    @php $i = 0 @endphp
    @while (@isset($fornecedores[$i]))
        <hr>
        Fornecedor: {{ $fornecedores[$i]['nome'] }}
        <br>
        Status: {{ $fornecedores[$i]['status'] }}
        <br>
        CNPJ: {{ $fornecedores[$i]['CNPJ'] }}
        <br>
        Telefone: {{ $fornecedores[$i]['telefone'] }}
        @php $i++ @endphp
    @endwhile
@endisset

{{-- FORELSE > VERIFICA SE O ARRAY NAO ESTA VAZIO, SE ESTIVER DESVIA O FLUXO --}}
@forelse ($fornecedores as $fornecedor)
    <hr>
    Fornecedor: {{ $fornecedor['nome'] }}
    <br>
    Status: {{ $fornecedor['status'] }}
    <br>
    CNPJ: {{ $fornecedor['CNPJ'] }}
    <br>
    Telefone: {{ $fornecedor['telefone'] }}
    @if ($loop->last)
        <br>
        Ultima interacao do loop
        <br>
        Total de registro: {{ $loop->count }}
    @endif
@empty
    Nao existem fornecedores cadastrados!
@endforelse

{{-- PHP --}}
@php
    // Aqui indica que serao inseridas codigos php 
    // Aqui funciona os comentários do tipo php
    //     $oi = 'sei la';

    //     if(){

    //     } elseif() {

    //     } else {
            
    //     }
        
    //     isset() PHP
    //     if(isset($variavel)){ --> Se a variavel existe

    //     } else{

    //     }

    //     empty() PHP
    //     Retorna true se a variavel estiver vazia
    //     - ''
    //     - 0
    //     - 0.0
    //     - '0'
    //     - null
    //     - false
    //     - array()
    //     - $var -> apenas declarada sem atribuir valor
@endphp