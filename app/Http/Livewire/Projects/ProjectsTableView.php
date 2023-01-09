<?php

namespace App\Http\Livewire\Projects;

use App\Models\Project;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;

class ProjectsTableView extends TableView
{
    public $searchBy = ['name'];
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Project::class;

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
            $project->name
        ];
    }
}
