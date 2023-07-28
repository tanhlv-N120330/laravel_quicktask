<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Post List") }}
                </div>
            </div>
            <div class="w-full mt-8">
                <a href="{{route('posts.create')}}">
                    <x-button>
                        {{ __('Create New Post') }}
                    </x-button>
                </a>
                <table class="mt-4 table w-full">
                    <thead>
                        <tr class="border-b-2 text-gray-900 dark:text-gray-100" scope="col">
                            <th>#</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                        <tbody>
                    </thead>
                        @foreach ($posts as $index => $post )
                            <tr class="border-b-2 text-gray-900 dark:text-gray-100 text-center">
                                <th scope="row">{{$index}}</th>
                                <td>{{$post->title}}</td>
                                <td>{{$post->content}}</td>
                                <td>
                                    <a href="{{ route('posts.edit', ['post' => $post->id]) }}">
                                        <x-button class="w-full mt-2 justify-center">
                                            {{ __('Edit') }}
                                        </x-button>
                                    </a>
                                    <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <x-button type="submit" class="mt-2 mb-4">
                                            {{ __('Delete') }}
                                        </x-button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
