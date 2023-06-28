<?php

namespace App\Traits;


trait LiverwireHelper{


    public $alert = false;
    public $error = false;
    public function alert($message, $error = false){
        $this->alert = true; 
        $this->error = $error;

        if($error){
            session()->flash('error', $message);
        }else{
            session()->flash('success', $message);
        }
    }

    public function closeModal()
    {
        $this->alert = false;
    }


}