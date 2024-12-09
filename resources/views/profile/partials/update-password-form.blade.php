<section>
    <header>
        <h2 class="h4 text-primary">
            {{ __('Update Password') }}
        </h2>

        <p>
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-4">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="current_password" class="form-label">{{ __('Current Password') }}</label>
            <input id="current_password" name="current_password" type="password" class="form-control w-75" autocomplete="current-password">
            @if ($errors->updatePassword->has('current_password'))
                <div class="text-danger mt-1">
                    @foreach ($errors->updatePassword->get('current_password') as $message)
                        <div>{{ $message }}</div>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">{{ __('New Password') }}</label>
            <input id="password" name="password" type="password" class="form-control w-75" autocomplete="new-password">
            @if ($errors->updatePassword->has('password'))
                <div class="text-danger mt-1">
                    @foreach ($errors->updatePassword->get('password') as $message)
                        <div>{{ $message }}</div>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control w-75" autocomplete="new-password">
            @if ($errors->updatePassword->has('password_confirmation'))
                <div class="text-danger mt-1">
                    @foreach ($errors->updatePassword->get('password_confirmation') as $message)
                        <div>{{ $message }}</div>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)" class="text-success mb-0">{{ __('Your password has been successfully updated.') }}</p>
            @endif
        </div>
    </form>
</section>