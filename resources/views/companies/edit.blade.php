<x-app-layout>
    <div class="container mt-5 flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">

        <form method="POST" action="{{ route('companies.update', ['company' => $company->id]) }}" class="w-50"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <x-input-label for="name" :value="__('Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name') ?? $company->name" />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                    :value="old('email') ?? $company->email" />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="website" :value="__('website')" />

                <x-text-input id="website" class="block mt-1 w-full" type="text" name="website"
                    :value="old('website') ?? $company->website" />

                <x-input-error :messages="$errors->get('website')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="logo" :value="__('logo')" />

                <x-text-input type="file" id="logo" class="block mt-1 w-full" name="logo"
                    :value="$company->getFirstMediaUrl('logo')" />

                <x-input-error :messages="$errors->get('logo')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">


                <x-primary-button class="ml-4">
                    {{ __('Create') }}
                </x-primary-button>
            </div>
        </form>
    </div>

</x-app-layout>
