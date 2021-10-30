<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TodoList extends Component
{

    public $tasks;
    public  $task;

    public $errorFlag, $errorMessage;

    public function render()
    {
        $this->getTasks();
        return view('livewire.todo-list');
    }

    private function getTasks(){
        $tasks = Task::where('user_id', Auth::user()->id)->get();
        $this->tasks = $tasks->toArray();
    }

    private function resetField(){
        $this->task = '';
    }

    public function saveTask($id= null){

        Task::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'user_id' => Auth::user()->id,
                'task' => $this->task,
                'status' => 0
            ]
        );

        $this->getTasks();
        $this->resetField();

    }

    public function markTask($id){
        $task = Task::where('id',$id)->first();

        if(isset($task)){
            $this->errorFlag= false;
            $task->status = $task->status == 1 ? 0 : 1;
            $task->save();
        }
        $this->getTasks();
    }

    public function removeTask($id){
        Task::where('id', $id)->delete();
        $this->getTasks();
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
