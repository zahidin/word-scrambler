$(document).ready(function() {
    $(".btn-create-word").click(function(e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                )
            }
        });
        var formData = {};
        $.ajax({
            type: "POST",
            url: "/admin",
            data: formData,
            success: function(data) {
                if (data.success) {
                    $("#notif-success").removeAttr("hidden");
                    $(".new-word").html(data.word);
                    setTimeout(() => {
                        $("#notif-success").attr("hidden", true);
                    }, 3000);
                } else {
                    alert("Something went wrong");
                }
            }
        });
    });
});
