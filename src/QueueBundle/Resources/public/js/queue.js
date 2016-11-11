/**
 * Created by peter.self on 10/11/16.
 */
"use strict";
var fetchList = function () {

    var fetch = function() {
        $.ajax({
            url: '/list',
            type: 'GET',
            dataType: 'json',
            contentType: 'application/json',
            success: function(data) {
                $(".transient").remove();
                for (var key in data) {
                    $("#list_table").append(
                        '<tr class="transient">' +
                        '<td> '+data[key].type+' </td>'+
                        '<td> '+data[key].name+' </td>'+
                        '<td> '+data[key].service+' </td>'+
                        '<td> '+data[key].queued+' </td>'+
                        '</tr>'
                    );
                }
            },
            complete: function () {
                setTimeout(fetch, 10000);
            }
        })
    };
    fetch();
};

$(document).ready(function() {
    fetchList();
});