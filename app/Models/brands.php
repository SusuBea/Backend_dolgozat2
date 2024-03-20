<?php

namespace App\Models;

use Database\Factories\WinningsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brands extends Model
{
    use HasFactory;

    protected $primaryKey = 'brand_id';


    protected $fillable = [
        'name',
        'country',  
    ];



    public function brandWinningAll(){

        return $this -> hasMany(winnings::class,  'brand_id', 'brand_id');
    
    
    }



}




