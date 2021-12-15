<footer class="footer appear-animate">
    <div class="container">
        <div class="footer-top">
            <div class="row">
                <div class="col-lg-3">
                    <a href="demo1.html" class="logo-footer">
                        <img src="{{ \Illuminate\Support\Facades\Storage::url(config('site_configurations.details.logo')) }}" alt="logo-footer" width="163" height="39" />
                    </a>
                    <!-- End of FooterLogo -->
                </div>
                <div class="col-lg-9">
                    <livewire:newsletter/>
                </div>
            </div>
        </div>
        <!-- End of FooterTop -->
        <div class="footer-middle">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="widget">
                        <h4 class="widget-title">Contact Info</h4>
                        <ul class="widget-body">
                            <li>
                                <label>Phone:</label>
                                <a href="tel:{{ config('site_configurations.details.contact_number') }}">{{ config('site_configurations.details.contact_number') }}</a>
                            </li>
                            <li>
                                <label>Email:</label>
                                <a href="mailto:{{ config('site_configurations.details.contact_email') }}">{{ config('site_configurations.details.contact_email') }}</a>
                            </li>
                            <li>
                                <label>Address:</label>
                                <a href="javascript:void(0)">{{ config('site_configurations.details.address') }}</a>
                            </li>
                        </ul>
                    </div>
                    <!-- End of Widget -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget ml-lg-4">
                        <h4 class="widget-title">My Account</h4>
                        <ul class="widget-body">
                            @auth
                                <li><a href="{{ route('my-account') }}">My Account</a></li>
                                <li><a href="{{ route('my-account') }}">Order History</a></li>
                            @endauth
                            @guest
                                    <li><a href="{{ route('login-modal') }}">Login/Register</a></li>
                            @endguest
                        </ul>
                    </div>
                    <!-- End of Widget -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget ml-lg-4">
                        <h4 class="widget-title">Information</h4>
                        <ul class="widget-body">
                            <li><a href="{{ route('about') }}">About Us</a></li>
                            <li><a href="{{ route('faqs') }}">FAQs</a></li>
                            <li><a href="{{ route('terms-and-conditions') }}">Terms &amp; Condition</a></li>
                        </ul>
                    </div>
                    <!-- End of Widget -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget widget-instagram">
                        <h4 class="widget-title">Instagram</h4>
                        <figure class="widget-body row">
                            <div class="col-3">
                                <img src="{{ asset('front/images/instagram/01.jpg') }}" alt="instagram 1" width="64" height="64" />
                            </div>
                            <div class="col-3">
                                <img src="{{ asset('front/images/instagram/02.jpg') }}" alt="instagram 2" width="64" height="64" />
                            </div>
                            <div class="col-3">
                                <img src="{{ asset('front/images/instagram/03.jpg') }}" alt="instagram 3" width="64" height="64" />
                            </div>
                            <div class="col-3">
                                <img src="{{ asset('front/images/instagram/04.jpg') }}" alt="instagram 4" width="64" height="64" />
                            </div>
                            <div class="col-3">
                                <img src="{{ asset('front/images/instagram/05.jpg') }}" alt="instagram 5" width="64" height="64" />
                            </div>
                            <div class="col-3">
                                <img src="{{ asset('front/images/instagram/06.jpg') }}" alt="instagram 6" width="64" height="64" />
                            </div>
                            <div class="col-3">
                                <img src="{{ asset('front/images/instagram/07.jpg') }}" alt="instagram 7" width="64" height="64" />
                            </div>
                            <div class="col-3">
                                <img src="{{ asset('front/images/instagram/08.jpg') }}" alt="instagram 8" width="64" height="64" />
                            </div>
                        </figure>
                    </div>
                    <!-- End of Instagram -->
                </div>
            </div>
        </div>
        <!-- End of FooterMiddle -->
        <div class="footer-bottom">
            <div class="footer-left">
                <figure class="payment">
                    <img src="{{ asset('front/images/cards.png') }}" alt="payment" width="250" height="29" />
                </figure>
            </div>
            <div class="footer-center">
                <p class="copyright">{{ config('app.name') }} &copy; {{ date('Y') }}. All Rights Reserved</p>
            </div>
            <div class="footer-right">
                <div class="social-links">
                    @if( config('site_configurations.details.facebook') !== null)
                        <a href="{{ config('site_configurations.details.facebook') }}" target="_blank" class="social-link social-facebook fab fa-facebook-f"></a>
                    @endif
                    @if(config('site_configurations.details.twitter') !== null)
                        <a href="{{ config('site_configurations.details.facebook') }}" target="_blank" class="social-link social-twitter fab fa-twitter"></a>
                    @endif
                    @if(config('site_configurations.details.instagram') !== null)
                        <a href="{{ config('site_configurations.details.instagram') }}" target="_blank" class="social-link social-instagram fab fa-instagram"></a>
                    @endif
                </div>
            </div>
        </div>
        <!-- End of FooterBottom -->
    </div>
</footer>
