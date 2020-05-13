@component('mail::message')

<main role="main">
    <div class="container mt-5 mb-5">
        <p style="text-align: center; color: #e83e8c"><b>Obrigado pela preferência do meu conteúdo, {{$data['senderName']}}. <br>Beijos da Fogosa!</b></p>
        <h3>Método de pagamento: {{$data['paymentMethod']}}</h3>
        <div class="callout callout-info" style="border-radius: .25rem;
        box-shadow: 0 1px 3px rgba(0,0,0,.12), 0 1px 2px rgba(0,0,0,.24);
        background-color: #FFFFFF;
        border-left: 5px solid #e83e8c;
        margin-bottom: 1rem;
        padding: 1rem;
        text-align: center">
            CODIGO PAGSEGURO<br>
            <b>{{$codigo}}</b>
        </div>
            <div class="invoice p-3 mb-3" style="background: #fff; border: 1px solid rgba(0,0,0,.125); position: relative;">
                <div class="row">
                    <table class="table table-striped" width="100%">
                        <tr>
                            <td width="50%"><b>Cod. Pedido: </b>{{$data['reference']}}</td>
                            <td style="text-align: right"><b>Data: {{date('d/m/Y')}}</b></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Qtd Parcelas: </b>{{$data['installmentQuantity']}} x R$ {{$data['installmentValue']}}</td>
                        </tr>
                    </table>

                    <table class="table table-striped" width="100%">
                        <thead>
                            <tr>
                                <th width="10%">Qtd</th>
                                <th width="60%" style="text-align: left">Produto</th>
                                <th width="30%" style="text-align: left">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td width="10%" style="text-align: center">1</td>
                                <td width="60%">{{$data['itemDescription1']}}</td>
                                <td width="30%">R$ {{$data['itemAmount1']}}</td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table" width="100%">
                        <tr>
                            <th style="width:70%"></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th style="width:70%; text-align: right;">Total:</th>
                            <th style="text-align: left">R${{$data['itemAmount1']}}</th>
                        </tr>
                    </table>
                </div>

            </div>

    </div>
</main>

@endcomponent
