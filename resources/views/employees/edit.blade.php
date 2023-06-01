<x-app-layout>
    <div class="container mt-5 flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">

        <form method="POST" action="{{ route('employees.update', ['employee' => $employee->id]) }}" class="w-50">
            @csrf
            @method('PUT')
            <div>
                <x-input-label for="first_name" :value="__('First Name')" />

                <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name') ?? $employee->first_name"
                    required autofocus />

                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="last_name" :value="__('Last Name')" />

                <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name') ?? $employee->last_name"
                    required autofocus />

                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email') ?? $employee->email"
                    required />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="phone" :value="__('Phone')" />

                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone') ?? $employee->phone"
                    required />

                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="company_id" :value="__('company')" />

                <select class="form-select" aria-label="size 3 select" name="company_id" id="company_id">
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}"
                            {{ $company->id == $employee->company?->id ? 'selected' : '' }}>
                            {{ $company->name }}
                        </option>
                    @endforeach
                </select>


                <x-input-error :messages="$errors->get('company_id')" class="mt-2" />
            </div>


            <div class="flex items-center justify-end mt-4">


                <x-primary-button class="ml-4">
                    {{ __('Create') }}
                </x-primary-button>
            </div>
        </form>
    </div>

</x-app-layout>
