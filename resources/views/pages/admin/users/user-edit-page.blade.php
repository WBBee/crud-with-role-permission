<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Management - Users') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a >Management</a></div>
                <div class="breadcrumb-item"><a href="{{ route('users') }}">Users</a></div>
                <div class="breadcrumb-item"><a href="#">Users - Edit</a></div>
            </div>
    </x-slot>

    <div>
        <div class="row">
            <div class="col-sm-12">
                <livewire:admin.users.user-create-new action="updateUser" :userId="$id"/>
            </div>
            <div class="col-sm-12">
                <livewire:admin.users.user-edit action="edit_user" :id="$id"/>
            </div>
        </div>
    </div>
</x-app-layout>
