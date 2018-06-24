<?php
/**
 * Created by PhpStorm.
 * User: alceste
 * Date: 24/06/18
 * Time: 12.07
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class DailyPoolLogEntry extends Model
{
    public $timestamps = false;
    protected $table = 'daily_pool_log_entry';
    protected $guarded = ['id'];

}