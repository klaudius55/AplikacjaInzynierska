<?php

namespace App\Http\Livewire\Materials;

use App\Actions\Materials\EditMaterial;
use App\Actions\Materials\RestoreMaterial;
use App\Actions\Materials\SoftDeleteMaterial;
use App\Actions\Units\SoftDeleteUnit;
use App\Models\Material;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Actions\RedirectAction;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use WireUi\Traits\Actions;

class MaterialsTableView extends TableView
{
    use Actions;
    /**
     * Sets a model class to get the initial data
     */
    public function repository(): Builder
    {
        return Material::query()->withTrashed();
    }

    public $searchBy = ['name','thickness','types.name'];
    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title('ID')->sortBy('id'),
            Header::title(__('translation.attributes.name'))->sortBy('name'),
            Header::title(__('translation.attributes.thickness'))->sortBy('thickness'),
            'Typ',
            'Jednostka',
            Header::title(__('translation.attributes.created_at'))->sortBy('created_at'),
            Header::title(__('translation.attributes.updated_at'))->sortBy('updated_at'),
            Header::title(__('translation.attributes.deleted_at'))->sortBy('deleted_at'),
        ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row(Material $material): array
    {

        return [
        $material->id,
        $material->name,
        $material->thickness,
            $material->types->name??'',
            $material->units->name??'',
        $material->created_at,
        $material->updated_at,
        $material->deleted_at,

    ];
    }
    protected function actionsByRow()
    {
        return [
            new EditMaterial('materials.edit','Edytuj','edit'),
            new SoftDeleteMaterial(),
            new RestoreMaterial()
        ];
    }
    public function softDelete(int $id){

        $material = Material::find($id);
        $material->delete();
        $this->notification()->success(
            $title = __('translation.messages_materials.successes.destroy_title'),
            $description = __('translation.messages_materials.successes.destroy',['name' => $material->name])
        );
    }

    public function restore(int $id){
        $material = Material::withTrashed()->find($id);
        $material->restore();
        $this->notification()->success(
            $title = __('translation.messages_materials.successes.restore_title'),
            $description = __('translation.messages_materials.successes.restore',['name' => $material->name])
        );
    }
}
