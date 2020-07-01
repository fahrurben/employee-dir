<?php
/**
 * Created by PhpStorm.
 * User: fahrur
 * Date: 02/07/20
 * Time: 5:03
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';

    protected $fillable = [
        'employee_id',
        'firstname',
        'lastname',
        'fullname',
        'birthday',
        'address',
        'phone',
        'mobile',
        'email',
        'position',
        'department_id',
        'status',
        'photo',
    ];

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }
}