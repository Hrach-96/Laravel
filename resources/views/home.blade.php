@extends('layouts.app')
@include('modals/cardmodal')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach($lists as $list)
            <div class='col-md-3'>
                <div class='bg-secondary text-center'>
                    {{$list['title']}}
                </div>
                <div data-list-id="{{$list->id}}">
                    @foreach($list->CardInfo as $card)
                        <div class='col-md-12 text-center h-50 border mt-4 bg-white card_modal cursor-pointer' data-card-id="{{$card->id}}">
                            <div class='col-md-12 text-danger'>
                                {{$card->name}}
                            </div>
                            <br>
                            <div class='col-md-12'>
                                <h3>Members:</h3>
                                <div class="main-card-members-{{$card->id}}">
                                @foreach($card->Members as $member)
                                    {{$member->UserInfo->name}}
                                @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="add-new-card-{{$list->id}}">
                    <button data-list-id="{{$list->id}}" class='btn btn-danger add_card'>Add Card</button>
                </div>
                <br>
            </div>
        @endforeach
    </div>
</div>
@endsection
