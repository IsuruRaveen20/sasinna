<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
        Laravel 9 JetStream Livewire User CRUD with Spatie
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                    role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            @can('manage users')
                <button wire:click="create()"
                    class="bg-blue-500 hover:bg-blue-700 text-white py-1 mb-6 px-3 rounded my-3 mt-1">Create New User</button>
                @if ($isOpen)
                    @include('livewire.create')
                @endif
            @endcan
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Role</th>
                        <th class="px-4 py-2 w-60">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="border px-4 py-2">{{ $user->id }}</td>
                            <td class="border px-4 py-2">{{ $user->name }}</td>
                            <td class="border px-4 py-2">{{ $user->email }}</td>
                            <td class="border px-4 py-2"></td>
                            <td class="border px-4 py-2 text-center">
                                @can('manage users')
                                    <button wire:click="edit({{ $user->id }})"
                                        class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded">Edit</button>
                                    <button wire:click="delete({{ $user->id }})"
                                        class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded">Delete</button>
                                @else
                                    <button class="bg-blue-500 opacity-50 cursor-not-allowed text-white py-1 px-3 rounded"
                                        disabled>Edit</button>
                                    <button class="bg-red-500 opacity-50 cursor-not-allowed text-white py-1 px-3 rounded"
                                        disabled>Delete</button>
                                    <div class="text-red-500">You don't have permission to perform this action.</div>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
        Laravel 9 JetStream Livewire User CRUD with Spatie
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                    role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            @can('manage users')
                <button wire:click="create()"
                    class="bg-blue-500 hover:bg-blue-700 text-white py-1 mb-6 px-3 rounded my-3 mt-1">Create New User</button>
                @if ($isOpen)
                    @include('livewire.create')
                @endif
            @endcan
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Role</th>
                        <th class="px-4 py-2 w-60">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="border px-4 py-2">{{ $user->id }}</td>
                            <td class="border px-4 py-2">{{ $user->name }}</td>
                            <td class="border px-4 py-2">{{ $user->email }}</td>
                            <td class="border px-4 py-2"></td>
                            <td class="border px-4 py-2 text-center">
                                @can('manage users')
                                    <button wire:click="edit({{ $user->id }})"
                                        class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded">Edit</button>
                                    <button wire:click="delete({{ $user->id }})"
                                        class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded">Delete</button>
                                @else
                                    <button class="bg-blue-500 opacity-50 cursor-not-allowed text-white py-1 px-3 rounded"
                                        disabled>Edit</button>
                                    <button class="bg-red-500 opacity-50 cursor-not-allowed text-white py-1 px-3 rounded"
                                        disabled>Delete</button>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> --}}

{{-- <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
        Laravel 9 JetStream Livewire User CRUD with Spatie
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                    role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            @can('manage users')
                <button wire:click="create()"
                    class="bg-blue-500 hover:bg-blue-700 text-white py-1 mb-6 px-3 rounded my-3 mt-1">Create New
                    User</button>
                @if ($isOpen)
                    @include('livewire.create')
                @endif
            @endcan
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Role</th>
                        <th class="px-4 py-2 w-60">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="border px-4 py-2">{{ $user->id }}</td>
                            <td class="border px-4 py-2">{{ $user->name }}</td>
                            <td class="border px-4 py-2">{{ $user->email }}</td>
                            <td class="border px-4 py-2"></td>
                            @can('manage users')
                                <td class="border px-4 py-2 text-center">
                                    <button wire:click="edit({{ $user->id }})"
                                        class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded">Edit</button>
                                    <button wire:click="delete({{ $user->id }})"
                                        class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded">Delete</button>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> --}}
