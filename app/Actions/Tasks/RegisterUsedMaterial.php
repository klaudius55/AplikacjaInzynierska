<?php

namespace App\Actions\Tasks;

use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class RegisterUsedMaterial extends Action
{
    /**
     * Any title you want to be displayed
     * @var String
     * */
    public $title = "Add material";

    /**
     * This should be a valid Feather icon string
     * @var String
     */
    public $icon = "plus";

    /**
     * Execute the action when the user clicked on the button
     *
     * @param $model Model object of the list where the user has clicked
     * @param $view Current view where the action was executed from
     */
    public function handle($model, View $view)
    {

    }
        public function renderIf($model, View $view)
    {
        return $model-> deleted_at === null;
    }
}
