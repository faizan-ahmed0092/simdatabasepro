<x-app-layout>
    <x-slot name="header" >
        <div style="display: flex; justify-content: space-between;">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight" >
                {{ __('Profile') }}
            </h2>
            <a href="{{route('admin.dashboard')}}" style="background: gray;padding: 8px; border-radius: 10px; color: white;"> Dashboard</a>
        </div>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
