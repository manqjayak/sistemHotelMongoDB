$(function () {
    // menggantikan method ready

    $('.Add-Button').on('click', function () {
        $('#JudulModal').html('Add Contact');
        $('.modal-footer button[type=submit]').html('Add');
    })

    $('.Edit-Button').on('click', function () {
        $('#JudulModal').html('Edit Contact');
        $('.modal-footer button[type=submit]').html('Edit');


        $('.modal-body form').attr('action', 'http://localhost/program/MVC/11UpdateData/public/contact/ubah')
        const id = $(this).data('id');


        $.ajax({
            // terdapat masalah dimana jika terdapat string di atas tag php atau<?php di dalam file config dan index.php paling luar, yang mengakibatkan js mengirimkan string itu
            url: 'http://localhost/program/MVC/11UpdateData/public/contact/getedit/',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',

            success: function (data) {

                $('#formInputNick').val(data.nick);
                $('#formInputJob').val(data.job);
                $('#formInputLevel').val(data.level);
                $('#id').val(data.id);

            }
        });
    });



});