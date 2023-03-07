<x-layout>
    <x-setting heading="Publish New Post">
                <form action="./" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-6">
                        <label for="title">Title</label>
                        <input required
                               class="border border-gray-400 p-2 w-full"
                               name="title"
                               value="{{ old('title') }}"
                               id="title" type="text" />
                        @error('title')
                        <div>
                            <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                        </div>
                        @enderror
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
                        > {{ old('excerpt') }}</textarea>
                        @error('excerpt')
                        <div>
                            <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="thumbnail">Thumbnail</label>
                        <input required
                               class="border border-gray-400 p-2 w-full"
                               name="thumbnail"
                               id="thumbnail" type="file" />
                        @error('thumbnail')
                        <div>
                            <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="category_id">Category</label>
                        <select class="ml-2 p-1 border border-gray-400 bg-gray-100" name="category_id">
                            @foreach($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected': ''  }}>
                                    {{ ucwords($category->name) }}</option>
                            @endforeach
                        </select>

                        @error('category')
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
                            {{ old('body') }}
                           </textarea>
                        @error('body')
                        <div>
                            <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>

                    <x-submit-button>Publish</x-submit-button>
                </form>
    </x-setting>

</x-layout>
