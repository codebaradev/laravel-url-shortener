<x-app-layout>
    <section class="mt-10">
        <div class="container mx-auto px-16">
            <div class="border border-gray-500 rounded-lg bg-slate-700/10 ">
                <div class="flex flex-col justify-center text-center p-40">
                    <div class="flex flex-col mb-7 ">
                        <label class="text-lg mb-3 font-bold text-slate-500" for="link">{{ __('Shorten URL Success ✅') }}</label>
                        <div class="flex">
                            <span class="border border-slate-500 flex px-2 items-center flex-1 text-left text-blue-500">
                                <a id="shorten-url" class="" href="http://127.0.0.1:8000/{{ $url->short }}">http://127.0.0.1:8000/{{ $url->short }}</a>
                            </span>
                            <div class="relative flex flex-col justify-center">
                                <x-primary-button type="button" onclick="copyUrl('shorten-url', 'copied')"  class="mx-auto px-5 py-3 rounded-l-none">{{ __('Copy') }}</x-primary-button>
                                <span id="copied" class="hidden absolute bottom-full text-right text-green-500/75 pr-3">Copied</span>
                            </div>
                        </div>
                        <a class="mt-5 text-slate-500 transition duration-100 hover:text-blue-500" href="/">Shorten another URL?</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function copyUrl(urlId, copiedId) {
            const urlElement = document.getElementById(urlId);
            const copiedElement = document.getElementById(copiedId);
            const url = urlElement.href;

            navigator.clipboard.writeText(url)

            if (copiedElement) {
                copiedElement.classList.remove('hidden');
                setTimeout(() => {
                    copiedElement.classList.add('hidden');
                }, 1000);
            }
        }
    </script>
</x-app-layout>
