import "./bootstrap";

// resources/js/app.js
import $ from "jquery";
import "bootstrap";

$(document).ready(function () {
    $(document).ready(function () {
        $(".smooth-scroll").click(function (event) {
            event.preventDefault();
            var target = this.hash;
            $("html, body").animate(
                {
                    scrollTop: $(target).offset().top,
                },
                800
            );
        });
    });
});
