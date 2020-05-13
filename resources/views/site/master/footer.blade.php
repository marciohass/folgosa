<!-- Footer -->
<footer class="page-footer font-small unique-color-dark">

    <div style="background-color: #e83e8c;">
      <div class="container">

        <!-- Grid row-->
        <div class="row py-4 d-flex align-items-center">

          <!-- Grid column -->
          <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
            <h6 class="mb-0" style="color: #212529">Fique conectado nas minhas redes sociais!</h6>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-6 col-lg-7 text-center text-md-right">
            @foreach($socials as $social)

                @switch ($social->nome)
                    @case ("YouTube")
                        <!-- YouTube -->
                        <a href="{{$social->link}}" style="text-decoration: none;">
                            <i class="fab fa-youtube mr-4" style="color:white"></i>
                        </a>
                        @break
                    @case ("Facebook")
                        <!-- Facebook -->
                        <a href="{{$social->link}}" style="text-decoration: none;">
                            <i class="fab fa-facebook-f mr-4" style="color:white"></i>
                        </a>
                        @break
                    @case ("WhatsApp")
                        <!-- WhatsApp -->
                        <a href="{{$social->link}}" style="text-decoration: none;">
                            <i class="fab fa-whatsapp mr-4" style="color:white"></i>
                        </a>
                        @break
                    @case ("Instagram")
                        <!--Instagram-->
                        <a class="ins-ic" href="{{$social->link}}" style="text-decoration: none;">
                            <i class="fab fa-instagram mr-4" style="color:white"></i>
                        </a>
                        @break
                    @case ("Twitter")
                        <!-- Twitter -->
                        <a class="tw-ic" href="{{$social->link}}" style="text-decoration: none;">
                            <i class="fab fa-twitter mr-4" style="color:white"></i>
                        </a>
                        @break
                    @case ("LinkedIn")
                        <!--Linkedin -->
                        <a class="li-ic" href="{{$social->link}}" style="text-decoration: none;">
                            <i class="fab fa-linkedin-in mr-4" style="color:white"></i>
                        </a>
                        @break
                    @case ("Pinterest")
                        <!-- Pinterest -->
                        <a href="{{$social->link}}" style="text-decoration: none;">
                            <i class="fab fa-pinterest-p mr-4" style="color:white"></i>
                        </a>
                        @break
                    @case ("Skype")
                        <!-- Skype -->
                        <a href="{{$social->link}}" style="text-decoration: none;">
                            <i class="fab fa-skype mr-4" style="color:white"></i>
                        </a>
                        @break
                    @case ("Snapchat")
                        <!-- SnapChat -->
                        <a href="{{$social->link}}" style="text-decoration: none;">
                            <i class="fab fa-snapchat-ghost mr-4" style="color:white"></i>
                        </a>
                        @break

                @endswitch


            @endforeach
          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row-->

      </div>
    </div>

    <!-- Footer Links -->
    <div class="container text-center text-md-left mt-5">

      <!-- Grid row -->
      <div class="row mt-3">

        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

          <!-- Content -->
          <h6 class="text-uppercase font-weight-bold">Camila Folgosa</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>Este site contém material destinado a maiores de 18 anos. Se você possui idade inferior a esta, feche este site imediatamente.</p>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Products</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <a href="#!">Loja</a>
          </p>
          <p>
            <a href="#!">Promoções</a>
          </p>
          <p>
            <a href="#!">Presentes</a>
          </p>
          <p>
            <a href="#!">Contato</a>
          </p>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Links</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <a href="https://allmylinks.com/" target="_BLANK">AllMyLinks</a>
          </p>
          <p>
            <a href="https://onlyfans.com/" target="_BLANK">OnlyFans</a>
          </p>
          <p>
            <a href="https://suicidegirls.com/" target="_BLANK">Suicide Girls</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Contato</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <i class="fas fa-envelope mr-3"></i> folgosa.sg@gmail.com</p>
          <p>
            <i class="fas fa-phone mr-3"></i> + (21) 97121-0165</p>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© {{ date('Y') }} Powered by:
      <a href="#"> Marcio Hass</a>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->

</body>
</html>
