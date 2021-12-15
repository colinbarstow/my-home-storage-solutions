<div class="header-right">
    @auth
        <a style="display: flex; align-items: center;margin-right: 1.5rem;" href="{{ route('my-account') }}">
            <span style="cursor: pointer;font-weight: inherit;text-transform: uppercase;">My Account</span>
        </a>
    @endauth
    @guest
        <a class="login" href="{{ route('login-modal') }}">
            <i class="d-icon-user"></i>
            <span>Login</span>
        </a>
    @endguest
    <!-- End of Login -->
    <span class="divider"></span>
    <div class="dropdown cart-dropdown">
        <livewire:basket-button />
        <livewire:basket />
    </div>

    <!-- End of Header Search -->
</div>
