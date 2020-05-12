@extends('site.master.header')
@extends('site.master.menu')

<main role="main">
    <div class="container mt-5 mb-5">
        <div class="callout callout-info" style="border-radius: .25rem;
        box-shadow: 0 1px 3px rgba(0,0,0,.12), 0 1px 2px rgba(0,0,0,.24);
        background-color: #343a40;
        border-left: 5px solid #e83e8c;
        margin-bottom: 1rem;
        padding: 1rem;">
            <h5><i class="fas fa-file-invoice-dollar fa-2x"></i> Escolha uma forma de pagamento</h5>

        </div>

        <!-- Inicio do formulário -->
        <form action="{{route('site.redirectcheckout')}}" method="POST" class="needs-validation mt-5" novalidate>
            @csrf
            <input type="hidden" name="id" value="{{$item['id']}}">
            <input type="hidden" name="description" value="{{$item['description']}}">
            <input type="hidden" name="amount" id="amount" value="{{$item['amount']}}">
            <input type="hidden" name="tipo_venda" id="tipo_venda" value="{{$item['tipo_venda']}}">
            <input type="hidden" name="invoice_number" id="invoice_number" value="{{$invoice_number}}">

            <!-- Início DIV bg branco -->
            <div class="invoice p-3 mb-3" style="background: #fff; border: 1px solid rgba(0,0,0,.125); position: relative;">
                <!-- title row -->
                <div class="row">
                    <div class="col-sm-6">
                        <b>Cod. Pedido:</b> {{$invoice_number}}<br>
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                        <h5 class="float-right">Data: {{date('d/m/Y')}}</h5><br>
                    </div>
                </div>
                <!-- /.title row -->
                <!-- Table row -->
                <div class="row mt-5">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Qtd</th>
                            <th>Produto</th>
                            <th>Subtotal</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td width="5%">1</td>
                            <td>{{$item['description']}}</td>
                            <td>R${{$item['amount']}}</td>
                        </tr>
                        </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /. Table row -->

                <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-12">
                        <p class="lead">Métodos de Pagamento:</p>

                        <div class="CartaoCredito">
                            <div class="Titulo mb-2" style="color: #343a40">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="paymentMethod1" name="paymentMethod" value="creditCard" required>
                                    <label for="paymentMethod1" class="form-check-label"><i class="fas fa-credit-card"></i> <b>Cartão de Crédito</b></label>
                                </div>
                                <div class="invalid-feedback">
                                    Escolha um método de pagamento.
                                </div>
                            </div>
                        </div>

                        <div class="Boleto">
                            <div class="Titulo mb-2 mt-3" style="color: #343a40">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="paymentMethod2" name="paymentMethod" value="boleto" required>
                                    <label for="paymentMethod2" class="form-check-label"><i class="fas fa-file-invoice"></i> <b>Boleto</b></label>
                                </div>
                            </div>
                        </div>

                        <div class="Debito">
                            <div class="Titulo mb-2 mt-3" style="color: #343a40">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="paymentMethod3" name="paymentMethod" value="debito" required>
                                    <label for="paymentMethod3" class="form-check-label"><i class="far fa-credit-card"></i> <b>Débito Online</b></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- this row will not appear when printing -->
                <div class="row no-print mt-5">
                    <div class="col-6">
                        <img src="/images/Logo_PagSeguro.png" width="150px" alt="">
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-success float-right" name="FinalizarCompra" id="FinalizarCompra" value="FinalizarCompra">
                            <i class="far fa-credit-card"></i> Finalizar Compra
                        </button>
                    </div>
                </div>

            </div>
            <!-- /.fim DIV bg branco -->
        </form>
        <!-- /.fim formulário -->
    </div>
</main>

@extends('site.master.footer')

<script>
    (function() {
    'use strict';
    window.addEventListener('load', function() {

        var forms = document.getElementsByClassName('needs-validation');

        var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
        });
    }, false);
    })();
</script>

<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        // códigos jQuery a serem executados quando a página carregar
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
                url: "startsession",
                type: "POST",
                dataType: "json",
                data: { _token: '{{csrf_token()}}' },

            }).done(function(data2) {
                console.log(data2.id);
                PagSeguroDirectPayment.setSessionId(data2.id);
                listaMeiosPagamento();

            }).fail(function(jqXHR, textStatus ) {
                console.log("Request failed: " + textStatus);

            }).always(function() {
                console.log("completou");
            });
    });
    var Amount = $('#amount').val();
    console.log(Amount);

    // Lista os pagamentos disponíveis no Pagseguro
    function listaMeiosPagamento()
    {
        PagSeguroDirectPayment.getPaymentMethods({
            amount: Amount,
            success: function(data) {
                $.each(data.paymentMethods.CREDIT_CARD.options, function(i, obj){
                    $('.CartaoCredito').append("<img src=https://stc.pagseguro.uol.com.br/"+obj.images.MEDIUM.path+" alt="+obj.name+">");
                });

                $('.Boleto').append("<img src=https://stc.pagseguro.uol.com.br/"+data.paymentMethods.BOLETO.options.BOLETO.images.MEDIUM.path+">");

                $.each(data.paymentMethods.ONLINE_DEBIT.options, function(i, obj){
                    $('.Debito').append("<img src=https://stc.pagseguro.uol.com.br/"+obj.images.MEDIUM.path+" alt="+obj.name+">");
                });
            }
        });
    }
</script>
