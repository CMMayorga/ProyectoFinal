$("audio").on("play", function () {
    var _this = $(this);
    $("audio").each(function (i, el) {
        if (!$(el).is(_this))
            $(el).get(0).pause();
    });
});