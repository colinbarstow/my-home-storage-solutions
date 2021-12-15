<section class="about-section">
    <div class="container">
        <h2 class="title mb-lg-9">About {{ config('app.name') }}</h2>
        <div class="row mb-10">
            <div class="col-md-12" style="text-align: center">
                {!! $about->body !!}
            </div>
        </div>
    </div>
</section>
