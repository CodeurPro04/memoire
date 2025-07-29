<div>
    <x-auth-header :title="__('Create an Account')" :description="__('Fill in the form below to get started')" />

    <form wire:submit="register" class="mb-6">
        <div class="mb-6">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input
                wire:model="name"
                type="text"
                class="form-control @error('name') is-invalid @enderror"
                id="name"
                placeholder="{{ __('Your full name') }}"
                required
                autofocus
            >
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-6">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input
                wire:model="email"
                type="email"
                class="form-control @error('email') is-invalid @enderror"
                id="email"
                placeholder="{{ __('Enter your email') }}"
                required
            >
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-6">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input
                wire:model="password"
                type="password"
                class="form-control @error('password') is-invalid @enderror"
                id="password"
                required
                autocomplete="new-password"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
            >
            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-6">
            <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
            <input
                wire:model="password_confirmation"
                type="password"
                class="form-control"
                id="password_confirmation"
                required
                autocomplete="new-password"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
            >
        </div>

        <div class="mb-6">
            <button type="submit" class="btn btn-primary d-grid w-100">{{ __('Register') }}</button>
        </div>
    </form>

    @if (Route::has('login'))
        <p class="text-center">
            <span>{{ __('Already have an account?') }}</span>
            <a href="{{ route('login') }}" wire:navigate>
                <span>{{ __('Sign in') }}</span>
            </a>
        </p>
    @endif
</div>
