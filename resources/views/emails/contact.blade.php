@component('mail::message')

<pre>{{$data['mensagem']}}</pre>

<br><br><br>
<p>Nome: {{$data['nome']}}</p>
<p>Tel.: {{$data['telefone']}}</p>

@endcomponent
