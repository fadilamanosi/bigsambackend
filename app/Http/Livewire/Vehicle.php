<?php

namespace App\Http\Livewire;

use App\Models\Car;
use Livewire\Component;
use App\Traits\LiverwireHelper;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

class Vehicle extends Component
{
    use LiverwireHelper;
    public $name;
    public $seats;
    public $plate_number;
    

    // Edit variables
    public $editDB = [];
    public $editData = [];
    public $isEdit = false;

    protected $rules = [
        'name'  => 'required|string|unique:cars,name',
        'plate_number' => 'required|unique:cars,plate_number',
        'seats' => 'required|integer',
    ];

    public function create(){
        $this->validate();
        
        try{
            $vehicle = Car::create([
                'name'  => $this->name,
                'seats' => $this->seats,
                'plate_number' => $this->plate_number
            ]);
            $this->alert('created successfully');
        }catch(\Exception $e){
            $this->alert($e->getMessage(), true);
        }
    }

    public function remove($id){
        Car::where('id', $id )->delete();
        $this->alert('Deleted successfully');
    }

    public function edit($id){

        $data = car::find($id);

        if(!$data){
            $this->alert('Not found', true);
            return;
        }
        $this->editDB   = $data;
        $this->editData = $data->toArray();
        $this->isEdit   = true;
    }

    public function updateEdit(){

        $this->validate([

            'editData.name'  => [
                'string',
                Rule::unique('cars', 'name')->ignore($this->editDB->id)
            ],

            'editData.plate_number' => [
                'string',
                Rule::unique('cars', 'plate_number')->ignore($this->editDB->id)
            ],
            'editData.seats' => 'integer',
        ]
        );

        try{
            $this->editDB->update($this->editData); 

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

    public function mount(){
        
    }
    public function render()
    {
        $vehicles = Car::paginate();

        return view('livewire.vehicle', [
            'vehicles' => $vehicles
        ]);
    }
}
