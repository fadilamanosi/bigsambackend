<?php

namespace App\Http\Livewire;

use App\Models\Car;
use App\Models\Destination;
use App\Traits\LiverwireHelper;
use Livewire\Component;
use \App\Models\Transit as TransitDB;

class Transit extends Component
{
    use LiverwireHelper;
    public $car_id;
    public $from_id;
    public $to_id;
    public $amount;
    public $departure_time;
    
    // Listing Variables
    public $cars;
    public $cities;


    // Edit variables
    public $editDB = [];
    public $editData = [];
    public $isEdit = false;
    public function render()
    {
        return view('livewire.transit',
        [
            'transits' => TransitDB::with(['car', 'from', 'to'])->paginate()
        ]);
    }

    protected $rules = [
        'car_id'  => 'required|exists:cars,id',
        'from_id' => 'required|exists:destinations,id',
        'to_id'   => 'required|exists:destinations,id',
        'amount'  => 'required|integer',
        'departure_time' => 'required|date'
    ];

    public function create(){
        $this->validate();
       
        try{
            TransitDB::create([
                'car_id'  => $this->car_id,
                'from_id' => $this->from_id,
                'to_id'   => $this->to_id,
                'amount'  => $this->amount,
                'departure_time' => $this->departure_time
            ]);
            $this->alert('created successfully');
        }catch(\Exception $e){
            $this->alert($e->getMessage(), true);
        }
    }

    public function remove($id){
        TransitDB::where('id', $id )->delete();
        $this->alert('Deleted successfully');
    }
    public function edit($id){

        $data = TransitDB::find($id);

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

            // $validate  = TransitDB::where('state', $this->editData['state'])
            // ->where('city', $this->editData['city'] )
            // ->where('id', '!=', $this->editDB->id )
            // ->exists();

            // if($validate) { 
            //     $this->alert('state and city already exist', true);
            //     return;
            // };

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
        $this->cars   =  Car::all();
        $this->cities =  Destination::all();
    }


}
