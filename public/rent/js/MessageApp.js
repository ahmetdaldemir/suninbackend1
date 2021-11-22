$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

message = {
    general: function () {
        $('#people-list').on('click', '.open', function () {
            let html = '',id = $(this).attr('data-id'),name = $(this).attr('data-name'),email = $(this).attr('data-email'),phone = $(this).attr('data-phone'),subject = $(this).attr('data-subject'),comment = $(this).attr('data-comment');
            $.ajax({
                url: '/messages/read/'+id,
                type: 'GET',
                success: function (data) {
                    if(data.success) {
                        $(this).removeClass('read');
                        $('.chat-header .about .name').text(name+' ('+email+')');
                        $('.chat-header .about .font-primary.f-12').text(phone);
                        $('.chat-message .reply').attr('data-id',id);
                        html +='<li class="clearfix">';
                        html +='    <div class="message other-message pull-right">';
                        html +='        <div class="message-data"><span class="message-data-time"></span></div>';
                        html +='        <div class="message-comment">'+comment+'</div>';
                        html +='    </div>';
                        html +='</li>';
                        $('.chat-history ul').html(html);
                        message.list(id);
                    }
                }
            });
            /*AlertWarning('tets');*/
        });
    },
    list: function (id) {
        let html = '';
        $.ajax({
            url: '/messages/show/'+id,
            type: 'POST',
            data: 'id='+id,
            success: function (data) {
                $.each( data.messages, function( key, value ) {
                    html +='<li>';
                    html +='    <div class="message my-message"><div class="message-data text-right"><span class="message-data-time"></span></div>'+value.comment+'</div>';
                    html +='</li>';
                });
                $('.chat-history ul').append(html);
            }
        });
    },
    reply: function () {
        $('.chat-message').on('click', '.reply', function () {
            let id = $(this).attr('data-id'),comment = $('#message-to-send').val()
            $.ajax({
                url: '/messages/store',
                type: 'POST',
                data: 'id='+id+'&comment='+comment,
                success: function () {
                    $('input[name="reply"]').val('');
                    message.list(id);
                }
            });
        });
    }
};
$(document).ready(function () {
    message.general();
    message.reply();
});
