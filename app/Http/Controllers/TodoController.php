<?php

namespace TestProject\Http\Controllers;

use Illuminate\Http\Request;
use TestProject\Repositories\Todo\TodoRepository;

class TodoController extends Controller
{
    protected $todo;
    public function __construct(TodoRepository $todo) {
        $this->todo = $todo;
    }
    
    public function getAllTodos() {
        return $this->todo->getAll();
    }
}
