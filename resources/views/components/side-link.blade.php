@props(['active' => false])

<a {{ $attributes }}
   class="{{ $active
       ? 'block px-3 py-2 text-fire bg-iron border-l-2 border-fire'
       : 'block px-3 py-2 text-ash hover:text-paper border-l-2 border-transparent hover:border-iron transition-all'
   }}">
    {{ $slot }}
</a>
