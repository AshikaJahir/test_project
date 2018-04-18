<?php
namespace TestProject\Repositories\Todo;




/**
 * Description of EloquentTodo
 *
 * @author intelindia
 */
class EloquentTodo implements TodoRepository
{
    protected $model;
    public function __construct(Todo $model) {
        $this->model= $model;
    }
    
    public function create(array $attributes) {
        return $this->model->create($attributes);
    }

    public function delete($id) {
        $this->model->getById($id)->delete();
        return true;
    }

    public function getAll() {
        return $this->model->all();
    }

    public function getById($id) {
        return $this->model->findById($id); 
    }

    public function update(array $attributes) {
        $todo = $this->model->findOrFail($id);
        $todo->update($attributes);
        return $todo;
    }

}
