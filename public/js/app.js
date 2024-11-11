$(document).ready(function() {

    

    var id=$('#maker').val();
    $('#model').find('option').remove();

    // AJAX request
    $.ajax({
        url: '/makers/' + id + '/models',
        type: 'get',
        dataType: 'json',
        success: function (response) {

            var len = 0;
            if (response['data'] != null) {
                len = response['data'].length;
            }

            if (len > 0) {
                // Read data and create <option >
                for (var i = 0; i < len; i++) {
                    var id = response['data'][i].id;
                    var name = response['data'][i].name;
                    var option = "<option value='" + id + "'>" + name + "</option>";

                    $("#model").append(option);
                }
            }
        }
    });

    // Manufacturer Change
    $('#maker').change(function () {
        // Manufacturer id
        var id = $(this).val();

        // Empty the dropdown
        $('#model').find('option').remove();

        // AJAX request
        $.ajax({
            url: '/makers/' + id + '/models',
            type: 'get',
            dataType: 'json',
            success: function (response) {

                var len = 0;
                if (response['data'] != null) {
                    len = response['data'].length;
                }

                if (len > 0) {
                    // Read data and create <option >
                    for (var i = 0; i < len; i++) {
                        var id = response['data'][i].id;
                        var name = response['data'][i].name;
                        var option = "<option value='" + id + "'>" + name + "</option>";

                        $("#model").append(option);
                    }
                }
                // Changing logo
                // len = 0;
                // if (response['logo'] != null) {
                //     len = response['logo'].length;
                // }
                // if (len > 0) {
                //     $("#logo").attr('src', response['logo']);
                // } else {
                //     $("#logo").attr('src', '');
                // }
            }
        });
    });

    // Model Change
    // $('#select-model').change(function () {
    //     // Model id
    //     var id = $(this).val();

    //     // Empty the dropdown
    //     $('#select-trim').find('option').not(':first').remove();

    //     // AJAX request
    //     $.ajax({
    //         url: '/models/' + id + '/fetch-trims',
    //         type: 'get',
    //         dataType: 'json',
    //         success: function (response) {

    //             var len = 0;
    //             if (response['data'] != null) {
    //                 len = response['data'].length;
    //             }

    //             if (len > 0) {
    //                 // Read data and create <option >
    //                 for (var i = 0; i < len; i++) {
    //                     var id = response['data'][i].id;
    //                     var name = response['data'][i].name;
    //                     var option = "<option value='" + id + "'>" + name + "</option>";

    //                     $("#select-trim").append(option);
    //                 }
    //             }
    //         }
    //     });
    // });

    // // Color Change
    // $('#select-color').change(function () {
    //     var color = $('option:selected',this).css('background-color');
    //     $(this).css('background-color', color);
    // });
});
