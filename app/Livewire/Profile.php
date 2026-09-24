<?php

namespace App\Livewire;

use App\Models\Profile as ProfileModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;

class Profile extends Component
{
    public $age = '';

    public $height = '';

    public $weight = '';

    public $gender = '';

    public $activity_level = '';

    public $dietary_preference = '';

    public $goal = '';

    public function mount()
    {
        $profile = Auth::user()->profile;

        if ($profile) {
            $this->age = $profile->age;
            $this->height = $profile->height;
            $this->weight = $profile->weight;
            $this->gender = $profile->gender;
            $this->activity_level = $profile->activity_level;
            $this->dietary_preference = $profile->dietary_preference;
            $this->goal = $profile->goal;
        }
    }

    public function save()
{
    $validated = $this->validate([
        'age' => 'required|integer|min:13|max:120',
        'height' => 'required|numeric|min:50|max:250',
        'weight' => 'required|numeric|min:20|max:300',
        'gender' => 'required|string',
        'activity_level' => 'required|string',
        'dietary_preference' => 'required|string',
        'goal' => 'required|string',
    ]);

    /** @var User $user */
    $user = Auth::user();

    $user->profile()->updateOrCreate(
        ['user_id' => $user->id],
        $validated
    );

    session()->flash(
        'success',
        'Your nutrition profile has been saved successfully!'
    );
}

    public function render()
    {
        return view('livewire.profile');
    }
}