@component('mail::message')

<b>Olá {{$nome}}! <br>
Aqui é a folgosa trazendo mais uma novidade do meu site pra você!!</b>
<br>
<div class="invoice p-3 mb-3" style="background: #fff; border: 1px solid rgba(0,0,0,.125); position: relative;">
    <div class="row">
        @if(!empty($produto))
            <table class="table table-striped" width="100%">
                <tr>
                    <td><h2>Novidades da semana</h2></td>
                </tr>
                @foreach($produto as $prod)
                <tr>
                    <td style="text-align: center">
                        <a href="{{url('/loja')}}"><img src="{{url('/image_produtos').'/'.$prod['foto']}}"></a><br>
                        <span style="font-size: 18px; font-weight-bold">{{$prod['titulo']}}</span> <br>
                        {{$prod['descricao']}} <br><br>
                    </td>
                </tr>
                @endforeach
            </table>
        @endif
    </div>
</div>

@endcomponent
