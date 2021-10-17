<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cards extends Model
{
    use HasFactory;
    protected $table = 'cards';
    public function Members()
    {
        return $this->HasMany('App\Models\CardMembers','card_id','id' );
    }
    public function Comments()
    {
        return $this->HasMany('App\Models\Comments','card_id','id' )->orderBy('created_at','desc');
    }
}
