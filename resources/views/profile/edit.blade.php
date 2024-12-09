<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-semibold text-xl text-dark leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <div class="row gy-4">
                <div class="col-12">
                    <div class="p-4 bg-gray-800 shadow rounded">
                        <div class="max-w-xl">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="p-4 bg-gray-800 shadow rounded">
                        <div class="max-w-xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="p-4 bg-gray-800 shadow rounded">
                        <div class="max-w-xl">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>