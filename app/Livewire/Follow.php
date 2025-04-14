<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;
class Follow extends Component
{
   
        public $userId;
        public $isFollow = false;
        public $followCount = 0;
    
        public function mount($userId)
        {
            $this->userId = $userId;
            $this->isFollow = Auth::user()->isFollowing($userId);
            $this->followCount = User::find($userId)->followers()->count();
        }
    
        public function toggleFollow()
        {
            $authUser = Auth::user();
            $user = User::find($this->userId);
    
            if (!$authUser || !$user || $authUser->id === $user->id) {
                return;
            }
    
            if ($authUser->isFollowing($user->id)) {
                $authUser->following()->detach($user->id);
                $this->isFollow = false;
                $this->followCount--;
            } else {
                $authUser->following()->attach($user->id);
                $this->isFollow = true;
                $this->followCount++;
            }
        }
    
        public function render()
        {
            return view('livewire.follow');
        }
    
}
