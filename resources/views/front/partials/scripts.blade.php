<script>
    const stripeKey = '{{ config('stripe.key') }}'
</script>

<script src="{{ asset('front/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('front/vendor/parallax/parallax.min.js') }}"></script>
<script src="{{ asset('front/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('front/vendor/elevatezoom/jquery.elevatezoom.min.js') }}"></script>
<script src="{{ asset('front/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

<script src="{{ asset('front/vendor/owl-carousel/owl.carousel.min.js') }}"></script>

<script src="{{ asset('front/js/main.js') }}"></script>


@livewireScripts
@stack('scripts')


<script>
    window.addEventListener('showing-basket', event => {
        setTimeout(
            function(){
                let basket = document.getElementById('drop-basket');
                basket.style.visibility = null
                basket.style.opacity = null
                basket.style.top = null
                basket.style.transform = null
            }, 4000);
    });

    window.addEventListener('added-to-basket', event => {
        setTimeout(
            function(){
                let basket = document.getElementById('addToBasket' + event.detail.product);
                console.log(basket);
                basket.innerHTML = 'Add to Basket';
            }, 4000);
    });
</script>


@yield('page-scripts')
