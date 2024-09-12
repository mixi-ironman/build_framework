<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    public $timestamps = false;
    protected $table = 'student';

    protected $fillable = [
        'name',
        'age',
        'photo'
    ];

}