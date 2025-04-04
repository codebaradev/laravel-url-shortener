<button {{ $attributes->merge(['type' => 'button', 'class' => 'border border-cyan-500 text-slate-400  px-3 py-1 rounded-md transition duration-100 hover:bg-cyan-500/10 hover:text-white']) }}>
    {{ $slot }}
</button>
