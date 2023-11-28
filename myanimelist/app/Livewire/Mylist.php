<?php

namespace App\Livewire;

use Livewire\Component;

class Mylist extends Component
{
    public $panjangmanuk = '20cm';
    public $email = 'nafan@example.com';
    public $nama = 'Nafan';

    public function store()
    {

    }
    public function render()
    {

        return view('livewire.mylist');
    }
}
