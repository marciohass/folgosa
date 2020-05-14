@extends('site.master.header')
@extends('site.master.menu')

<main role="main">
    <div class="container mt-5 mb-5">
        <h3>Boleto</h3>
        <div class="callout callout-info" style="border-radius: .25rem;
        box-shadow: 0 1px 3px rgba(0,0,0,.12), 0 1px 2px rgba(0,0,0,.24);
        background-color: #343a40;
        border-left: 5px solid #e83e8c;
        margin-bottom: 1rem;
        padding: 1rem;">
            <h5><i class="fas fa-info"></i> Nota:</h5>
            Seu pagamento é totalmente seguro realizado pelo PagSeguro. Assim que sua fatura for aprovada pelo PagSeguro, você receberá seu produto.
        </div>

        <form action="{{route('site.boleto')}}" method="POST" class="needs-validation mt-5" novalidate>
            @csrf
            <input type="hidden" name="id" value="{{$item['id']}}">
            <input type="hidden" name="description" value="{{$item['titulo']}}">
            <input type="hidden" name="amount" id="amount" value="{{$item['valor']}}">
            <input type="hidden" name="tipo_venda" id="tipo_venda" value="{{$item['tipo_venda']}}">
            <input type="hidden" name="invoice_number" id="invoice_number" value="{{$item['invoice_number']}}">
            <input type="hidden" name="paymentMethod" id="paymentMethod" value="{{$item['paymentMethod']}}">
            <input type="hidden" class="form-control" id="HashCard" name="HashCard">
            <div class="invoice p-3 mb-3" style="background: #fff; border: 1px solid rgba(0,0,0,.125); position: relative;">
                <div class="row">
                    <!-- title row -->
                    <div class="col-sm-6">
                        <h4><b>Cod. Pedido:</b> {{$item['invoice_number']}}</h4><br>
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                        <h5 class="float-right">Data: {{date('d/m/Y')}}</h5><br>
                    </div>
                </div>

                <div class="row col-sm-12 invoice-info mt-3">
                    <h5>Dados pessoais</h5>
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="form-group col-sm-6">
                        <label for="nome">Nome*</label>
                        <input type="text" class="form-control" name="nome" id="nome" required>
                        <div class="valid-feedback">
                            Ok!
                        </div>
                        <div class="invalid-feedback">
                            Favor digitar o nome!
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="form-group col-md-6">
                        <label for="email">E-mail*</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                        <div class="valid-feedback">
                            Ok!
                        </div>
                        <div class="invalid-feedback">
                            Favor digitar um e-mail válido!
                        </div>
                    </div>
                    <!-- /.col -->

                </div>
                <!-- /.row -->
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="form-group col-sm-3">
                        <label for="telefone">Telefone*</label>
                        <input type="text" class="form-control" name="telefone" id="telefone" onkeypress="$(this).mask('(00)00000-0000');" required>
                        <small id="telefoneHelpBlock" class="form-text text-muted">
                            Digite apenas os números do telefone.
                        </small>
                        <div class="valid-feedback">
                            Ok!
                        </div>
                        <div class="invalid-feedback">
                            Favor informar o telefone!
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="form-group col-sm-3">
                        <label for="cpf">CPF*</label>
                        <input type="text" class="form-control" name="cpf" id="cpf" onkeypress="$(this).mask('000.000.000-00');" required>
                        <small id="cpfHelpBlock" class="form-text text-muted">
                            Digite apenas os números do CPF.
                        </small>
                        <div class="valid-feedback">
                            Ok!
                        </div>
                        <div class="invalid-feedback">
                            Favor informar o CPF!
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="form-group col-sm-2">
                        <label for="bornDate">Data de Nascimento*</label>
                        <input type="text" class="form-control" name="bornDate" id="bornDate" onkeypress="$(this).mask('00/00/0000');" required>
                        <small id="bornDateHelpBlock" class="form-text text-muted">
                            Digite apenas números.
                        </small>
                        <div class="valid-feedback">
                            Ok!
                        </div>
                        <div class="invalid-feedback">
                            Favor informar a data de nascimento!
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4">
                        <!-- coluna vazia -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- info row -->
                <div class="row col-sm-12 invoice-info mt-3">
                    <h5>Dados de endereço</h5>
                </div>
                <!-- /.row -->
                <div class="row invoice-info">
                    <div class="form-group col-md-2">
                        <label for="cep">CEP*</label>
                        <input type="text" class="form-control" name="cep" id="cep" onkeypress="$(this).mask('00000-000');" required>
                        <div class="valid-feedback">
                            Ok!
                        </div>
                        <div class="invalid-feedback">
                            Informe o CEP!
                        </div>
                    </div>
                </div>
                <div class="row invoice-info">
                    <div class="form-group col-md-6">
                        <label for="endereco">Endereço*</label>
                        <input type="text" class="form-control" name="endereco" id="endereco" maxlength="255" required>
                        <div class="valid-feedback">
                            Ok!
                        </div>
                        <div class="invalid-feedback">
                            Informe o endereço!
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="numero">Número*</label>
                        <input type="text" class="form-control" name="numero" id="numero" maxlength="6" required>
                        <div class="valid-feedback">
                            Ok!
                        </div>
                        <div class="invalid-feedback">
                            Informe o número!
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="complemento">Complemento</label>
                        <input type="text" class="form-control" name="complemento" id="complemento" maxlength="20">
                    </div>
                </div>
                <div class="row invoice-info">
                    <div class="form-group col-md-6">
                        <label for="bairro">Bairro*</label>
                        <input type="text" class="form-control" name="bairro" id="bairro" maxlength="255" required>
                        <div class="valid-feedback">
                            Ok!
                        </div>
                        <div class="invalid-feedback">
                            Informe o bairro!
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="cidade">Cidade*</label>
                        <input type="text" class="form-control" name="cidade" id="cidade" maxlength="255" required>
                        <div class="valid-feedback">
                            Ok!
                        </div>
                        <div class="invalid-feedback">
                            Informe a cidade!
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="uf">UF*</label>
                        <input type="text" class="form-control" name="uf" id="uf" maxlength="2" required>
                        <div class="valid-feedback">
                            Ok!
                        </div>
                        <div class="invalid-feedback">
                            Informe UF!
                        </div>
                    </div>
                </div>
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
                        <td>{{$item['titulo']}}</td>
                        <td>R$ {{$item['valor']}}</td>
                    </tr>
                    </tbody>
                    </table>
                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6">
                        <p class="lead">Total no dia {{date('d/m/Y')}}</p>

                        <div class="table-responsive">
                        <table class="table">
                            <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>${{$item['valor']}}</td>
                            </tr>
                            <tr>
                            <th>Total:</th>
                            <td>${{$item['valor']}}</td>
                            </tr>
                        </table>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-6">
                        <img src="/images/Logo_PagSeguro.png" width="150px" alt="">
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-success float-right" name="BotaoComprar" id="BotaoComprar" value="Comprar"><i class="far fa-credit-card"></i> Pagar
                        </button>
                    </div>
                </div>
            </div>
        </form>
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

        PagSeguroDirectPayment.onSenderHashReady(function(response){
            $("#HashCard").val(response.senderHash);
        });
    });
</script>

<!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
