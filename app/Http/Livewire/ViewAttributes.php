<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class ViewAttributes extends ModalComponent
{
    public $title;
    public $weight;
    public $height;
    public $length;
    public $width;

    public function mount($title,$weight,$height,$length,$width)
    {    
        $this->title = $title;
        $this->weight = $weight;
        $this->height = $height;
        $this->length = $length;
        $this->width = $width;
    }
     public function render()
    {
        return view('livewire.view-attributes');
    }

}
