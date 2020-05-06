@extends('site.master.header')
@extends('site.master.menu')

<main role="main">
    <div class="container mt-5 mb-5">
      <h3><i class="fas fa-gifts"></i> Presentes</h3>
      <div class="row">
          <div class="col-6">
                <div class="card mt-2" style="border-color: #e83e8c; border-width: 2px; background-color: #000000; border-radius: 16px;">
                    <div class="card-body">
                        <h5 class="card-title">Olá!</h5>
                        <p class="card-text">Aqui é a minha área de presentes. Fique a vontade para me presentear com quiser! Obrigada, e beijão da fogosa!</p>
                        <form name="payment-method" method="POST" action="{{route('site.paymentmethod')}}" class="needs-validation mt-5" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">R$</span>
                                        </div>
                                        <input type="text" class="form-control" name="valor" id="valor" maxlength="5" required>
                                        <div class="invalid-feedback">
                                            Informe um valor!
                                        </div>
                                        <input type="hidden" name="id" value="100">
                                        <input type="hidden" name="titulo" value="Presente">
                                        <input type="hidden" name="tipo_venda" value="G">
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-block btn-secondary"><i class="fas fa-gift"></i> Presentear</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
          </div>
          <div class="col-6">
              <img src="images/foto-gifts1.jpg" alt="">
          </div>
      </div>
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
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
