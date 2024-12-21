<footer class="footer__section bgadd">
    <div class="container">
        <div class="footer__top pt-120 pb-120">
            <div class="row g-4">
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInDown">
                    <div class="footer__item">
                        <a href="{{route('home')}}" class="footer__logo mb-24 d-block">
                            <img src="{{url(setting('white_logo'))}}" style="max-width: 200px" alt="logo">
                        </a>
                        <p class="pfz-16 inter fw-400 cef__pra mb-30">
                            {{setting('footer_text')}}
                        </p>
                        <ul class="social d-flex align-items-center">
                            <li>
                                <a target="_blank" href="//{{(setting('facebook_url'))}}">
                                    <i class="bi bi-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="//{{(setting('twitter_url'))}}">
                                    <i class="bi bi-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="//{{(setting('instagram_url'))}}">
                                    <i class="bi bi-instagram"></i>
                                </a>
                            </li>

                            <li>
                                <a target="_blank" href="//{{(setting('linkedin_url'))}}">
                                    <i class="bi bi-linkedin"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-6 col-sm-6 wow fadeInUp">
                    <div class="footer__item">
                        <a href="javascript:void(0)" class="footer__title fz-24 fw-600 inter text-white mb-24 d-block">
                            Quick Link
                        </a>
                        <ul class="quick__link">
                            <li>
                                <a href="#" class="fz-16 fw-400 inter cef__pra d-block">
                                    About us
                                </a>
                            </li>
                            <li>
                                <a href="#0" class="fz-16 fw-400 inter cef__pra d-block">
                                    Browse Job
                                </a>
                            </li>
                            <li>
                                <a href="#0" class="fz-16 fw-400 inter cef__pra d-block">
                                    Find Talent
                                </a>
                            </li>
                            <li>
                                <a href="faqs.html" class="fz-16 fw-400 inter cef__pra d-block">
                                    FAQs
                                </a>
                            </li>
                            <li>
                                <a href="blog.html" class="fz-16 fw-400 inter cef__pra d-block">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInDown">
                    <div class="footer__item">
                        <a href="javascript:void(0)" class="footer__title fz-24 fw-600 inter text-white mb-24 d-block">
                            Contact
                        </a>
                        <ul class="footer__contact">
                            <li>
                                <a href="javascript:void(0)" class="fz-16 d-flex align-items-center gap-3 fw-400 inter cef__pra d-block">
                                    <i class="bi bi-telephone-plus cmn__icon cmn__icon"></i>
                                    <span>
                              {{setting('phone')}}
                           </span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="fz-16 d-flex align-items-center gap-3 fw-400 inter cef__pra d-block">
                                    <i class="bi bi-envelope-open cmn__icon"></i>
                                    <span>
                           {{setting('email')}}
                           </span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="fz-16 d-flex align-items-center gap-3 fw-400 inter cef__pra d-block">
                                    <i class="bi bi-geo-alt cmn__icon"></i>
                                    <span>
                           {{setting('address')}}
                           </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInUp">
                    <div class="footer__item">
                        <a href="javascript:void(0)" class="footer__title fz-24 fw-600 inter text-white mb-24 d-block">
                            Newsletter
                        </a>
                        <p class="pfz-16 fw-400 inter cef__pra  mb-24">
                            Subscribe our newsletter to get our latest update & news
                        </p>
                        <form  class="d-flex align-items-center">
                            <input type="text" placeholder="Email address">
                            <button type="button" class="cmn--btn">
                        <span>
                           <i class="bi bi-cursor"></i>
                        </span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>


        <div class="footer__bottom d-flex align-items-center">
            <p class="fz-16 fw-400 inter text-white">
                Copyright &copy; {{date('Y')}}
                <a href="#" class="base3">{{setting('footer_text')}}</a>
            </p>
            <ul class="help__support d-flex align-items-center">
                <li>
                    <a href="javascript:void(0)" class="text-white fz-16 fw-400 inter">
                        Help & Support
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="text-white fz-16 fw-400 inter">
                        Privacy policy
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="text-white fz-16 fw-400 inter">
                        Terms & Conditions
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>
