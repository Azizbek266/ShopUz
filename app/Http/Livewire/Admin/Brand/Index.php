<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Str;
class Index extends Component
{
    public $name, $slug, $status;
    public function rules(){
        return[
            'name' => 'required|sring',
            'slug' => 'required|sring',
            'status' => 'nullable'
        ];
    }
    public function resetInput(){
        $this->name = NULL;
        $this->status = NULL;
        $this->slug = NULL;
    }
    public function storeBrand(){
        $validatedData = $this->validate();
        Brand::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1':'0',
        ]);
        session()->flash('message','Brand added successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }
    public function render()
    {
        return view('livewire.admin.brand.index');
    }
}
