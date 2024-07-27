/*
 * jQuery File Upload Plugin JS Example 8.9.1
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

/* global $, window */

$(function () {
    'use strict';

    // Initialize the jQuery File Upload widget:
    $('#fileupload').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: 'server/php/',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('#nome_arquivos').val($('#nome_arquivos').val()+', '+file.name);
            });
        }
    }).bind('fileuploadstop', function (e, data) {
        $.ajax({type: 'POST', url: 'enviar-email.php', data: $('#fileupload').serialize(), dataType: 'json'}).done(function(data){
            alert('Arquivos enviados com sucesso.');
            location.href="http://www.bioparts.com.br";
            //console.log(data);
        }).bind('fileuploadprogressall', function (e, data) {
            $('#progress .progress-bar').css('width', '80%');
        });
    });
    
    
    /*
    $('#fileupload').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: 'server/php/',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('#nome_arquivos').val($('#nome_arquivos').val()+', '+file.name);
            });
        }
    }).bind('fileuploadstop', function (e, data) {
        $('.col-lg-7').html('Por favor aguarde, ainda esta processando seu formulário');
        $.ajax({type: 'POST', url: 'enviar-email.php', data: $('#fileupload').serialize(), dataType: 'json'}).done(function(data){
            alert('Arquivos enviados com sucesso.');
            //location.href="index.php";
            console.log(data);
        });
    });
    */

    // Enable iframe cross-domain access via redirect option:
    $('#fileupload').fileupload(
        'option',
        'redirect',
        window.location.href.replace(
            /\/[^\/]*$/,
            '/cors/result.html?%s'
        )
    );

    if (window.location.hostname === 'blueimp.github.io') {
        // Demo settings:
        $('#fileupload').fileupload('option', {
            url: '//jquery-file-upload.appspot.com/',
            // Enable image resizing, except for Android and Opera,
            // which actually support image resizing, but fail to
            // send Blob objects via XHR requests:
            disableImageResize: /Android(?!.*Chrome)|Opera/
                .test(window.navigator.userAgent),
            maxFileSize: 5000000,
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i
        });
        // Upload server status check for browsers with CORS support:
        if ($.support.cors) {
            $.ajax({
                url: '//jquery-file-upload.appspot.com/',
                type: 'HEAD'
            }).fail(function () {
                $('<div class="alert alert-danger"/>')
                    .text('Upload server currently unavailable - ' +
                            new Date())
                    .appendTo('#fileupload');
            });
        }
    } else {
        /*
        // Load existing files:
        $('#fileupload').addClass('fileupload-processing');
        $.ajax({
            // Uncomment the following to send cross-domain cookies:
            //xhrFields: {withCredentials: true},
            url: $('#fileupload').fileupload('option', 'url'),
            dataType: 'json',
            context: $('#fileupload')[0]
        }).always(function () {
            $(this).removeClass('fileupload-processing');
        }).done(function (result) {
            $(this).fileupload('option', 'done')
                .call(this, $.Event('done'), {result: result});
        });
        */
    }

});