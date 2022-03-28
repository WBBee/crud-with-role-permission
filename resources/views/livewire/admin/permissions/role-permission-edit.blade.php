<div>
    <div class="row form-group col-span-6 sm:col-span-5">
        <div class="col-sm-6 mb-2">
            <div class="row ">
                <div class="col-sm-12 mb-1">
                    {{ __('Update Data. ') }}
                    <form wire:submit.prevent="updateByName()">
                        <div class="row ">
                            <div class="col-sm-8 mb-1">
                                <input type="text" wire:model.defer="name" class=" block mt-1 w-full form-control" autocomplete="off">
                                <x-jet-input-error for="name" class="mt-2" />
                            </div>
                            <div class="col-sm-4 mb-1">
                                <div class="input-group-append">
                                    <button class="btn btn-info block mt-1 w-full form-control" type="button" wire:click.prevent="updateByName()">UPDATE</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-sm-12 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-title mb-2">{{ $data['name'] }} (
                                @if ($action == 'edit_role') {{ $role->name }}
                                @elseif ($action == 'edit_permission') {{ $permission->name }}
                                @endif
                             ) - ({{ $data['users']->count() }})</div>
                            <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                                @foreach ($data['users'] as $user)
                                <li class="media">
                                    <div class="media-body ml-3">
                                    <div class="media-title">{{ (String)$user->name }}</div>
                                    <div class="text-small text-muted">{{ $user->email }} </i></div>
                                    </div>
                                    <a href="#" wire:click.prevent="removeUserRole({{ $user->id }})"> <i class="fas fa-trash-alt" ></i></a>
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
                    <select required id="add_by_name" name="add_by_name" wire:model.defer="add_by_name" class="block mt-1 w-full form-control">
                        <option >CHOOSE ONE</option>
                        @foreach ($data['unused'] as $unused)
                        <option value="{{ $unused['name'] }}">{{ $unused['name'] }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="add_by_name" class="mt-2" />
                </div>
                <div class="col-sm-4 mb-2">
                    <div class="input-group-append">
                        <button class="btn btn-info block mt-1 w-full form-control" type="button" wire:click.prevent="addByName()" >ADD NEW</button>
                      </div>
                </div>

                <div class="col-sm-12 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-title mb-2">Usage List ({{ $data['used']->count() }})</div>
                            <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                                @foreach ($data['used'] as $used)
                                <li class="media">
                                    <div class="media-body ml-3">
                                    <div class="media-title">{{ $used->name }}</div>
                                    <div class="text-small text-muted">Added At {{ $used->updated_at }} </i></div>
                                    </div>
                                    <a href="#" wire:click.prevent="removedById({{ $used->id }})"> <i class="fas fa-trash-alt" ></i></a>
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
