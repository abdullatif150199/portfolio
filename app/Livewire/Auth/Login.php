<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate('required|email')]
    public string $email = '';

    #[Validate('required|string|min:6')]
    public string $password = '';

    public bool $remember = false;

    public function authenticate()
    {
        $this->validate();

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            $this->addError('email', 'Email atau password salah.');
            return;
        }

        if (! Auth::user()->isAdmin()) {
            Auth::logout();
            $this->addError('email', 'Hanya admin yang diizinkan masuk.');
            return;
        }

        session()->regenerate();
        return $this->redirectIntended(route('admin.dashboard'), navigate: true);
    }

    #[Layout('layouts.auth')]
    #[Title('Login — Admin')]
    public function render()
    {
        return view('livewire.auth.login');
    }
}
