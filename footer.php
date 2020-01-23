    <footer class="blog-footer">
      <div>
        <!----------- Footer ------------>
        <footer class="footer-bs">
            <div class="row">
              <div class="col-md-3 footer-brand animated fadeInLeft">
                  <h2>Hellotana</h2>
                    <p>Suspendisse hendrerit tellus laoreet luctus pharetra. Aliquam porttitor vitae orci nec ultricies. Curabitur vehicula, libero eget faucibus faucibus, purus erat eleifend enim, porta pellentesque ex mi ut sem.</p>
                    <p>© 2014 BS3 UI Kit, All rights reserved</p>
                </div>
              <div class="col-md-4 footer-nav animated fadeInUp">
                  <h4>Nous contacter</h4>
                  <div class="col-md-12">
                        <ul class="pages">
                            <li><i class="fa fa-map-marker" aria-hidden="true"></i> Gare Soarano, 1er étage</li>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i> recrutement@hellotana.com</li>
                            <li><i class="fa fa-mobile" aria-hidden="true"></i> +261 34 71 885 45 / + 261 32 05 982 51 </li>
                        </ul>
                    </div>
                </div>
              <div class="col-md-2 footer-social animated fadeInDown">
                  <h4>Nous suivre</h4>
                  <ul>
                      <li><a href="<?php echo get_option('facebook'); ?>">Facebook</a></li>
                      <li><a href="">Twitter</a></li>
                      <li><a href="#">Instagram</a></li>
                    </ul>
                </div>
              <div class="col-md-3 footer-ns animated fadeInRight">
                  <h4>Newsletter</h4>
                    <p>Inscrivez-vous pour rester informés de nos actualités :</p>
                    <p><?php echo do_shortcode('[contact-form-7 id="130" title="newsletter"]') ?></p>
                </div>
            </div>
        </footer>
        <!--<section style="text-align:center; margin:10px auto;"><p>Designed by <a href="#">Hellotana</a></p></section>-->

    </div>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript">var callback=function(){var activeMenu=document.getElementsByClassName('menu');var activeLi=activeMenu[0].getElementsByClassName('active');var span=document.createElement('span');span.setAttribute('class','active-menu');activeLi[0].appendChild(span)};if(document.readyState==="complete"||(document.readyState!=="loading"&&!document.documentElement.doScroll)){callback()}else{document.addEventListener("DOMContentLoaded",callback)}$('.video-anna').css('top', $('.anna-video img').height() - 80);$('.play-video-allen').css('top', $('.allen-video img').height() - 80);$('.play-video-michel').css('top', $('.michel-video img').height() - 80);$('.play-video-sylvie').css('top', $('.sylvie-video img').height() - 80);$('.text-equipe-1').css('height', $('.seheno-video img').height());$('.play-video-seheno').css('top', $('.seheno-video img').height() - 80);$('.text-equipe-2').css('height', $('.mahefa-video img').height());$('.play-video-mahefa').css('top', $('.mahefa-video img').height() - 80);$('.text-equipe-3').css('height', $('.patricia-video img').height());$('.play-video-patricia').css('top', $('.patricia-video img').height() - 80);$('.derniere-offre').css('height', $('.anna-video img').height());$(function(){$(window).scroll(function(){if($(this).scrollTop()>=700){$('nav.blog-nav').addClass('sticky-top');$('img.logo-custom').addClass('logo-sticky')}else{$('nav.blog-nav').removeClass('sticky-top');$('img.logo-custom').removeClass('logo-sticky')}})});function afficherMenu(){document.getElementById("menu-principal").style.width="100%";$('.close-menu').css({'display':'block','transition':'0.5s'});$('.logo-custom').css('z-index','0')}function fermerMenu(){document.getElementById("menu-principal").style.width="0%";$('.close-menu').css({'display':'none','transition':'0.5s'});$('.logo-custom').css('z-index','999')}$('.backing,.backing-offre').click(function(){window.history.back();})</script>
    <?php wp_footer(); ?>
  </body>
</html>