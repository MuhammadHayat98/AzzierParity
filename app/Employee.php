<?php

namespace App;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Employee extends Eloquent {
    protected $collection = 'Employee';
    protected $primaryKey = 'Empid';
    public $timestamps = true;

    protected $dates = ['HireDate'];
    protected $fillable = [
        'Empid', 'FirstName', 'LastName', 'HireDate',
        'Craft', 'Rate', 'Location'
    ];

    

    

}