<?php
namespace App;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class WorkRequest extends Eloquent {
    protected $collection = 'WorkRequest';
    protected $primaryKey = 'WrNum';

    protected $fillable = [
        'Contact', 'Phone', 'CreatedBy',
        'CreateDate', 'Location', 'Description',
        'WrNum'
    ];
    

}