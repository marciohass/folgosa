@extends('site.master.header')
@extends('site.master.menu')

      <main role="main">
          <div class="container mt-5 mb-5">
            <h3>Contato</h3>
                <form action="" class="needs-validation mt-5" novalidate>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputNome">Nome*</label>
                        <input type="text" class="form-control" id="inputNome" required>
                        <div class="valid-feedback">
                            Ok!
                        </div>
                        <div class="invalid-feedback">
                            Favor digitar o nome!
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">E-mail*</label>
                        <input type="email" class="form-control" id="inputEmail4" required>
                        <div class="valid-feedback">
                            Ok!
                        </div>
                        <div class="invalid-feedback">
                            Favor digitar um e-mail válido!
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputTelefone">Telefone</label>
                        <input type="text" class="form-control" id="inputTelefone" placeholder="(11) 99999-9999" onkeypress="$(this).mask('(00) 00000-0000');">
                        <small id="telefoneHelpBlock" class="form-text text-muted">
                            Digite apenas os números do telefone.
                        </small>
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="inputMensagem">Mensagem*</label>
                        <textarea class="form-control" id="inputMensagem" rows="2" placeholder="Digite a sua mensagem..." required></textarea>
                        <div class="valid-feedback">
                            Ok!
                        </div>
                        <div class="invalid-feedback">
                            Favor digitar uma mensagem!
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
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

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
