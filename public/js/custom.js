$(document).ready(function(){
    var url = $('meta[name="url"]').attr('content');
    var token = $('meta[name="csrf-token"]').attr('content');
    var card_id = 0;
    var list_id = '';
    $(document).on("click",".card_modal",function(){
        card_id = $(this).attr('data-card-id');
        $.ajax({
            type:'post',
            url: url+'/CardInfo',
            data:{_token:token,card_id:card_id},
            success:function(res){
                $('.card_members').html('');
                $('.card_comments').html('');
                $('.card_edit_members').html('');
                $('textarea[name="comment"]').val('')
                $('#cardModalTitle').html(res.card.name);
                $('#cardModal').modal('show');
                var used_members = Array();
                if(res.members.length > 0){
                    for(var key = 0; key < res.members.length ; key++){
                        $('.card_members').append(res.members[key].user_info.name + " ");
                        used_members.push(res.members[key].user_info.id);
                    }
                }
                if(res.comments.length > 0){
                    for(var i = 0; i < res.comments.length ; i++){
                        $('.card_comments').append('<h6 class="border p-3">' + res.comments[i].content + " - " + res.comments[i].user_info.name + "</h6>");
                    }
                }
                var lists_html = '<select class="change_card_list">';
                for(var i = 0; i < res.lists.length ; i++){
                    if(res.card.list_id == res.lists[i].id){
                        lists_html+='<option value="' + res.lists[i].id + '" selected>' + res.lists[i].title + '</option>'
                    }
                    else{
                        lists_html+='<option value="' + res.lists[i].id + '">' + res.lists[i].title + '</option>'
                    }
                }
                lists_html += '</select>';
                $(".list_dropdown").html(lists_html)
                for(var j = 0; j < res.users.length ; j++){
                    var used = '';
                    if($.inArray(res.users[j].id, used_members) !== -1){
                        used = 'bg-secondary';
                    }
                    $('.card_edit_members').append('<div data-user-id="' + res.users[j].id + '" class="cursor-pointer choose_member border ' + used + ' p-1">' + res.users[j].name + "</div>");
                }
            }
        })
    })
    $(document).on("change",".change_card_list",function(){
        var new_list_id = $(".change_card_list").val();
        list_id = $(this).attr('data-list-id');
        $.ajax({
            type:'post',
            url: url+'/ChangeList',
            data:{_token:token,new_list_id:new_list_id,card_id:card_id},
            success:function(res){
                var moved_card = $('div[data-card-id="' + card_id + '"]').clone();
                $('div[data-card-id="' + card_id + '"]').remove();
                $('div[data-list-id="' + new_list_id + '"]').prepend(moved_card);
            }
        })
    })
    $(document).on("click",".add_comment",function(){
        var comment = $('textarea[name="comment"]').val();
        $.ajax({
            type:'post',
            url: url+'/AddComment',
            data:{_token:token,comment:comment,card_id:card_id},
            success:function(res){
                if(res.success){
                    $('.card_comments').prepend('<h6 class="border p-3">' + res.content + " - " + res.user + "</h6>");
                }
            }
        })
    })
    $(document).on("click",".choose_member",function(){
        var user_id = $(this).attr('data-user-id');
        var att = '/MemberAdd';
        if ($(this).hasClass("bg-secondary")) {
            att = '/MemberRemove';
            $(this).removeClass("bg-secondary")
        }
        else{
            $(this).addClass("bg-secondary")
        }
        $.ajax({
            type:'post',
            url: url+att,
            data:{_token:token,user_id:user_id,card_id:card_id},
            success:function(res){
                $(".card_members").html('')
                $('.main-card-members-' + card_id).html('');
                var html = '';
                for(var i = 0; i < res.members.length ; i++){
                    html+=res.members[i].user_info.name + ' ';
                }
                $('.card_members').append(html);
                $('.main-card-members-' + card_id).append(html);
            }
        })
    })
    $(document).on("click",".add_card",function(){
        list_id = $(this).attr('data-list-id');
        $(this).html('Add');
        $(this).removeClass('add_card');
        $(this).addClass('create_card');
        $(this).before('<input type="text" class="">');
    })
    $(document).on("click",".create_card",function(){
        var new_card_name = $(".add-new-card-" + list_id).find('input').val();
        $(this).remove();
        $(".add-new-card-" + list_id).find('input').remove();
        $.ajax({
            type:'post',
            url: url+'/CreateCard',
            data:{_token:token,name:new_card_name,list_id:list_id},
            success:function(res){
                if(res.success){
                    var card_html = "<div class='col-md-12 text-center h-50 border mt-4 bg-white card_modal cursor-pointer' data-card-id='" + res.card.id + "'>"
                        card_html+="<div class='col-md-12 text-danger'>";
                            card_html+= new_card_name;
                        card_html+="</div><br>";
                        card_html+="<div class='col-md-12'>";
                            card_html+="<h3>Members:</h3>";
                            card_html+="<div class='main-card-members-" + res.card.id + "'>";
                            card_html+="</div>";
                        card_html+="</div>";
                    card_html+="</div>";
                    card_html+="<button data-list-id=" + res.card.list_id + " class='btn btn-danger add_card'>Add Card</button>";
                    $(".add-new-card-" + list_id).append(card_html);
                }
            }
        })
    })
})