<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\CardMembers;
use App\Models\User;
use App\Models\Cards;
use App\Models\Lists;
use App\Models\Comments;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function CardInfo(Request $request) // Card Id
    {
        $card_id = request('card_id');
        $cardMembers = CardMembers::with('UserInfo')->where('card_id',$card_id)->get();

        $cardComments = Comments::with('UserInfo')->where('card_id',$card_id)->orderBy('created_at','desc')->get();
        
        $lists = Lists::all();
        $users = User::all();
        return response(['success' => true,'card' => Cards::find($card_id),'members' => $cardMembers,'comments' => $cardComments,'users' => $users,'lists' => $lists]);
    }
    /**
     * Changing List Of Card
     *
     */
    public function changeList(Request $request) // Card Id , New List Id
    {
        $card = Cards::find(request('card_id'));
        $card->list_id = request('new_list_id');
        $card->save();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) //card name
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:cards|max:255',
        ]);
        if (!$validator->fails()){
            $card = new Cards;
            $card->name = request('name');
            $card->list_id = request('list_id');
            $card->save();
            return response(['success' => true,'card' => $card]);
        }
    }

}
