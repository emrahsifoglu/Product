function makeItShort(caption, ext){
    return (caption.length > 10) ? caption.substr(0, 10)+'...'+ext : caption;
}

function fileBrowser(self){
    var browse	                = self.$("#browse");
    var image_file		        = self.$("#image_file");
    var fn				        = '';
    var exts			        = ['gif','png','jpg','jpeg'];
    var ext				        = '';

    //var isfn 			        = 0;
    var valid_size	        	= 0;
    var upload_max_file_size    = 1;

    image_file.fileValidator({
        onValidation: function(files){
            valid_size = 1;
        },
        onInvalid:    function(type, file){
            valid_size = 0;
        },
        maxSize: upload_max_file_size+'m'
    });

    browse.click(function() {
        image_file.click();
    });

    image_file.change(function() {
        fn = $(this).val();
        ext = fn.split('.').pop().toLowerCase();
        if($.inArray(ext, exts) == -1) {
            $(this).val('');
            //isfn = 0;
            fn = ext = '';
            browse.html('Select');
            alert('Invalid file type!');
        }else{
            if (valid_size){
                var caption = fn;
                browse.html(makeItShort(caption, ext));
            }else{
                $(this).val('');
                // isfn = 0;
                fn = ext = '';
                browse.html('Select');
                alert('File must be less then '+upload_max_file_size+'mb.');
            }
        }
    });

    var shorter = makeItShort(browse.html(), ext);
    browse.html(shorter);
}

function fileUpload(frm, vent){
    frm.ajaxForm({
        url: frm.attr('action'),
        data: frm.serialize(),
        type: (frm.attr('method')),
        beforeSend : function (xhr){
            vent.trigger("FileUpload", { status:'beforeSend' });
        },
        uploadProgress :function(event, position, total, percentComplete) {
            vent.trigger("FileUpload", { status:'uploadProgress', percentComplete: percentComplete });
        },
        success : function (returnData){
            vent.trigger("FileUpload", { status:'success', filename: returnData.message });
        },
        error : function(xhr, textStatus, errorThrown){
            vent.trigger("FileUpload", { status:textStatus, message:errorThrown });
        },
        complete: function(xhr){
            vent.trigger("FileUpload", { status:'complete'});
        }
    });
}
