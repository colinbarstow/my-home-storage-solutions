<div>
    <button class="btn btn-danger" wire:click="removeItem" style="margin-right:10px">Remove item(s)</button>
    <button class="btn btn-primary" wire:click="changeAtt" style="margin-right:10px">Change attributes</button>

    <div style="margin-top: 20px">
        @if($this->showRemoveBlock)
            <h4>Remove {{ $product->title }}</h4>
            <p>You are about to remove the product {{ $product->title }} from this order</p>

            @if($quantity > 1)
                <p>You can choose to remove all instances of this item or just a select few using the fields below.</p>
            @else
                <p>This action will remove the item completely from the order.</p>
                <button class="btn btn-danger" wire:click="removeAll">Remove Item</button>
                <button class="btn btn-primary" wire:click="cancel">Cancel</button>
            @endif
        @endif

        @if($this->showChangeAttBlock)
            Change Att Block
        @endif
    </div>

</div>
