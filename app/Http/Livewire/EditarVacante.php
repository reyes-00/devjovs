<?php

namespace App\Http\Livewire;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class EditarVacante extends Component
{
    use WithFileUploads;
    public $vacante_id;
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $imagen;
    public $imagen_nueva;

    protected $rules=[
    'titulo'=>'required',
    'salario'=>'required',
    'categoria'=>'required',
    'ultimo_dia'=>'required',
    'empresa'=>'required',
    'descripcion_puesto'=>'required',
    'imagen_nueva'=> 'nullable|image|max:1024',
    
    ];


    public function mount(Vacante $vacante){
      $this->vacante_id = $vacante->id;
      $this->titulo = $vacante->titulo;
      $this->salario = $vacante->salario_id;
      $this->categoria = $vacante->categoria_id;
      $this->empresa = $vacante->empresa;
      $this->ultimo_dia = Carbon::parse($vacante->ultimo_dia)->format('Y-m-d');
      $this->descripcion_puesto = $vacante->descripcion;
      $this->imagen = $vacante->imagen;
    }

    public function editarVacante(){
        $datos = $this->validate();

        // Si hay una nueva imagen
        if($this->imagen_nueva){
            $imagen = $this->imagen_nueva->store('public/vacantes');
            $datos['imagen'] = str_replace('public/vacantes/', '', $imagen);

        }

        // Encontrar la vacante a editar
        $vacante = Vacante::find($this->vacante_id);
        // asiganar los valores

        $vacante->titulo = $datos['titulo'];
        $vacante->salario_id = $datos['salario'];
        $vacante->categoria_id = $datos['categoria'];
        $vacante->empresa = $datos['empresa'];
        $vacante->ultimo_dia = $datos['ultimo_dia'];
        $vacante->descripcion = $datos['descripcion_puesto'];
        $vacante->imagen = $datos['imagen'] ?? $vacante->imagen;
        // Guardar Vacante 
        $vacante->save();
        // Redireccionar
        session()->flash('message','La vacante se actualizo correctamente');
        return redirect()->route('vacantes.index');
    }

    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.editar-vacante',[
        'salarios' => $salarios,
        'categorias' => $categorias
        ]);
    }
}
