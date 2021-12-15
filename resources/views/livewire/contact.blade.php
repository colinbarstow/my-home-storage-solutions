<div>
    @if(!$this->complete)
    <form wire:submit.prevent="submit">

        <h3 class="ls-m mb-1">Let’s Connect</h3>

        <div class="row">
            <div class="col-md-6 mb-4">
                <input class="form-control" type="text" wire:model="name" placeholder="Name *">
            </div>
            <div class="col-md-6 mb-4">
                <input class="form-control" type="email" wire:model="email" placeholder="Email *">
            </div>
            <div class="col-12 mb-4">
                <textarea wire:model="message" class="form-control" placeholder="Your Message *"></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-md btn-primary mb-2">Send Message</button>

    </form>
    @else
        <h3>Thank you for contacting us, we will respond shortly</h3>
    @endif

</div>
