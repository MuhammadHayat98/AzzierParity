<?php
//todo
/*
* change class name to WorkOrder to keep our naming conventions standard
*/
namespace App;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Workorder extends Eloquent {
    protected $collection = 'WorkOrder';
    protected $primaryKey = 'WoNum';

    protected $fillable = [
        'WoNum', 'WoNumStr', 'OpenDate', 'CompDate',
        'Priority'
    ];

    

}