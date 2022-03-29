<!-- Device Token Confirmation Modal -->
<x-jet-dialog-modal wire:model="confirmingUserDeletion">
    <x-slot name="title">
        {{ __('Delete Account') }}
    </x-slot>

    <x-slot name="content">
        <div class="row form-group col-span-6 sm:col-span-5">
            <div class="col-sm-12">
                {{ __('Are you sure you want to delete this account? Once this account is deleted, all of its resources and data will be permanently deleted..') }}
            </div>

        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
            {{ __('nevermind') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click.prevent="confirmUserDeletion()" wire:loading.attr="disabled">
            {{ __('delete account') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>
