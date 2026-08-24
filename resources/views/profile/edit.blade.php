<x-admin-layout title="Mon profil">

    <div class="admin-profile-page">
        @include('profile.partials.update-profile-information-form')
        @include('profile.partials.update-password-form')
        @include('profile.partials.delete-user-form')
    </div>

</x-admin-layout>