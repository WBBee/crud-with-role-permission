<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use App\Traits\WithDataTable;
use Livewire\Component;
use Livewire\WithPagination;

class UserDataTable extends Component
{
    use WithPagination, WithDataTable;

    public $model;
    public $name;

    public $perPage = 10;
    public $sortField = "id";
    public $sortAsc = true;
    public $search = '';

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public $user;
    public $confirmingUserDeletion = false;
    public function showUserDeletionModal($id)
    {
        $this->user = User::find($id);
        $this->confirmingUserDeletion = true;
    }

    public function confirmUserDeletion()
    {
        $this->user->delete();
        $this->confirmingUserDeletion = false;
    }

    public function render()
    {
        $data = $this->getPaginationData();
        return view($data['view'], $data);
    }
}
