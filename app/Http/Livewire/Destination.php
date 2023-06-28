<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Traits\LiverwireHelper;
use Illuminate\Validation\Rule;
use App\Models\Destination as DestinationDB;

class Destination extends Component
{

    use LiverwireHelper;

    public $state;
    public $city;


    // Edit variables
    public $editDB = [];
    public $editData = [];
    public $isEdit = false;
    
    protected $rules = [
        'state'  => 'required|string',
        'city' => 'required|string',
    ];

    public function create(){
        $this->validate();
        
        if(DestinationDB::where('state', $this->state)
        ->where('city', $this->city )
        ->exists()) return $this->alert('state and city already exist', true);

        try{
            DestinationDB::create([
                'state'  => Str::camel($this->state),
                'city'   => Str::camel($this->city)
            ]);
            $this->alert('created successfully');
        }catch(\Exception $e){
            $this->alert($e->getMessage(), true);
        }
    }

    public function remove($id){
        DestinationDB::where('id', $id )->delete();
        $this->alert('Deleted successfully');
    }
    public function edit($id){

        $data = DestinationDB::find($id);

        if(!$data){
            $this->alert('Not found', true);
            return;
        }

        $this->editDB   = $data;
        $this->editData = $data->toArray();
        $this->isEdit   = true;
    }


    public function updateEdit(){
        try{

            $validate  = DestinationDB::where('state', $this->editData['state'])
            ->where('city', $this->editData['city'] )
            ->where('id', '!=', $this->editDB->id )
            ->exists();

            if($validate) { 
                $this->alert('state and city already exist', true);
                return;
            };

            $this->editDB->update(collect($this->editData)->filter(function($v){ return Str::camel($v); })->toArray()); 
            $this->isEdit = false;
            $this->alert('updated successfully');
        }catch(\Exception $e){
            $this->isEdit = false;
            $this->alert($e->getMessage(), true);
        }
    }
    public function closeEdit(){
        $this->isEdit = false;
    }

    public function render()
    {
        $destinations = DestinationDB::paginate();

        return view('livewire.destination', [
            'destinations' => $destinations
        ]);
    }
}
