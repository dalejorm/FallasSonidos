<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-5 py-2 my-2 bg-[#36A9E1] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#2F80ED] active:bg-[#2F80ED] focus:outline-none focus:border-[#2F80ED] focus:ring focus:ring-blue-300 disabled:opacity-25 transition ']) }}>
    {{ $slot }}
</button>
