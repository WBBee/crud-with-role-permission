<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Management - Role & Permission') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a >Management</a></div>
                <div class="breadcrumb-item"><a href="{{ route('role-permission') }}">Role & Permission</a></div>
                <div class="breadcrumb-item"><a >Permission - Edit</a></div>
            </div>
    </x-slot>

    <div>
        <livewire:admin.permissions.role-permission-edit action="edit_permission" :id="$id"/>
    </div>
</x-app-layout>
