<div>
    <div class="row form-group col-span-6 sm:col-span-5">
        <div class="col-sm-6 mb-1">
            {{ __('Create New Role. ') }}
            <form wire:submit.prevent="createNewRole()">
                <div class="row ">
                    <div class="col-sm-8 mb-1">
                        <input type="text" wire:model.defer="role_name" class=" block w-full form-control" autocomplete="off" id="exampleInputEmail1" placeholder="Enter role name">
                        <x-jet-input-error for="role_name" class="mt-2" />
                    </div>
                    <div class="col-sm-4 mb-1">
                        <div class="input-group-append">
                            <button class="btn btn-info block w-full form-control" type="button" wire:click.prevent="createNewRole()">ADD NEW</button>
                          </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-sm-6 mb-1">
            {{ __('Create New permission. ') }}
            <form wire:submit.prevent="createNewPermission()">
                <div class="row">
                    <div class="col-sm-8 mb-1">
                        <input type="text" wire:model.defer="permission_name" class=" block w-full form-control" autocomplete="off" id="exampleInputEmail1" placeholder="Enter permission name">
                        <x-jet-input-error for="permission_name" class="mt-2" />
                    </div>
                    <div class="col-sm-4 mb-1">
                        <div class="input-group-append">
                            <button class="btn btn-info block w-full form-control" type="button" wire:click.prevent="createNewPermission()" >ADD NEW</button>
                          </div>
                    </div>

                </div>
            </form>
        </div>
    </div>

</div>
