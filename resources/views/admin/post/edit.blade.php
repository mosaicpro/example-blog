<x-layout>
    <x-setting :heading="'Edit Post: ' . $post->title">
        <form method="get" action="/admin/post/{{ $post->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-6">
                <label for="title">Title</label>
                <input required
                       class="border border-gray-400 p-2 w-full"
                       name="title"
                       value="{{ old('title', $post->title) }}"
                       id="title" type="text" />
                @error('title')
                <div>
                    <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                </div>
                @enderror
            </div>

            <div class="flex mb-6">
                <div class="flex-1">
                    <label for="thumbnail">Thumbnail</label>
                    <input
                           class="border border-gray-400 p-2 w-full"
                           name="thumbnail"
                           id="thumbnail" type="file" />
                    @error('thumbnail')
                </div>
                <div>
                    <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                </div>
                @enderror
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl mt-6 ml-6" width="100">
                </div>
            </div>

            <div class="mb-6">
                <label for="excerpt">Excerpt</label>
                <textarea
                    rows="5"
                    cols="30"
                    required
                    class="w-full border border-gray-400 p-2 text-sm focus-outline-none focus-ring"
                    id="excerpt"
                    name="excerpt"
                > {{ old('excerpt', $post->excerpt) }}</textarea>
                @error('excerpt')
                <div>
                    <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                </div>
                @enderror
            </div>
            <div class="mb-6">
                <label for="body">Body</label>
                <textarea
                    rows="5"
                    cols="30"
                    required
                    class="w-full text-sm border border-gray-400 p-2  focus-outline-none focus-ring"
                    id="body"
                    name="body"
                >
                    {{ old('body', $post->body) }}
                </textarea>
                @error('body')
                <div>
                    <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                </div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="category_id">Category</label>
                <select class="ml-2 p-1 border border-gray-400 bg-gray-100"
                        name="category_id">
                    @foreach($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                            {{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                @error('category')
                <div>
                    <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                </div>
                @enderror
            </div>

            <x-submit-button>Update</x-submit-button>
        </form>
    </x-setting>
</x-layout>
