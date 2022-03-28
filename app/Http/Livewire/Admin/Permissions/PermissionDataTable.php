<?php

namespace App\Http\Livewire\Admin\Permissions;

use App\Models\Permission;
use App\Traits\WithDataTable;
use Livewire\Component;
use Livewire\WithPagination;

class PermissionDataTable extends Component
{
    use WithDataTable, WithPagination;

    public $name;
    public $model;

    public $perPage = 5;
    public $sortField = "id";
    public $sortAsc = true;
    public $search = '';

    protected $listeners = ['refresh' => '$refresh'];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function deletePermission($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        $this->emit('refresh');
    }

    public function render()
    {
        $data = $this->getPaginationData();
        return view($data['view'], $data);
    }
}
