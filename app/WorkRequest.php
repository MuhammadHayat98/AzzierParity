<?php
namespace App;
use \Nord\Lumen\DynamoDb\Domain\Model\DynamoDbModel as Eloquent;

class WorkRequest extends Eloquent {
    protected $table = 'WorkRequestTest';
    protected $primarykey = 'WrNum';
    //public $timestamps = true;
    //will not use dates as actuall dates
    //protected $dates = ['CreateDate', 'ModifyDate', 'Date'];
    protected $fillable = [
        'Contact', 'Phone', 'CreatedBy',
        'CreateDate', 'Location', 'Date', 
        'Description','Status', 'WrNum', 'ModifyDate','ModifyBy'
    ];
}