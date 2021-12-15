<div>
    @if(!$complete)
        <button class="btn btn-danger" wire:click="refundConfirm">Refund</button>
        @if($confirm)
                <button class="btn btn-danger" wire:click="refund">Confirm Refund</button>
                <button class="btn btn-primary" wire:click="cancel">Cancel</button>
        @endif
    @else
        <i class="fa fa-check"></i>
        <p>The Refund has been successful</p>
    @endif
</div>
