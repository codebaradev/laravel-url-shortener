<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-cyan-500 text-white px-3 py-1 rounded-lg transition duration-100 hover:bg-cyan-600']) }}>
    <span class="mx-auto">
        {{ $slot }}
    </span>
</button>
