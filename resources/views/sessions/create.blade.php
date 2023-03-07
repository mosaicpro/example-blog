<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 border border-gray-200 bg-gray-100 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Log In!</h1>
            <form class="mt-6" method="POST" action="/sessions">
                @csrf
                <div class="mb-6">
                    <label
                        class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="email"
                    >
                        email
                    </label>
                    <input class="border border-gray-400 p-2 w-full"
                           type="email"
                           name="email"
                           id="email"
                           value="{{ old('email') }}"
                           required
                    >
                    @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label
                        class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="password"
                    >
                        Password
                    </label>
                    <input class="border border-gray-400 p-2 w-full"
                           type="password"
                           name="password"
                           id="password"
                           required
                    >
                    @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <button
                        type="submit"
                        class="rounded bg-blue-400 text-white py-2 px-4 hover:bg-blue-500"
                    >
                        Log In
                    </button>

                </div>
            </form>
        </main>
    </section>
</x-layout>
