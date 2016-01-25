$(document).ready(function () {
    Cookies.set("downloading", "false");
    $('#ytdl_form').submit(function (e) {
        Cookies.set("downloading", "true");
        console.log("Cookie set");
        console.log("Sending form...");
        return true;
    });
});
window.setInterval(function() {
    var loader = $('#loader');
    if (!Cookies.get("downloading")) {
        Cookies.set("downloading", "false");
    } else if (Cookies.get("downloading") == "true" && loader.hasClass('hidden')) {
        loader.removeClass('hidden');
    } else if (Cookies.get("downloading") == "false" && !loader.hasClass('hidden')) {
        console.log("should be hidden");
        loader.addClass('hidden');
    }
}, 100);
