$( document ).ready(function() {
    $('.btn-answer').click(function(e){
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var formData = {
            secret: $('.secret').val(),
            answer: $(this).attr('data-value')
        }
        $.ajax({
            type:'POST',
            url:'/home',
            data:formData,
            success:function(data) {
               if(data.success){
                    $('#notif-success').removeAttr('hidden')
                    setTimeout(() => {
                        location.reload();
                    }, 500);
               }else{
                   console.log(data.correct)
                    $('#notif-wrong').removeAttr('hidden')
                    $('#notif-answer').html(data.correct)
                    setTimeout(() => {
                        location.reload();
                    }, 500);
               }
            }
         });
      }
    )
});