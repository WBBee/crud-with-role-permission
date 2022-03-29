<div>
    @include('livewire.admin.users.modal.modal-delete-user')
    <x-data-table :data="$data" :model="$users">
        <x-slot name="title">
            Users Data
        </x-slot>
        <x-slot name="components">
            @foreach ($data->buttons as $button)
            <a class="btn btn-sm btn-info " href="{{ $button->link }}" data-toggle="tooltip" title="Create">
                <i class="fas fa-plus-square" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">{{ $button->text }}</span>
            </a>
            @endforeach
        </x-slot>
        <x-slot name="head">
            <tr>
                <th class="{{ $class }}"><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th class="{{ $class }}"><a wire:click.prevent="sortBy('name')" role="button" href="#">
                    Name
                    @include('components.sort-icon', ['field' => 'name'])
                </a></th>
                <th class="{{ $class }}">Roles</th>
                <th class="{{ $class }}">Permissions</th>
                <th class="{{ $class }}">Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($users as $user)
                <tr>
                    <th class="{{ $class }}">{{ $user->id }}</th>
                    <td class="{{ $class }}">{{ $user->name }}</td>
                    <td class="text-center">
                        @foreach ($user->getRoleNames() as $role)
                            <span class="badge badge-danger m-1">{{ $role }}</span>
                        @endforeach
                    </td>
                    <td class="text-center">
                        @foreach ($user->getPermissionNames() as $permission)
                            <span class="badge badge-primary m-1">{{ $permission }}</span>
                        @endforeach
                    </td>
                    <td class="text-center">
                        {{-- <a class="btn btn-sm btn-success mt-1" href="#" data-toggle="tooltip" title="Show">
                            <i class="fas fa-eye" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Show</span><span class="hidden-xs hidden-sm hidden-md"> User</span>
                        </a> --}}
                        <a class="btn btn-sm btn-info mt-1" href="{{ route('user.edit', $user->id ) }}" data-toggle="tooltip" title="Edit user">
                            <i class="fas fa-pencil-alt" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Edit</span><span class="hidden-xs hidden-sm hidden-md"> User</span>
                        </a>
                        <a class="btn btn-danger btn-sm mt-1" href="#" wire:click="showUserDeletionModal({{$user->id}})" data-toggle="tooltip" title="Delete user">
                            <i class="fas fa-trash-alt" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Delete</span><span class="hidden-xs hidden-sm hidden-md"> User</span>
                        </a>
                    </td>
                </tr>
            @endforeach

        </x-slot>
    </x-data-table>
</div>
