<?php
namespace App;
use \Nord\Lumen\DynamoDb\Domain\Model\DynamoDbModel as Eloquent;

class WorkRequest extends Eloquent {
    protected $table = 'WorkRequests';
    protected $primarykey = 'WrNum';
    //public $timestamps = true;
    //will not use dates as actuall dates
    //protected $dates = ['CreateDate', 'ModifyDate', 'Date'];
    protected $fillable = [
        'Contact', 'Phone', 'CreatedBy',
        'CreationDate', 'Location', 'Date', 
        'Description','Status', 'WrNum', 
        'ModifyDate','ModifyBy', 'Requester',
        'Request','Crew','LocationDesc',
        'OpenDate','AssignDate','WoType',
        'Priority',
    ];
}