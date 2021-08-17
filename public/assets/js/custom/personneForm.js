
$(document).ready(function () {



   /* $("#mainPicture").fileinput({
        //uploadUrl: '/file-upload-batch/2',
        theme: "fas",
        language: "fr",
        maxFilePreviewSize: 10240,
        showUpload: false,
        allowedFileTypes: ['image'],
    }); */


    $("#mainPicture").fileinput({
        language: "fr",
        overwriteInitial: true,
        maxFileSize: 1500,
        showClose: false,
        showCaption: false,
        showBrowse: false,
        browseOnZoneClick: true,
        removeLabel: '',
        removeIcon: '<i class="bi-x-lg"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors-2',
        msgErrorClass: 'alert alert-block alert-danger',
        defaultPreviewContent: '<img src="/img/default-avatar-male.png" alt="Your Avatar"><h6 class="text-muted">Click to select</h6>',
        layoutTemplates: {main2: '{preview} '  + ' {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png", "gif","jpeg"]
     });

    /*$("#attachements").fileinput({
        //uploadUrl: '/file-upload-batch/2',
        theme: "fas",
        language: "fr",
        maxFilePreviewSize: 10240,
        showUpload: false,
        allowedFileExtensions: ["jpg", "png","pdf", "gif","jpeg","mp4","webm","avi","wmv","flv","swf","doc","docx","csv","xls","xlsx","txt","mp3","wav"]
    });*/

    $("#attachements").fileinput({

        language: "fr",
        uploadUrl: "#",
        showUpload: false,
        maxFileSize: 1000000,
        removeFromPreviewOnError: true,
        overwriteInitial: false,
        previewFileIcon: '<i class="fas fa-file"></i>',
        preferIconicPreview: true, // this will force thumbnails to display icons for following file extensions
        previewFileIconSettings: { // configure your icon file extensions
            'doc': '<i class="fas fa-file-word text-primary"></i>',
            'xls': '<i class="fas fa-file-excel text-success"></i>',
            'ppt': '<i class="fas fa-file-powerpoint text-danger"></i>',
            'pdf': '<i class="fas fa-file-pdf text-danger"></i>',
            'zip': '<i class="fas fa-file-archive text-muted"></i>',
            'htm': '<i class="fas fa-file-code text-info"></i>',
            'txt': '<i class="fas fa-file-text text-info"></i>',
            'mov': '<i class="fas fa-file-video text-warning"></i>',
            'mp3': '<i class="fas fa-file-audio text-warning"></i>',
            // note for these file types below no extension determination logic
            // has been configured (the keys itself will be used as extensions)
            'jpg': '<i class="fas fa-file-image text-danger"></i>',
            'gif': '<i class="fas fa-file-image text-muted"></i>',
            'png': '<i class="fas fa-file-image text-primary"></i>'
        },
        previewFileExtSettings: { // configure the logic for determining icon file extensions
            'doc': function(ext) {
                return ext.match(/(doc|docx)$/i);
            },
            'xls': function(ext) {
                return ext.match(/(xls|xlsx)$/i);
            },
            'ppt': function(ext) {
                return ext.match(/(ppt|pptx)$/i);
            },
            'zip': function(ext) {
                return ext.match(/(zip|rar|tar|gzip|gz|7z)$/i);
            },
            'htm': function(ext) {
                return ext.match(/(htm|html)$/i);
            },
            'txt': function(ext) {
                return ext.match(/(txt|ini|csv|java|php|js|css)$/i);
            },
            'mov': function(ext) {
                return ext.match(/(avi|mpg|mkv|mov|mp4|3gp|webm|wmv)$/i);
            },
            'mp3': function(ext) {
                return ext.match(/(mp3|wav)$/i);
            }
        }
    });





    /*$("#input-ke-2").fileinput({
        theme: "explorer",
        showUpload: false,

        //uploadUrl: "/file-upload-batch/2",
        allowedFileExtensions: ["jpg", "png","pdf", "gif","jpeg","mp4","webm","avi","wmv","flv","swf","doc","docx","csv","xls","xlsx","txt","mp3","wav"],
        preferIconicPreview: true, // this will force thumbnails to display icons for following file extensions
        maxFileSize: 10000000,
        previewFileIconSettings: { // configure your icon file extensions
            'doc': '<i class="fas fa-file-word text-primary"></i>',
            'xls': '<i class="fas fa-file-excel text-success"></i>',
            'ppt': '<i class="fas fa-file-powerpoint text-danger"></i>',
            'pdf': '<i class="fas fa-file-pdf text-danger"></i>',
            'zip': '<i class="fas fa-file-archive text-muted"></i>',
            'htm': '<i class="fas fa-file-code text-info"></i>',
            'txt': '<i class="fas fa-file-text text-info"></i>',
            'mov': '<i class="fas fa-file-video text-warning"></i>',
            'mp3': '<i class="fas fa-file-audio text-warning"></i>',
            // note for these file types below no extension determination logic
            // has been configured (the keys itself will be used as extensions)
            'jpg': '<i class="fas fa-file-image text-danger"></i>',
            'gif': '<i class="fas fa-file-image text-muted"></i>',
            'png': '<i class="fas fa-file-image text-primary"></i>'
        },
        previewFileExtSettings: { // configure the logic for determining icon file extensions
            'doc': function(ext) {
                return ext.match(/(doc|docx)$/i);
            },
            'pdf': function(ext) {
                return ext.match(/(pdf)$/i);
            },
            'xls': function(ext) {
                return ext.match(/(xls|xlsx)$/i);
            },
            'ppt': function(ext) {
                return ext.match(/(ppt|pptx)$/i);
            },
            'zip': function(ext) {
                return ext.match(/(zip|rar|tar|gzip|gz|7z)$/i);
            },
            'htm': function(ext) {
                return ext.match(/(htm|html)$/i);
            },
            'txt': function(ext) {
                return ext.match(/(txt|ini|csv|java|php|js|css)$/i);
            },
            'mov': function(ext) {
                return ext.match(/(avi|mpg|mkv|mov|mp4|3gp|webm|wmv)$/i);
            },
            'mp3': function(ext) {
                return ext.match(/(mp3|wav)$/i);
            }
        },
        overwriteInitial: false,
        initialPreviewAsData: true,
     });*/


    var $wrapper = $('.js-personne-telephone-wrapper');
    $wrapper.on('click', '.js-remove-telephone', function(e) {
        e.preventDefault();
        $(this).closest('.js-personne-telephone-item')
            .fadeOut()
            .remove();
    });
    $wrapper.on('click', '.js-personne-telephone-add', function(e) {
        e.preventDefault();
        // Get the data-prototype explained earlier
        var prototype = $wrapper.data('prototype');
        // get the new index
        var index = $wrapper.data('index');
        // Replace '__name__' in the prototype's HTML to
        // instead be a number based on how many items we have
        var newForm = prototype.replace(/__name__/g, index);
        // increase the index with one for the next item
        $wrapper.data('index', index + 1);
        // Display the form in the page before the "new" link
        $(this).after(newForm);
    });


    var $alias_wrapper = $('.js-personne-alias-wrapper');
    $alias_wrapper.on('click', '.js-remove-alias', function(e) {
        e.preventDefault();
        $(this).closest('.js-personne-alias-item')
            .fadeOut()
            .remove();
    });
    $alias_wrapper.on('click', '.js-personne-alias-add', function(e) {
        e.preventDefault();
        // Get the data-prototype explained earlier
        var alias_prototype = $alias_wrapper.data('prototype');
        // get the new index
        var alias_index = $alias_wrapper.data('index');
        // Replace '__name__' in the prototype's HTML to
        // instead be a number based on how many items we have
        var newAliasForm = alias_prototype.replace(/__name__/g, alias_index);
        // increase the index with one for the next item
        $alias_wrapper.data('index', alias_index + 1);
        // Display the form in the page before the "new" link
        $(this).after(newAliasForm);
    });





})