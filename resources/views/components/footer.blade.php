<!--::footer_part start::-->
<footer class="footer_part">
    <div class="footer_iner" style="padding-bottom:50px; padding-top:50px;border-top:1px solid #F4EDF2;">
        <div class="container" style="padding-bottom: 50px;">
            <div class="row justify-content-between align-items-center" >
                <div class="col-lg-8">
                    <div class="footer_menu">
                        <div class="footer_logo">
                        <!-- <a href="index.html"><img src="{{asset('/')}}img/logo.png" alt="#"></a> -->
                        </div>
                        <div class="footer_menu_item">

                            @foreach($podaci as $p)
                                <h3>Adresa</h3>
                                <h5>{{$p->ulica}}</h5>
                                <h5>{{$p->mesto}}</h5>
                                </br>
                                <h3>Kontakt</h3>
                                <h5>{{$p->kontakt_tel}}</h5>
                                </br>
                                @endforeach
                        </div>
                        <div>
                            <iframe style="width:300px;height:250px;margin-left: 100px;border:none;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2851.2461701684742!2d20.2532178153921!3d44.38706817910303!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a01f97a69cdcd%3A0xb7d79b4f72361456!2sVeljka%20Vlahovi%C4%87a%2010%2C%20Lazarevac!5e0!3m2!1sen!2srs!4v1632580762983!5m2!1sen!2srs" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                        </div>

                </div>
                <div class="col-lg-4">
                    <div class="social_icon">
                        <a href="https://www.facebook.com/spelabeauty"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/spela_beauty/"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.youtube.com/channel/UC69bXX-AhSV67-Lg-QyyFnw/featured"><i class="fab fa-google-plus-g"></i></a>
{{--                        <a href="#"><i class="fab fa-linkedin-in"></i></a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright_part">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="copyright_text">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright Špela Beauty | Design by AFridl &copy;<script>document.write(new Date().getFullYear());</script>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                          <div class="copyright_link">
                              @if(!session()->has('user'))
                                <a href="{{route('logovanje')}}" style="font-family:'Rubik';
                                                                        sans-serif:line-height: 2;
                                                                        font-size: 15px;
                                                                        margin-bottom: 0px;
                                                                        color: #795376;
                                                                        font-weight: 400;">Logovanje</a>
                              @endif
                          </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--::footer_part end::-->

<!-- jquery plugins here-->
<script src="{{asset('/')}}js/jquery-1.12.1.min.js"></script>
<!-- popper js -->
<script src="{{asset('/')}}js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="{{asset('/')}}js/bootstrap.min.js"></script>
<!-- easing js -->
<script src="{{asset('/')}}js/jquery.magnific-popup.js"></script>
<!-- swiper js -->
<script src="{{asset('/')}}js/swiper.min.js"></script>
<!-- swiper js -->
<script src="{{asset('/')}}js/mixitup.min.js"></script>
<!-- particles js -->
<script src="{{asset('/')}}js/owl.carousel.min.js"></script>
<script src="{{asset('/')}}js/jquery.nice-select.min.js"></script>
<!-- slick js -->
<script src="{{asset('/')}}js/slick.min.js"></script>
<script src="{{asset('/')}}js/jquery.counterup.min.js"></script>
<script src="{{asset('/')}}js/waypoints.min.js"></script>
<script src="{{asset('/')}}js/contact.js"></script>
<script src="{{asset('/')}}js/jquery.ajaxchimp.min.js"></script>
<script src="{{asset('/')}}js/jquery.form.js"></script>
<script src="{{asset('/')}}js/jquery.validate.min.js"></script>
<script src="{{asset('/')}}js/mail-script.js"></script>
<!-- custom js -->
<script src="{{asset('/')}}js/custom.js"></script>
<script src="{{asset('/')}}js/script.js"></script>
<script type="text/javascript">
    const baseUrl = '<?php echo e(route("index")); ?>';
    const token = '<?php echo e(csrf_token()); ?>';
</script>
</body>

</html>
