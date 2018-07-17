<?php
namespace App;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Workorder extends Eloquent {
    protected $collection = 'WorkOrder';
    protected $primaryKey = 'WoNum';

    protected $fillable = [
        'WoNum', 'WoNumStr', 'OpenDate', 'CompDate',
        'Priority', 'Status'
    ];

}