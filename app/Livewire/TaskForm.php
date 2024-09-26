<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;

class TaskForm extends Component
{
    public $title;
    public $description;
    public $due_date;
    public $status = 'Pending';

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'due_date' => 'required|date',
        'status' => 'required',
        
    ];

    public function submit()
    {
        $this->validate();

        Task::create([
            'title' => $this->title,
            'description' => $this->description,
            'due_date' => $this->due_date,
            'status' => $this->status,
        ]);

        session()->flash('message', 'Detyra u krijua me sukses');

        return redirect()->route('tasks.index');
    }
}
