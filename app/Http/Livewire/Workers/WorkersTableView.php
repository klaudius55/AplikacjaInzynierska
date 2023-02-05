<?php

namespace App\Http\Livewire\Workers;


use App\Actions\Workers\EditWorker;
use App\Actions\Workers\RestoreWorker;
use App\Actions\Workers\SoftDeleteWorker;
use App\Models\Worker;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Actions\RedirectAction;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use WireUi\Traits\Actions;


class WorkersTableView extends TableView
{
    use Actions;

    public $searchBy = ['name','surname'];
    protected $paginate = 6;
    public function repository(): Builder
    {
        return Worker::query()->withTrashed();

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
            Header::title('Imię')->sortBy('name'),
            Header::title(__('translation.attributes.surname'))->sortBy('surname'),
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
    public function row(Worker $worker): array
    {
        return [
            $worker->id,
            $worker->name,
            $worker->surname,
            $worker->created_at,
            $worker->updated_at,
            $worker->deleted_at,
        ];

    }
    protected function actionsByRow()
    {
        return [
            new EditWorker('workers.edit', 'Edytuj', 'edit'),
            new SoftDeleteWorker(),
            new RestoreWorker()
        ];
       }
       public function softDelete(int $id){

        $worker = Worker::find($id);
        $worker->delete();
        $this->notification()->success(
            $title = __('translation.messages_workers.successes.destroy_title'),
            $description = __('translation.messages_workers.successes.destroy',['name' => $worker->name])
        );
       }

       public function restore(int $id){
        $worker = Worker::withTrashed()->find($id);
        $worker->restore();
        $this->notification()->success(
            $title = __('translation.messages_workers.successes.restore_title'),
            $description = __('translation.messages_workers.successes.restore',['name' => $worker->name])
        );
       }
}
