<?php

namespace App\Actions\Projects;

use LaravelViews\Actions\Action;
use LaravelViews\Actions\RedirectAction;
use LaravelViews\Views\View;

class EditProject extends RedirectAction
{
    public function __construct(string $to, string $title, string $icon)
    {
        parent::__construct($to, $title, $icon);
    }

    public function renderIf($model, View $view)
    {
        return $model-> deleted_at === null;
    }
}
