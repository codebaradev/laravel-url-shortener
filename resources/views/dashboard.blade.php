<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}

    {{-- Create Url --}}
    <div>
        <form method="post" action="/app/urls">
            @csrf

            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
            <div>
                <x-input-label for="link" :value="__('Url')" />
                <x-text-input id="link" name="link" type="text" class="mt-1 block w-full" :value="old('link')" autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('link')" />
            </div>

            <x-secondary-button>{{ __('Cancel') }}</x-secondary-button>
            <x-primary-button>{{ __('Add') }}</x-primary-button>

        </form>
    </div>

    {{-- List of Urls --}}
    @foreach ($urls as $url)
        <div>
            <span class="text-white" > {{ $url->name }} </span>
            <span class="text-white"> {{ $url->link }} </span>
            <span class="text-white"> {{ $url->short }} </span>
            <span class="text-white"> {{ $url->clicks }} </span>

            <form method="post" action="/app/urls/{{ $url->id }}">
                @method('PUT')
                @csrf

                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $url->name)" autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <div>
                    <x-input-label for="link" :value="__('Url')" />
                    <x-text-input id="link" name="link" type="text" class="mt-1 block w-full" :value="old('link', $url->link)" autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('link')" />
                </div>
                <div>
                    <x-input-label for="short" :value="__('Shortened Url')" />
                    <x-text-input id="short" name="short" type="text" class="mt-1 block w-full" :value="old('short', $url->short)" autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('short')" />
                </div>

                <x-secondary-button>{{ __('Cancel') }}</x-secondary-button>
                <x-primary-button>{{ __('Save') }}</x-primary-button>

            </form>
        </div>
    @endforeach


</x-app-layout>
