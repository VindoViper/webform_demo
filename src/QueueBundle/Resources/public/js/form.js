/**
 * Created by peter.self on 11/11/16.
 */
"use strict";

var isolateForm = function () {

    $(".button_link").click(function(event) {
        $(".dynamic").removeClass("active");
        $(".dynamic").addClass("hidden");
        var type = event.target.className;
        $("#"+type).removeClass("hidden");
        $("#"+type).addClass("active");
    });

};

$(document).ready(function() {
    isolateForm();
});