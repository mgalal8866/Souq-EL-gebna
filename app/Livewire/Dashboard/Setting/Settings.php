<?php

namespace App\Livewire\Dashboard\Setting;

use App\Models\setting;
use Livewire\Component;
use Livewire\WithFileUploads;

class Settings extends Component
{
    use WithFileUploads;
    public $splashnew,$saleactive, $maintenance, $logonew, $name, $logo, $city, $splash, $phone, $phone1, $setting, $policy;

    public function mount()
    {
        $setting =   setting::find(1);
        $this->setting = $setting;
        $this->name   = $setting->name;
        $this->maintenance   = $setting->maintenance;
        $this->logo   = $setting->urllogo;
        $this->splash = $setting->urlsplash;
        $this->phone1 = $setting->phone1;
        $this->phone  = $setting->phone;
        $this->policy = $setting->policy;
        $this->saleactive = $setting->active_salse ==1?true:false;
    }
    public function saveslider()
    {

        $this->setting->name        = $this->name;
        $this->setting->maintenance = $this->maintenance;
        $this->setting->policy      = $this->policy;
        if ($this->logonew) {
            $this->setting->logo    = $this->logonew != null ? uploadimages('images',$this->logonew) : null;
        }
        if ($this->splashnew) {
            $this->setting->splash  = $this->splashnew != null ?  uploadimages('images', $this->splashnew) : null;
        }
        $this->setting->phone1 = $this->phone1;
        $this->setting->phone  = $this->phone;
        $this->setting->active_salse = $this->saleactive  == true ?1:0;
        $this->setting->save();
        $this->dispatch('swal', message: 'تم التعديل بنجاح');

    }
    public function render()
    {

        return view('dashboard.setting.settings');
    }
}
