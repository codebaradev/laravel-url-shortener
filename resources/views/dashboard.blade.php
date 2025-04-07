<x-app-layout>
    <section class="py-10">
        <div class="container mx-auto px-10">
            <div class="">
                <div class="flex justify-between gap-10 items-center mb-5">
                    <h1 class="text-slate-500 text-xl font-bold">Shorten <span class="text-cyan-500">URLs</span></h1>
                    <form action="" method="get" class="flex-1">
                        <div class="flex items-center gap-2 border border-slate-500 rounded-full py-1 px-2 ">
                            <button class="p-1 rounded-full hover:bg-slate-500/10">
                                <svg width="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#64748b "><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="#64748b " stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                            </button>
                            <input id="search" name="search" type="text" placeholder="Search" value="{{ request('search') }}" class="w-full p-0 border-none outline-none bg-transparent text-slate-300 focus:outline-none focus:ring-0 focus:border-transparent" />
                        </div>
                    </form>
                    <x-primary-button onclick="hideShowElm('shorten-new-url-container')" class="px-5 py-2">{{ __('Add') }}</x-primary-button>
                </div>
                {{-- Shorten Url --}}
                <div id="shorten-new-url-container" class="{{ $errors->has('link') ? '' : 'hidden' }} fixed z-10 top-0 left-0 w-full h-full bg-slate-900/70" onclick="hideOnClickOutside(event, 'shorten-new-url-container')">
                    <div class="p-10 w-1/2 border border-gray-500 rounded-lg bg-slate-800 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" onclick="event.stopPropagation()">
                        <h1 class="text-xl text-slate-500 mb-2">Shorten <span class="text-cyan-500">URL</span></h1>
                        <form method="post" action="/app/urls" class="flex flex-col gap-5">
                            @csrf

                            <div>
                                <x-input-label class="mb-2" for="link" :value="__('Paste your URL here 👇')" />
                                <x-text-input id="link" name="link" type="text" class=" block w-full" :value="old('link')" autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('link')" />
                            </div>

                            <div class="">

                                <x-secondary-button onclick="hideShowElm('shorten-new-url-container')" class="px-5">{{ __('Cancel') }}</x-secondary-button>
                                <x-primary-button class="ml-3 px-5">{{ __('Shorten') }}</x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="flex flex-col p-5 border min-h-[65vh] border-gray-500 rounded-lg bg-slate-700/10">

                    @if (count($urls) == 0)
                    <div class="flex justify-center items-center m-auto">
                        <p class="text-xl text-slate-500 opacity-50">No <span class="text-cyan-500">URLs</span> have been shortened yet.</p>
                    </div>
                    @endif

                    {{-- List of Urls --}}
                    @foreach ($urls as $url)
                        <div>
                            <div onclick="hideShowElm('edit-url-{{ $url->short }}-container')" class="relative flex items-center cursor-pointer transition hover:scale-[1.01] hover:bg-slate-800/50 p-5 mb-5 rounded-lg border border-gray-500 bg-slate-700/10">
                                <div class="flex flex-col h-24 w-24 gap-2 justify-center items-center mr-2 bg-slate-800/70 rounded-lg p-2">
                                    <span class="text-slate-300 text-2xl">{{ $url->clicks }}</span>
                                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M7 7L5.5 5.5M15 7L16.5 5.5M5.5 16.5L7 15M11 5L11 3M5 11L3 11M17.1603 16.9887L21.0519 15.4659C21.4758 15.3001 21.4756 14.7003 21.0517 14.5346L11.6992 10.8799C11.2933 10.7213 10.8929 11.1217 11.0515 11.5276L14.7062 20.8801C14.8719 21.304 15.4717 21.3042 15.6375 20.8803L17.1603 16.9887Z" stroke="#06b6d4 " stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                </div>
                                <div class="flex-1">
                                    @if (!empty($url->name))
                                    <h3 class="text-slate-300 text-lg" > {{ $url->name }} </h3>
                                    @endif
                                    <div class="relative flex items-center ">
                                        <h1 class="text-cyan-500 text-xl  hover:underline" onclick="event.stopPropagation(); copyUrl(event, 'copied{{ $url->short }}')">{{ env('APP_URL_2') }}/{{ $url->short }} </h1>
                                        <span id="copied{{ $url->short }}" class="hidden text-green-500/75 pr-3 ml-3 ">Copied</span>
                                    </div>
                                    <h2 class="text-slate-500/50 text-md"> {{ $url->link }} </h2>
                                </div>

                                <div class="">
                                    <form method="post" action="/app/urls/{{ $url->id }}" >
                                        @method('DELETE')
                                        @csrf

                                        <button onclick="event.stopPropagation();" type="submit" class="text-red-500 hover:text-red-400 text-sm mt-2 p-4 flex justify-center items-center rounded-full border transition duration-100 border-red-700 hover:bg-red-700/10">
                                            <svg width="20px" viewBox="0 0 1024 1024" fill="#ff0000" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" stroke="#ff0000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M32 241.6c-11.2 0-20-8.8-20-20s8.8-20 20-20l940 1.6c11.2 0 20 8.8 20 20s-8.8 20-20 20L32 241.6zM186.4 282.4c0-11.2 8.8-20 20-20s20 8.8 20 20v688.8l585.6-6.4V289.6c0-11.2 8.8-20 20-20s20 8.8 20 20v716.8l-666.4 7.2V282.4z" fill=""></path><path d="M682.4 867.2c-11.2 0-20-8.8-20-20V372c0-11.2 8.8-20 20-20s20 8.8 20 20v475.2c0.8 11.2-8.8 20-20 20zM367.2 867.2c-11.2 0-20-8.8-20-20V372c0-11.2 8.8-20 20-20s20 8.8 20 20v475.2c0.8 11.2-8.8 20-20 20zM524.8 867.2c-11.2 0-20-8.8-20-20V372c0-11.2 8.8-20 20-20s20 8.8 20 20v475.2c0.8 11.2-8.8 20-20 20zM655.2 213.6v-48.8c0-17.6-14.4-32-32-32H418.4c-18.4 0-32 14.4-32 32.8V208h-40v-42.4c0-40 32.8-72.8 72.8-72.8H624c40 0 72.8 32.8 72.8 72.8v48.8h-41.6z" fill=""></path></g></svg>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <div id="edit-url-{{ $url->short }}-container" class="{{ $errors->any() ? '' : 'hidden' }} fixed z-10 top-0 left-0 w-full h-full bg-slate-900/70" onclick="hideOnClickOutside(event, 'edit-url-{{ $url->short }}-container')">
                                <div class="p-10 w-1/2 border border-gray-500 rounded-lg bg-slate-800 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" onclick="event.stopPropagation()">
                                    <h1 class="text-xl text-slate-500 mb-2">Edit Shorten <span class="text-cyan-500">URL</span></h1>
                                    <form method="post" action="/app/urls/{{ $url->id }}" class="flex flex-col gap-5">
                                        @method('PUT')
                                        @csrf

                                        <div>
                                            <x-input-label for="name" :value="__('Name')" />
                                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $url->name)" autofocus autocomplete="name" />
                                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                        </div>
                                        <div>
                                            <x-input-label for="short" :value="__('Shortened Url')" />
                                            <div class="flex items-center">
                                                <span class="text-slate-500">{{ env('APP_URL_2') }}</span>
                                                <x-text-input id="short" name="short" type="text" class="flex-1 block w-full" :value="old('short', $url->short)" autofocus autocomplete="name" />
                                            </div>
                                            <x-input-error class="mt-2" :messages="$errors->get('short')" />
                                        </div>
                                        <div>
                                            <x-input-label class="mb-2" for="link" :value="__('Paste your URL here 👇')" />
                                            <x-text-input id="link" name="link" type="text" class=" block w-full" :value="old('link', $url->link)" autofocus autocomplete="name" />
                                            <x-input-error class="mt-2" :messages="$errors->get('link')" />
                                        </div>

                                        <div class="">

                                            <x-secondary-button onclick="hideShowElm('edit-url-{{ $url->short }}-container')" class="px-5">{{ __('Cancel') }}</x-secondary-button>
                                            <x-primary-button class="ml-3 px-5">{{ __('Save') }}</x-primary-button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <script>
        function copyUrl(event, copiedId) {
            const urlElement = event.target;
            const url = urlElement.innerHTML;

            navigator.clipboard.writeText(url)

            const copiedSpan = document.getElementById(copiedId);
            if (copiedSpan) {
                copiedSpan.classList.remove('hidden');
                setTimeout(() => {
                    copiedSpan.classList.add('hidden');
                }, 1000);
            }
        }

        function hideOnClickOutside(event, id) {
            const element = document.getElementById(id);
            if (element && event.target === element) {
                element.classList.add('hidden');
            }
        }

        function hideShowElm(id) {
            const element = document.getElementById(id);
            if (element) {
                element.classList.toggle('hidden');

                if (!element.classList.contains('hidden')) {
                    const urlInput = document.querySelector(`#${id} input[type="text"]`);
                    if (urlInput) {
                        urlInput.focus();
                    }
                }
            }
        }
    </script>
</x-app-layout>
