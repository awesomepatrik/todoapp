{{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
<div class="container px-3 max-w-2xl mx-auto mb-24">
    <!-- todo wrapper -->
    <div class="bg-white rounded shadow px-4 py-4" x-data="app()">

        <template x-if="!isEdit">
            <div class="flex items-center text-sm mt-2" >
                <button @click="$refs.addTask.focus()">
                    <svg class="w-3 h-3 mr-3 focus:outline-none" fill="none" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M12 4v16m8-8H4"></path>
                    </svg>
                </button>
                <span>Add task</span>
            </div>
        </template>

        <template x-if="isEdit">
            <div class="flex items-center text-sm mt-2">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                         class=" w-4 h-4 text-gray-600 fill-current"
                         viewBox="0 0 48 48"
                         style=" fill:#000000;">
                        <path d="M 36 5.0097656 C 34.205301 5.0097656 32.410791 5.6901377 31.050781 7.0507812 L 8.9160156 29.183594 C 8.4960384 29.603571 8.1884588 30.12585 8.0253906 30.699219 L 5.0585938 41.087891 A 1.50015 1.50015 0 0 0 6.9121094 42.941406 L 17.302734 39.974609 A 1.50015 1.50015 0 0 0 17.304688 39.972656 C 17.874212 39.808939 18.39521 39.50518 18.816406 39.083984 L 40.949219 16.949219 C 43.670344 14.228094 43.670344 9.7719064 40.949219 7.0507812 C 39.589209 5.6901377 37.794699 5.0097656 36 5.0097656 z M 36 7.9921875 C 37.020801 7.9921875 38.040182 8.3855186 38.826172 9.171875 A 1.50015 1.50015 0 0 0 38.828125 9.171875 C 40.403 10.74675 40.403 13.25325 38.828125 14.828125 L 36.888672 16.767578 L 31.232422 11.111328 L 33.171875 9.171875 C 33.957865 8.3855186 34.979199 7.9921875 36 7.9921875 z M 29.111328 13.232422 L 34.767578 18.888672 L 16.693359 36.962891 C 16.634729 37.021121 16.560472 37.065723 16.476562 37.089844 L 8.6835938 39.316406 L 10.910156 31.521484 A 1.50015 1.50015 0 0 0 10.910156 31.519531 C 10.933086 31.438901 10.975086 31.366709 11.037109 31.304688 L 29.111328 13.232422 z"></path>
                    </svg>
                </button>
                <span class="ml-2">Edit task</span>
            </div>
        </template>

        <input type="text" placeholder="what is your plan for today"
               class=" capitalize rounded-sm shadow-sm px-4 py-2 border border-gray-200 w-full mt-4"
               wire:model="task"
               @keydown.enter="$wire.saveTask()">

        <template x-if="isEdit">
            <div class="flex justify-end items-center" >
                <button class="bg-red-400 text-white p-2 my-3" @click="cancelUpdate">Cancel</button>
                <button class="bg-green-400 text-white p-2 my-3 ml-2" @click="updateTask">Save</button>
            </div>
        </template>


        <!-- todo list -->
        <ul class="todo-list mt-4">

            <template x-for="todo in todos" :key="todo.id" x-if="!isEdit">
                <li class="flex justify-between items-center mt-3" x-show="todo.task !== ''">
                    <div class="flex items-center" :class="{'line-through' : todo.status}">
                        <input type="checkbox" name="" id="" x-model="todo.status" :value="todo.id"
                               @change="$wire.markTask(todo.id)">
                        <div class="capitalize ml-3 text-sm font-semibold" x-text="todo.task"></div>
                    </div>
                    <div>
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 class=" w-4 h-4 text-gray-600 fill-current"
                                 @click="editTask(todo.id)"
                                 viewBox="0 0 48 48"
                                 style=" fill:#000000;">
                                <path d="M 36 5.0097656 C 34.205301 5.0097656 32.410791 5.6901377 31.050781 7.0507812 L 8.9160156 29.183594 C 8.4960384 29.603571 8.1884588 30.12585 8.0253906 30.699219 L 5.0585938 41.087891 A 1.50015 1.50015 0 0 0 6.9121094 42.941406 L 17.302734 39.974609 A 1.50015 1.50015 0 0 0 17.304688 39.972656 C 17.874212 39.808939 18.39521 39.50518 18.816406 39.083984 L 40.949219 16.949219 C 43.670344 14.228094 43.670344 9.7719064 40.949219 7.0507812 C 39.589209 5.6901377 37.794699 5.0097656 36 5.0097656 z M 36 7.9921875 C 37.020801 7.9921875 38.040182 8.3855186 38.826172 9.171875 A 1.50015 1.50015 0 0 0 38.828125 9.171875 C 40.403 10.74675 40.403 13.25325 38.828125 14.828125 L 36.888672 16.767578 L 31.232422 11.111328 L 33.171875 9.171875 C 33.957865 8.3855186 34.979199 7.9921875 36 7.9921875 z M 29.111328 13.232422 L 34.767578 18.888672 L 16.693359 36.962891 C 16.634729 37.021121 16.560472 37.065723 16.476562 37.089844 L 8.6835938 39.316406 L 10.910156 31.521484 A 1.50015 1.50015 0 0 0 10.910156 31.519531 C 10.933086 31.438901 10.975086 31.366709 11.037109 31.304688 L 29.111328 13.232422 z"></path>
                            </svg>
                        </button>
                        <button>
                            <svg class=" w-4 h-4 text-gray-600 fill-current"
                                 @click="$wire.removeTask(todo.id)"
                                 fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </li>
            </template>

        </ul>

    </div>
</div>

<script>
    function app() {
        return {
            todos: @entangle('tasks'),
            id:null,
            task: @entangle('task'),
            isEdit: false,
            editTask(id){
                this.isEdit = true;
                this.id = id;
                this.task = this.todos.find(x => x.id === id).task;
            },
            updateTask(){
                this.$wire.saveTask(this.id);
                this.task = '';
                this.isEdit = false;
            },
            cancelUpdate(){
                this.task ='';
                this.isEdit = false;
            }
        };
    }

</script>



