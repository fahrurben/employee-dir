<?php
/**
 * Created by PhpStorm.
 * User: fahrur
 * Date: 02/07/20
 * Time: 5:02
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'department';

    protected $fillable = [
        'name',
    ];

}