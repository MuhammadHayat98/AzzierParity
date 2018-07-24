<?php

namespace App;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class WorkOrder extends Eloquent {
    protected $collection = 'WorkOrder';
    protected $primaryKey = 'WoNum';
    public $timestamps = true;
    protected $dates = ['OpenDate', 'ModifyDate'];
    protected $fillable = [
        'WoNum', 'WoNumStr','Priority', 
        'OpenDate', 'ContactPhone', 'Craft',
        'Crew', 'Location','LocationDesc', 
        'Note2', 'Request','Status', 
        'Room', 'WoType'

    ];

    

    

}