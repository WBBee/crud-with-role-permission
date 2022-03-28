<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Management - Role & Permission') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a >Management</a></div>
                <div class="breadcrumb-item"><a href="{{ route('role-permission') }}">Role & Permission</a></div>
                {{-- <div class="breadcrumb-item"><a href="#">Management - Access</a></div> --}}
            </div>
    </x-slot>

    <div>
        <div class="row">
            <div class="col-12">
                <livewire:admin.permissions.role-permission-create />
            </div>

            <div class="col-12">
                <livewire:admin.permissions.role-data-table name="roles" :model="$roles" />
            </div>

            <div class="col-12">
                <livewire:admin.permissions.permission-data-table name="permissions" :model="$permissions" />
            </div>
        </div>
    </div>
</x-app-layout>
