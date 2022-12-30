<?php

namespace App\Http\Livewire\Workers;


use App\Actions\Workers\EditWorker;
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
   // protected $model = Worker::class;
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
            Header::title('Name')->sortBy('name'),
            Header::title('Surname')->sortBy('surname'),
            Header::title('Created')->sortBy('created_at'),
            Header::title('Modified')->sortBy('updated_at'),
            Header::title('Deleted')->sortBy('deleted_at'),
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
            // Will redirect to `route('user', $user->id)`
            new RedirectAction('workers.edit', 'Edytuj', 'edit'),
            new SoftDeleteWorker()
        ];
       }
       public function softDelete(int $id){

        $worker = Worker::find($id);
        $worker->delete();

       }
}
