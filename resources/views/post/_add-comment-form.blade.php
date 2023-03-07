@auth()
    <x-panel>
        <form class="" action="/posts/{{$post->slug}}/comments" method="post">
            @csrf
            <header class="flex items-center">
                <img class="rounded-full mr-3" src="https://i.pravatar.cc/60?u={{auth()->id()}}" alt="profile pic" width="40" height="40">
                <h2>Want to Participate</h2>
            </header>
            <div class="mt-8">
                <textarea class="w-full text-sm focus-outline-none focus-ring" placeholder="Quick! Think of something to say." name="body" id="" cols="30" rows="5" required></textarea>
            </div>
            <div class="flex justify-end mt-6 border-t border-gray-200 pt-6">
                <x-submit-button>Post</x-submit-button>
            </div>
        </form>
        @error('body')
        <p class="text-xs text-red-500">{{ $message }}</p>
        @enderror
    </x-panel>
@else
    <p>
        <a class="text-blue-500 hover:underline" href="/register">Register</a> or <a class="text-blue-500 hover:underline" href="/login">Log in</a> to leave a comment
    </p>
@endauth
