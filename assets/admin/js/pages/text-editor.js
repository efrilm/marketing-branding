$(document).ready(function () {

    "use strict";
    $('#summernote').summernote({
        height: 400,
        callbacks: {
            onFocus: function (contents) {
                if ($('.summernote').summernote('isEmpty')) {
                    $(".summernote").html('');
                }
            }
        }
    });
});