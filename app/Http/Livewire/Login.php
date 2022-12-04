<?php

namespace App\Http\Livewire;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Livewire\Component;

class Login extends Component
{
    use AuthenticatesUsers;

    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|string'
    ];
    public function render()
    {
        return view('livewire.login');
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function loginForm(){
        $this->validate();


        $this->resetForm();
        session()->flash('message', 'login successful');
    }

    private function resetForm(){
        $this->email = '';
        $this->password = '';
    }
}
