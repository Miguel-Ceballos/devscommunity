<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-3 py-2 bg-white border-2 border-indigo-600 rounded-md font-bold text-sm text-indigo-600 tracking-widest shadow-sm hover:bg-indigo-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
