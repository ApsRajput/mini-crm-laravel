<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Bulk extends Model
{
    protected $table = 'employees';
    protected $fillable = [
        'first_name','last_name', 'email','phone'
    ];
}