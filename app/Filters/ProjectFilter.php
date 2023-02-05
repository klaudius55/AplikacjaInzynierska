<?php

namespace App\Filters;

use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\Filter;

class ProjectFilter extends Filter
{
    public $title =  "Filtrować po projektach";
    /**
     * Modify the current query when the filter is used
     *
     * @param Builder $query Current query
     * @param $value Value selected by the user
     * @return Builder Query modified
     */

    public function apply(Builder $query, $value, $request): Builder
    {
        if($value==1){
            return $query->whereNotNull('project_id');

        }
        return $query->whereNull('project_id');
    }

    /**
     * Defines the title and value for each option
     *
     * @return Array associative array with the title and values
     */
    public function options(): Array
    {
        return [
            'Tak' => 1,
            'Nie'=>0
        ];
    }
}
