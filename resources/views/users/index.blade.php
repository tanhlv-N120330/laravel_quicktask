<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("User List") }}
                </div>
            </div>
            <div class="w-full mt-8">
                <x-button>
                    {{ __('Create New User') }}
                </x-button>
                <table class="mt-4 table w-full">
                    <thead>
                        <tr class="border-b-2 text-gray-900 dark:text-gray-100" scope="col">
                            <th>#</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Action</th>
                        </tr>
                        <tbody>
                    </thead>
                        @foreach ($users as $index => $user )
                            <tr class="border-b-2 text-gray-900 dark:text-gray-100 text-center">
                                <th scope="row">{{$index}}</th>
                                <td>{{$user->full_name}}</td>
                                <td>{{$user->username}}</td>
                                <td>
                                    <x-button class="mt-4">
                                        {{ __('Edit') }}
                                    </x-button>
                                    <x-button class="mt-4">
                                        {{ __('Delete') }}
                                    </x-button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
