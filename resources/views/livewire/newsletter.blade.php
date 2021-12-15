<div>
    @if(!$this->complete)
        <div class="widget widget-newsletter form-wrapper form-wrapper-inline">
            <div class="newsletter-info mx-auto mr-lg-2 ml-lg-4">
                <h4 class="widget-title">Subscribe to our Newsletter</h4>
                <p>Get all the latest information on Events, Sales and Offers.</p>
            </div>
            <form wire:submit.prevent="submit" class="input-wrapper input-wrapper-inline">
                @csrf
                <input type="email" class="form-control" wire:model="email" id="newsletter-email1" placeholder="Email address here..." />
                @error('email') <span class="error">{{ $message }}</span> @enderror
                <button class="btn btn-primary btn-md ml-2" type="submit">subscribe<i class="d-icon-arrow-right"></i></button>
            </form>
        </div>
    @else
        <div class="widget widget-newsletter form-wrapper form-wrapper-inline">
            <div class="newsletter-info mx-auto mr-lg-2 ml-lg-4">
                <h4 class="widget-title">Subscribe to our Newsletter</h4>
                <p>{{ $this->finishMessage }}</p>
            </div>
            <i class="fa fa-check" style="color: green"></i>
        </div>
    @endif
</div>
