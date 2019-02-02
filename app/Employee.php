<?php

namespace App;
use \Nord\Lumen\DynamoDb\Domain\Model\DynamoDbModel as Eloquent;

class Employee extends Eloquent {
    protected $table = 'EmployeeTest';
    protected $primaryKey = 'Empid';
    //public $timestamps = true;

    //protected $dates = ['HireDate'];
    protected $fillable = [
        'Empid', 'FirstName', 'LastName', 'HireDate',
        'Craft', 'Rate', 'Location', 'ModifyDate' , 'ModifyBy'
    ];

    

    

}