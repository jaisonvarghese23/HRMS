<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $guarded = [] ;

    public function getFromDateAttribute($value){
        return date('d-m-Y',strtotime($value));
    }
    public function gettoDateAttribute($value){
        return date('d-m-Y',strtotime($value));
    }
    public function getCreatedAtAttribute($value){
        return date('d-m-Y',strtotime($value));
    }
 public function user(){
   return  $this->belongsTo(Employee::class,'Employee_id','id');
 }
}
