<x-guest-layout>

    <h2 class="font-display text-3xl text-paper tracking-wide mb-8">CREAR CUENTA</h2>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div>
            <label class="label text-ash">Nombre completo</label>
            <input id="name" name="name" type="text" class="input bg-steel border-iron text-paper focus:border-paper"
                   value="{{ old('name') }}" required autofocus autocomplete="name">
            @error('name')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="label text-ash">Correo electrónico</label>
            <input id="email" name="email" type="email" class="input bg-steel border-iron text-paper focus:border-paper"
                   value="{{ old('email') }}" required autocomplete="username">
            @error('email')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="label text-ash">Contraseña</label>
            <input id="password" name="password" type="password"
                   class="input bg-steel border-iron text-paper focus:border-paper"
                   required autocomplete="new-password">
            @error('password')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="label text-ash">Confirmar contraseña</label>
            <input id="password_confirmation" name="password_confirmation" type="password"
                   class="input bg-steel border-iron text-paper focus:border-paper"
                   required autocomplete="new-password">
            @error('password_confirmation')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="flex items-center justify-between pt-2">
            <a href="{{ route('login') }}" class="text-xs text-ash hover:text-mist transition-colors underline">
                ¿Ya tienes cuenta?
            </a>
            <button type="submit" class="btn bg-paper text-ink hover:bg-mist">Registrarse</button>
        </div>
    </form>
</x-guest-layout>
