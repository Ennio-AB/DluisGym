{{-- Gym figure: V-pose silhouette (arms raised, wide torso) --}}
<svg {{ $attributes->merge(['xmlns' => 'http://www.w3.org/2000/svg', 'viewBox' => '0 0 80 100', 'fill' => 'currentColor', 'aria-hidden' => 'true']) }}>
    {{-- Head --}}
    <circle cx="40" cy="12" r="10"/>
    {{-- Left arm raised up-left --}}
    <path d="M17 26 L2 3 L11 0 L28 26 Z"/>
    {{-- Right arm raised up-right --}}
    <path d="M63 26 L78 3 L69 0 L52 26 Z"/>
    {{-- Torso (V-taper: wide shoulders, narrow waist) --}}
    <polygon points="14,24 66,24 58,64 22,64"/>
    {{-- Left leg --}}
    <path d="M22 64 L29 64 L23 97 L14 97 Z"/>
    {{-- Right leg --}}
    <path d="M58 64 L65 64 L68 97 L59 97 Z"/>
</svg>
