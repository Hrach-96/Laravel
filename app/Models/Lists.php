<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    use HasFactory;
    protected $table = 'lists';
    public function CardInfo()
    {
        return $this->HasMany('App\Models\Cards','list_id','id' );
    }
}
