<x-guest-layout>
    @if(session('status'))
        <div class="mb-6 text-sm text-ash border border-iron px-4 py-2">
            {{ session('status') }}
        </div>
    @endif

    <h2 class="font-display text-3xl text-paper tracking-wide mb-8">INGRESAR</h2>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <label class="label text-ash">Correo electrónico</label>
            <input id="email" name="email" type="email" class="input bg-steel border-iron text-paper placeholder-ash focus:border-paper"
                   value="{{ old('email') }}" required autofocus autocomplete="username">
            @error('email')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="label text-ash">Contraseña</label>
            <input id="password" name="password" type="password"
                   class="input bg-steel border-iron text-paper focus:border-paper"
                   required autocomplete="current-password">
            @error('password')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="flex items-center gap-2">
            <input id="remember_me" name="remember" type="checkbox" class="border-iron bg-steel">
            <label for="remember_me" class="text-xs text-ash">Recordarme</label>
        </div>

        <div class="flex items-center justify-between pt-2">
            @if(Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-xs text-ash hover:text-mist transition-colors underline">
                    ¿Olvidaste tu contraseña?
                </a>
            @endif
            <button type="submit" class="btn bg-paper text-ink hover:bg-mist ml-auto">Entrar</button>
        </div>

        <p class="text-xs text-ash mt-4">
            ¿No tienes cuenta?
            <a href="{{ route('register') }}" class="text-mist hover:text-paper underline transition-colors">Regístrate</a>
        </p>
    </form>
</x-guest-layout>
