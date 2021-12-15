<div class="d-flex align-items-center">
    <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
        <div class="symbol-label" style="background-image:url('{{ \Illuminate\Support\Facades\Storage::url($configuration->logo) }}'); background-position: center; background-size: contain; background-repeat: no-repeat"></div>
        <i class="symbol-badge bg-success"></i>
    </div>
    <div>
        <a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">{{ $configuration->website_name }}</a>
    </div>
</div>
