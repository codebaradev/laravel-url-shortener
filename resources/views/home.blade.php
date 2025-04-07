<x-app-layout>
    <section class="mt-10">
        <div class="container mx-auto px-16">
            <div class="border border-gray-500 rounded-lg bg-slate-700/10 ">
                <form method="post" action="/app/shortened" class="flex flex-col justify-center text-center p-40">
                    @csrf

                    <div class="flex flex-col mb-7">
                        <label class="text-lg mb-3 font-bold text-slate-500" for="link">{{ __('Paste the URL to be shortened here 👇') }}</label>
                        <div class="flex">
                            <x-text-input id="link" name="link" type="text" class=" block w-full flex-1 bg-transparent" :value="old('link')" placeholder="Url" autofocus autocomplete="name" />
                            <x-primary-button class="mx-auto">{{ __('Shorten URL') }}</x-primary-button>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('link')" />
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>
