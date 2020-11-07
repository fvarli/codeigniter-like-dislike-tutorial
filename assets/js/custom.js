$(document).ready(function () {

    $(".post_list").on("click", ".like-btn",function () {
        let data_id = $(this).attr("data-id");
        let t = $(this);
        $.post("http://localhost/codeigniter_like_dislike/vote", {
            post_id : data_id,
            vote_status: 1
        }, function (response) {
            //$(".post_list").html(response);
            //alert(response);
            t.parent().parent().html(response);
        })
    });

    $(".post_list").on("click",".dislike-btn",function () {
        let data_id = $(this).attr("data-id");
        let t = $(this);
        $.post("http://localhost/codeigniter_like_dislike/vote", {
            post_id : data_id,
            vote_status: -1
        }, function (response) {
            //$(".post_list").html(response);
            t.parent().parent().html(response);
        })
    });

});