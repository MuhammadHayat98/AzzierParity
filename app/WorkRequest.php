<?php
namespace App;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class WorkRequest extends Eloquent {
    protected $collection = 'WorkRequest';
    protected $primaryKey = 'WrNum';
    public $timestamps = true;
    protected $dates = ['CreateDate', 'ModifyDate', 'Date'];
    protected $fillable = [
        'Contact', 'Phone', 'CreatedBy',
        'CreateDate', 'Location', 'Date', 
        'Description','Status', 'WrNum'
    ];
    

}