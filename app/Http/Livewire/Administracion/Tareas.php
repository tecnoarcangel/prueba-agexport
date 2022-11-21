<?php

namespace App\Http\Livewire\Administracion;

use Carbon\Carbon;
use App\Models\Tarea;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Tareas extends Component
{

    use WithPagination, WithFileUploads;
    
    public $search = '';
    public $sortField;
    public $sortDirection;

    public bool $showNotificaciones = false;
    public bool $showArchivos       = false;
    public bool $updateTarea        = false;
    public bool $createTarea        = false;
    public bool $deleteTarea        = false;
    
    public $usuario, $tarea, $selected_id, $tareas_por_vencer;

    protected $queryString = ['sortField', 'sortDirection'];

    protected $rules = [
        'tarea.titulo'         => ['required'],
        'tarea.descripcion'    => ['required'],
        'tarea.fecha_inicio'   => ['required'],
        'tarea.fecha_fin'      => ['required'],
        'tarea.archivos.*'     => ['nullable'],
        'tarea.estado'         => ['required'],
        'tarea.prioridad'      => ['required'],
        'tarea.responsable'    => ['required'],
    ];

    public function sortBy($field)
    {
        if($this->sortField === $field){
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        }else{
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function getTarea(Tarea $tarea, $tipo)
    {
        $this->tarea = $tarea->toArray();

        $this->tarea = $tarea;

        $this->selected_id = $tarea->id;

        if($tipo === 'update'){
            $this->updateTarea = true;
        }elseif($tipo === 'create'){
            $this->createTarea = true;
        }elseif($tipo === 'archivo'){
            $this->showArchivos = true;
        }else{
            $this->deleteTarea = true;
        }
    }

    public function mount()
    {
        $this->usuario = auth()->user();

        $tareas = Tarea::select();

        $intervalo = Carbon::now()->addDays(4);
        
        if( $tareas->whereDate('fecha_fin','<',$intervalo)->count() > 0 ){

            $this->showNotificaciones = true;

            $this->tareas_por_vencer = $tareas->whereDate('fecha_fin','<',$intervalo)->get();
        }

    }

    public function create(){

        $validated = $this->validate();

        if(isset($validated['tarea']['archivos'])){

            foreach($validated['tarea']['archivos'] as $key => $archivo){
                
                $filename = sha1(time().time()).$key.'.'.$archivo->getClientOriginalExtension();
                $filepath = $archivo->storeAs('documentos',$filename,'public'); 
                $validated['tarea']['archivos'][$key] = $filepath;
                
            }

        }

        if(!isset($validated['tarea'])){
            $validated['tarea'] = [];
        }

        $tarea = Tarea::create($validated['tarea'] + ['usuario_id' => $this->usuario->id]);
        
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Tarea creada exitosamente!',
            'text' => "",
        ]);

        $this->createTarea = false;
        $this->tarea       = null;

    }

    public function update()
    {
        $validated = $this->validate();

        $tarea = Tarea::findOrFail($this->selected_id);

        unset($this->tarea['created_at']);
        unset($this->tarea['updated_at']);
        unset($this->tarea['archivos']);

        $tarea->update($this->tarea->toArray());

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Tarea actualizada exitosamente!',
            'text' => "",
        ]);

        $this->updateTarea = false;
        $this->tarea       = null;

    }

    public function delete()
    {
        $tarea = Tarea::findOrFail($this->selected_id);

        $tarea->delete();

        $this->dispatchBrowserEvent('toastr:error', [
            'message' => 'Registro eliminado',
        ]);

        $this->deleteTarea = false;

        $this->tarea = null;

        $this->resetPage();
    }

    public function render()
    {
        
        return view('livewire.tareas.index',[
            'tareas' => Tarea::search('titulo',$this->search)->sortBy($this->sortField, $this->sortDirection)->paginate(10),
        ])
        ->layout('layouts.admin');
    }
}
