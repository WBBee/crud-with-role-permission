<div>
    <div class="row form-group col-span-6 sm:col-span-5">
        <div class="col-sm-6 mb-2">
            {{ __('Available Roles. ') }}
            <div class="row ">
                <div class="col-sm-8 mb-2">
                    <select required id="role_name" name="role_name" wire:model.defer="role_name" class="block mt-1 w-full form-control">
                        <option >CHOOSE ONE</option>
                        @foreach ($data['role_unused'] as $unused)
                        <option value="{{ $unused['name'] }}">{{ $unused['name'] }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="role_name" class="mt-2" />
                </div>
                <div class="col-sm-4 mb-2">
                    <div class="input-group-append">
                        <button class="btn btn-info block mt-1 w-full form-control" type="button" wire:click.prevent="addNewRole()">ADD NEW</button>
                      </div>
                </div>

                <div class="col-sm-12 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-title mb-2">User Role List ({{ $data['role_used']->count() }})</div>
                            <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                                @foreach ($data['role_used'] as $user_role)
                                <li class="media">
                                    <div class="media-body ml-3">
                                    <div class="media-title">{{ $user_role['name'] }}</div>
                                    <div class="text-small text-muted">Added At {{ $user_role['updated_at'] }} </i></div>
                                    </div>
                                    <a href="#" wire:click.prevent="removeRoleUser({{ $user_role['id'] }})"> <i class="fas fa-trash-alt" ></i></a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 mb-2">
            {{ __('Available Permissions. ') }}
            <div class="row">
                <div class="col-sm-8 mb-2">
                    <select required id="permission_name" name="permission_name" wire:model.defer="permission_name" class="block mt-1 w-full form-control">
                        <option >CHOOSE ONE</option>
                        @foreach ($data['permission_unused'] as $unused)
                        <option value="{{ $unused['name'] }}">{{ $unused['name'] }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="permission_name" class="mt-2" />
                </div>
                <div class="col-sm-4 mb-2">
                    <div class="input-group-append">
                        <button class="btn btn-info block mt-1 w-full form-control" type="button" wire:click.prevent="addNewPermission()" >ADD NEW</button>
                    </div>
                </div>

                <div class="col-sm-12 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-title mb-2">User Permission List ({{ $data['permission_used']->count() }})</div>
                            <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                                @foreach ($data['permission_used'] as $permission)
                                <li class="media">
                                    <div class="media-body ml-3">
                                    <div class="media-title">{{ $permission['name'] }}</div>
                                    <div class="text-small text-muted">Added At {{ $permission['updated_at'] }} </i></div>
                                    </div>
                                    <a href="#" wire:click.prevent="removePermissionUser({{ $permission['id'] }})"> <i class="fas fa-trash-alt" ></i></a>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
