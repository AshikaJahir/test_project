<?php

namespace TestProject;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //table name
    protected $table = 'posts';
    
    //Primary Key
    public $primaryKey = 'id';
    
    //Timestamps
    public $timestamps = true; //if it is set to false , it will not include timetsmaps in db
}
