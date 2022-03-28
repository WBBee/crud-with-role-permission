<?php
namespace App\Traits;

trait WithDataTable
{
    public function getPaginationData(): array
    {
        switch ($this->name) {
            case 'roles':
                $roles = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.admin.permissions.role-data-table',
                    "roles" => $roles,
                    "class" => 'nowrap text-center',
                    "data" => array_to_object([
                        'href' => [
                            // 'create_new' => route('user.new'),
                            'create_new_text' => 'Buat User Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'permissions':
                $permissions = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.admin.permissions.permission-data-table',
                    "permissions" => $permissions,
                    "class" => 'nowrap text-center',
                    "data" => array_to_object([
                        'href' => [
                            // 'create_new' => route('user.new'),
                            'create_new_text' => 'Buat User Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            default:
                # code...
                break;
        }
    }
}
