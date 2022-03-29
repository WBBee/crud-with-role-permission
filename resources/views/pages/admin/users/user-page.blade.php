<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Management - Users') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a >Management</a></div>
                <div class="breadcrumb-item"><a href="{{ route('users') }}">Users</a></div>
                {{-- <div class="breadcrumb-item"><a href="#">Management - Access</a></div> --}}
            </div>
    </x-slot>

    <div>
        <livewire:admin.users.user-data-table name="users" :model="$users"/>
    </div>
</x-app-layout>
