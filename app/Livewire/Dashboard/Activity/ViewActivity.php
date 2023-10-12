<?php

namespace App\Livewire\Dashboard\Activity;

use App\Models\activity;
use Livewire\Component;

class ViewActivity extends Component
{
    public $activitys;
    public function delete($activityid)
    {
        $delactivityid = activity::find($activityid);
        if ($delactivityid->user->count() > 0) {
            $this->dispatch('swal', message: '  لايمكن حذف النشاط يوجد متاجر مرتبطه بة');
        } else {
            $delactivityid->delete();
            $this->dispatch('swal', message: 'تم الحذف بنجاح');
        }
    }
    public function render()
    {
        $this->activitys= activity::withCount('user')->get();
        return view('dashboard.activity.view-activity');
    }
}
