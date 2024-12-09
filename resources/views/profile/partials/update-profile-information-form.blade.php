<section>
    <header>
        <h2 class="h4 text-primary">
            {{ __('Profile Information') }}
        </h2>

        <p>
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-4">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input id="name" name="name" type="text" class="form-control w-75" value="{{ old('name', $user->name) }}"
                required autofocus autocomplete="name">
            <p class="text-warning text-opacity-75 fst-italic mt-1">{{ __('Tip: The name must consist of only letters.') }}</p>
            @if ($errors->has('name'))
                <div class="text-danger mt-1">
                    @foreach ($errors->get('name') as $message)
                        <div>{{ $message }}</div>
                    @endforeach
                </div>
            @endif
        </div>


        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" name="email" type="email" class="form-control w-75"
                value="{{ old('email', $user->email) }}" required autocomplete="username">
            @if ($errors->has('email'))
                <div class="text-danger mt-1">
                    @foreach ($errors->get('email') as $message)
                        <div>{{ $message }}</div>
                    @endforeach
                </div>
            @endif


            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-muted">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="btn btn-link p-0">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="text-success mt-2">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                    class="text-success mb-0">{{ __('Profile updated successfully!') }}</p>
            @endif
        </div>
    </form>
</section>