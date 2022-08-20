<?php

namespace App\Http\Livewire;

use App\Models\Salario;
use App\Models\Categoria;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion_puesto;
    public $imagen;

    use WithFileUploads;

    protected $rules=[
        'titulo'=>'required',
        'salario'=>'required',
        'categoria'=>'required',
        'ultimo_dia'=>'required',
        'empresa'=>'required',
        'descripcion_puesto'=>'required',
        'imagen'=>'required|image|max:1024',
    ];

    public function submit(){

        $datos = $this->validate();

        $imagen = $this->imagen->store('public/vacantes');
        $nombreImagen = str_replace('public/vacantes/', '', $imagen);

        // Guardar datos en la base 
  
        Vacante::create([
              'titulo'=> $datos['titulo'],
              'salario_id'=> $datos['salario'],
              'categoria_id'=>$datos['categoria'],
              'ultimo_dia'=>$datos['ultimo_dia'],
              'empresa'=>$datos['empresa'],
              'descripcion'=>$datos['descripcion_puesto'],
              'imagen'=>$nombreImagen,
              'user_id'=>auth()->user()->id,
        ]);

        session()->flash('message','La vacante se agrego correctamente');
        return redirect()->route('vacantes.index');


    }
    public function render()
    {

        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.crear-vacante',[
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
