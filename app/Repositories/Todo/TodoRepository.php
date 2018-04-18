<?php
namespace TestProject\Repositories\Todo;

/**
 * Description of TodoRepository
 *
 * @author intelindia
 */
interface TodoRepository {
    public function getAll();
    
    public function getById($id);
    
    public function create(array $attributes);
    
    public function update(array $attributes);
    
    public function  delete($id);
}
