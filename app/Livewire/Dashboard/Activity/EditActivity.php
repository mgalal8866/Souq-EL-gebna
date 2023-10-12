<?php

namespace App\Livewire\Dashboard\Activity;

use Livewire\Component;
use App\Models\activity;
use Livewire\WithFileUploads;

class EditActivity extends Component
{
    use WithFileUploads;
    public $id,$imagenew, $image,$name, $activity;

    public function mount($id = null)
    {
        $this->id = $id;
        $this->activity = activity::find($id);
        $this->name     = $this->activity->name;
        $this->image    = $this->activity->urlimg;
    }
    public function saveactivity()
    {
        $activity = activity::find($this->id);
        $activity->name = $this->name;
        if ($this->imagenew) {
            $activity->img      = $this->imagenew != null ? uploadimages('activity', $this->imagenew) : $activity->img;
        }
        $activity->save();
        $this->dispatch('swal', message: 'تم التعديل بنجاح');
        $this->redirect('/activitys');
    }
    public function render()
    {
        return view('dashboard.activity.edit-activity');
    }
}
