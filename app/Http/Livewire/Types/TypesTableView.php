<?php

namespace App\Http\Livewire\Types;

use App\Actions\Types\RestoreType;
use App\Actions\Types\SoftDeleteType;
use App\Models\Type;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Actions\RedirectAction;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use WireUi\Traits\Actions;

class TypesTableView extends TableView
{
    use Actions;
    /**
     * Sets a model class to get the initial data
     */
    public $searchBy = ['name','surname'];
    protected $paginate = 10;
    public function repository(): Builder
    {
        return Type::query()->withTrashed();

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
    public function row(Type $type): array
    {
        return [
            $type->id,
            $type->name,
            $type->created_at,
            $type->update_at,
            $type->deleted_at
        ];
    }
    protected function actionsByRow()
    {
        return [
            new RedirectAction('types.edit', 'Edytuj', 'edit'),
            new SoftDeleteType(),
            new RestoreType()
        ];
    }
    public function softDelete(int $id){

        $type = Type::find($id);
        $type->delete();
        $this->notification()->success(
            $title = __('translation.messages_types.successes.destroy_title'),
            $description = __('translation.messages_types.successes.destroy',['name' => $type->name])
        );
    }

    public function restore(int $id){
        $type = Type::withTrashed()->find($id);
        $type->restore();
        $this->notification()->success(
            $title = __('translation.messages_types.successes.restore_title'),
            $description = __('translation.messages_types.successes.restore',['name' => $type->name])
        );
    }
}
