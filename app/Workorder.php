<?php

namespace App;
use \Nord\Lumen\DynamoDb\Domain\Model\DynamoDbModel as Eloquent;

class WorkOrder extends Eloquent {
    protected $table = 'test';
    protected $primaryKey = 'WoNum';
    //public $timestamps = true;
    //protected $dates = ['OpenDate', 'ModifyDate'];
    protected $fillable = [
        'WoNum','Priority', 
        'OpenDate', 'ContactPhone', 'Craft',
        'Crew', 'Location','LocationDesc', 
        'Note2', 'Request','Status', 
        'Room', 'WoType'

    ];

    

    

}