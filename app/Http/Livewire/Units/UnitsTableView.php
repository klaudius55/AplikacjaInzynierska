<?php

namespace App\Http\Livewire\Units;

use App\Actions\Units\EditUnit;
use App\Actions\Units\RestoreUnit;
use App\Actions\Units\SoftDeleteUnit;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Actions\RedirectAction;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use WireUi\Traits\Actions;

class UnitsTableView extends TableView
{
    use Actions;
    /**
     * Sets a model class to get the initial data
     */
    public function repository(): Builder
    {
        return Unit::query()->withTrashed();
    }

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
    public function row(Unit $unit): array
    {
        return [
            $unit->id,
            $unit->name,
            $unit->created_at,
            $unit->update_at,
            $unit->deleted_at
        ];
    }

    protected function actionsByRow()
    {
        return [
            new EditUnit('units.edit', 'Edytuj', 'edit'),
            new SoftDeleteUnit(),
            new RestoreUnit()

        ];
    }

    public function softDelete(int $id){

        $unit = Unit::find($id);
        $unit->delete();
        $this->notification()->success(
            $title = __('translation.messages_units.successes.destroy_title'),
            $description = __('translation.messages_units.successes.destroy',['name' => $unit->name])
        );
    }

    public function restore(int $id){
        $unit = Unit::withTrashed()->find($id);
        $unit->restore();
        $this->notification()->success(
            $title = __('translation.messages_units.successes.restore_title'),
            $description = __('translation.messages_units.successes.restore',['name' => $unit->name])
        );
    }

}
