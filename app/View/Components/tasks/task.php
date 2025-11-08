<?php

namespace App\View\Components\tasks;

use App\Models\Task as ModelsTask;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Task extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public ModelsTask $task)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tasks.task');
    }
}
