<section class="mb-4">
    <header>
        <h2 class="h4 text-primary">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <div class="flex items-center mt-3">
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmUserDeletionModal">
            {{ __('Delete Account') }}
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-labelledby="confirmUserDeletionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-gray-800 shadow">
                <form id="delete-account-form" method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="modal-header">
                        <h5 class="modal-title text-warning" id="confirmUserDeletionModalLabel">
                            {{ __('Are you sure you want to delete your account?') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <p class="text-light">
                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                        </p>

                        <div class="my-3">
                            <label for="password"
                                class="form-label text-danger fst-italic fw-bold">{{ __('Please enter your password to confirm deletion') }}</label>
                            <input id="password" name="password" type="password" class="form-control"
                                placeholder="{{ __('Password') }}">
                        </div>
                        <div id="error-message" class="text-danger"></div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('Delete Account') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById('delete-account-form').addEventListener('submit', function (event) {
        event.preventDefault();

        const form = event.target;
        const formData = new FormData(form);
        const errorMessageDiv = document.getElementById('error-message');

        fetch(form.action, {
            method: form.method,
            headers: {
                'X-CSRF-TOKEN': formData.get('_token'),
                'Accept': 'application/json',
            },
            body: formData,
        })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(data => {
                        throw new Error(data.message || 'Something went wrong');
                    });
                }
                return response.json();
            })
            .then(data => {
                if (data.errors) {
                    const errors = Object.values(data.errors).flat();
                    errorMessageDiv.innerHTML = errors.join('<br>');
                } else if (data.message) {
                    errorMessageDiv.innerHTML = data.message;
                } else {
                    window.location.href = data.redirect;
                }
            })
            .catch(error => {
                errorMessageDiv.innerHTML = error.message;
            });
    });
</script>