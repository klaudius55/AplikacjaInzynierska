<?php

namespace App\Http\Livewire\Projects;

use App\Actions\Projects\EditProject;
use App\Actions\Projects\RestoreProject;
use App\Actions\Projects\SoftDeleteProject;
use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Actions\RedirectAction;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use WireUi\Traits\Actions;

class ProjectsTableView extends TableView
{
    use Actions;
    public $searchBy = ['name'];
    protected $paginate = 10;
    public function repository(): Builder
    {
        return Project::query()->withTrashed();

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
    public function row(Project $project): array
    {
        return [
            $project->id,
            $project->name,
            $project->created_at,
            $project->updated_at,
            $project->deleted_at
        ];
    }


    protected function actionsByRow()
    {
        return [
            new EditProject('projects.edit', 'Edytuj', 'edit'),
            new SoftDeleteProject(),
            new RestoreProject()

        ];
    }
    public function softDelete(int $id){

        $project =Project::find($id);
        $project->delete();
        $this->notification()->success(
            $title = __('translation.messages_projects.successes.destroy_title'),
            $description = __('translation.messages_projects.successes.destroy',['name' => $project->name])
        );
    }

    public function restore(int $id){
        $project = Project::withTrashed()->find($id);
        $project->restore();
        $this->notification()->success(
            $title = __('translation.messages_projects.successes.restore_title'),
            $description = __('translation.messages_projects.successes.restore',['name' => $project->name])
        );
    }
}
