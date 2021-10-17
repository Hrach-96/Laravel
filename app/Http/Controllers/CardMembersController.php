<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CardMembers;

class CardMembersController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) //user id , card id
    {
        $cardMembers = new CardMembers;
        $cardMembers->user_id = request('user_id');
        $cardMembers->card_id = request('card_id');
        $cardMembers->save();
        
        $members = $this->cardMembersByCardId(request('card_id'));
        return response(['success' => true,'members' => $members]);
    }
    /**
     * Card Member Info By Card Id
     *
     * @param  card id - int
     * @return \Illuminate\Http\Response
     */
    public function cardMembersByCardId($card_id)
    {
        $cardMembers = CardMembers::with('UserInfo')->where('card_id',$card_id)->get();
        return $cardMembers;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  user id , card id - int
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request)
    {
        CardMembers::where(['user_id' => request('user_id'),'card_id' => request('card_id')])->delete();
        $members = $this->cardMembersByCardId(request('card_id'));
        return response(['success' => true,'members' => $members]);
    }
}
