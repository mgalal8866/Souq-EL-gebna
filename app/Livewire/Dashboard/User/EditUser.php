<?php

namespace App\Livewire\Dashboard\User;

use App\Models\activity;
use App\Models\city;
use App\Models\question;
use App\Models\region;
use App\Models\User;
use Livewire\Component;

class EditUser extends Component
{
    public $user, $phone, $phone1, $name, $storename, $lat, $long, $address, $citys, $regions, $city_id,
    $region_id, $featured, $active, $sales_active, $activity_id,
    $activitys, $rating_view,
     $questions, $question1, $question2, $answer1, $answer2;
    public function mount($id)
    {
        $this->user     = User::find($id);
        $this->phone    = $this->user->phone;
        $this->phone1   = $this->user->phone1;
        $this->name       = $this->user->user_name;
        $this->storename  = $this->user->store_name;
        $this->lat        = $this->user->lat;
        $this->long       = $this->user->long;
        $this->address    = $this->user->address;
        $this->city_id    = $this->user->city_id;
        $this->region_id  = $this->user->region_id;
        $this->featured   = $this->user->featured == 0 ? false : true;
        $this->sales_active  = $this->user->sales_active == 0 ? false : true;
        $this->rating_view  = $this->user->rating_view == 0 ? false : true;
        $this->active       = $this->user->active == 0 ? false : true;
        $this->activity_id = $this->user->activity_id;
        $this->question1   = $this->user->question1_id;
        $this->question2   = $this->user->question2_id;
        $this->answer1     = $this->user->answer1;
        $this->answer2     = $this->user->answer2;
        $this->questions   = question::get();
        $this->activitys   = activity::get();
        $this->citys       = city::get();
        $this->regions     = region::where('id', $this->user->region_id ?? 1)->get();
    }
    public function saveuser()
    {
        // $this->user     = User::find($id);
        $this->user->phone = $this->phone;
        $this->user->phone1 = $this->phone1;
        $this->user->user_name = $this->name;
        $this->user->store_name = $this->storename;
        $this->user->lat = $this->lat;
        $this->user->long = $this->long;
        $this->user->address = $this->address;
        $this->user->city_id = $this->city_id;
        $this->user->region_id = $this->region_id;
        $this->user->featured = $this->featured  == 0 ? false : true;
        $this->user->sales_active = $this->sales_active == 0 ? false : true;
        $this->user->active = $this->active      == 0 ? false : true;
         $this->user->rating_view = $this->rating_view  == 0 ? false : true;
        $this->user->activity_id = $this->activity_id;
        $this->user->question1_id = $this->question1;
        $this->user->question2_id = $this->question2;
        $this->user->answer1 = $this->answer1;
        $this->user->answer2 = $this->answer2;
        $this->user->save();
        $this->dispatch('swal', message: 'تم التعديل بنجاح');

    }
    public function render()
    {
        return view('dashboard.user.edit-user');
    }
}
