<div>
    <a href="#" class="cart-toggle">
        <i class="minicart-icon">
            @if($this->qty)
                <span class="cart-count">{{ $this->qty }}</span>
            @else
                <span class="cart-count">0</span>
            @endif
        </i>
    </a>
</div>

