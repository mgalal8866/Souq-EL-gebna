<?php

namespace App\Livewire\Dashboard\Activity;

use App\Models\activity;
use Livewire\Component;

class ViewActivity extends Component
{
    public $activitys;
    public function render()
    {
        $this->activitys=activity::get();
        return view('dashboard.activity.view-activity');
    }
}
