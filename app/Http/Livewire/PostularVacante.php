<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Notifications\Notificacion;


class PostularVacante extends Component
{
    use WithFileUploads;
    
    public $cv;
    public $vacante;

    protected $rules = [
        'cv'=>'required|mimes:pdf',
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }

    public function postularme()
    {
        $datos = $this->validate();
        // Guardar en el disco
        $cv = $this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/','',$cv);

        // crear candidato a la vacante
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv'=> $datos['cv']
        ]);
        // crear notificacion y enviar email
        $this->vacante->reclutador->notify(new Notificacion($this->vacante->id,$this->vacante->titulo,auth()->user()->id));

        session()->flash('message','Tu cv se mando correctamente');

        return redirect()->back();
        // public function


    }
    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
