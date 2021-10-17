<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardMembers extends Model
{
    use HasFactory;
    protected $table = 'card_members';
    public function UserInfo()
    {
        return $this->belongsTo('App\Models\User','user_id','id' );
    }
}
