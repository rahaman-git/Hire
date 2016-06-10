Dropzone.options.addImages = {
    maxFileSize: 2,
    acceptedFiles: 'image/*',
    success: function (file, response) {
        // console.log(file);
        // console.log(response);
        if (file.status == 'success') {
            handleDropzoneFileUpload.handleSuccess(response);
        } else {
            handleDropzoneFileUpload.handleError(response);
        }
    }
};

var handleDropzoneFileUpload = {
    handleError: function (response) {
        console.log(response);
    },
    handleSuccess: function (response) {
        //console.log(response);
        var imageList = $('#a-img');
        var imageSrc = baseUrl + '/' + response.image_path;
        var imageName = response.image_name;
        $('#f-img').empty();
        $('#img-form').hide();
        $('#f-img').append('<a href="' + imageSrc + '" data-lightbox="mygallery"><img src="/freelancer/images/thumbs/' + imageName + '"></a>');
    }
};

$(document).ready(function () {

    $('.summary-field').on('click', '.summary-edit-btn',function () {
        $.get(baseUrl+'/freelancers/'+ freelancer_id, function (data) {
            //success data
            console.log(data);
            $('#summary_txt').val(data.description);
        });
        $('.summary-field').css('display', 'none');
        $('.summary-form').css('display', 'block');
    });
    
    $('.summary-form').on('click', '.summary-add-btn', function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            summaryDescription: $('#summary_txt').val()
        };
        var type = 'POST';
        $.ajax({
            type: type,
            url: baseUrl+'/freelancers/'+ freelancer_id,
            data: formData,
            success: function (data) {
                console.log(data);
                var task = '<p class="summary-p">'+ formData.summaryDescription +'</p>'
                $('.summary-p').replaceWith(task);
                $('.summary-field').css('display', 'block');
                $('.summary-form').css('display', 'none');
            }
        })
    })
});

$('.wf').on('click', '.btn-fa', function () {
    $('.choose-field').css('display', 'block');
    $('.btn-fa').css('display', 'none');
});

$('.choose-field').on('click', '.btn-done-field', function () {
    var fData = {
        fields: $('#add_fields').val()
    };
    console.log(fData);
    if (fData.fields != null) {
        var length = fData.fields.length;
    }else {
        var length = null;
    }
    $.ajax({
        type: 'post',
        url: baseUrl+'/freelancers/'+freelancer_id,
        data: fData,
        success: function (data) {
            console.log(data);
            var fieldBtn ='';
            if (length != null) {
                for (i = 0; i < length; i++) {
                    fieldBtn += '<span class="btn btn-danger btn-sm btn-f" style="width:' + (400 - i * 40) + 'px">&nbsp;'
                        + data[i].name + '</span>';
                }
                $('.field-btns').replaceWith('<div class="field-btns">' + fieldBtn + '</div>');
            }else {
                $('.field-btns').replaceWith('<div class="field-btns"><p>'+ 'No Working fields added in the filed list' + '</p></div>')
            }
        }
    });

   $('.choose-field').css('display', 'none');
   $('.btn-fa').css('display', 'block');
});

$(document).ready(function(){

	$('.exp').on('click', '.exp-edit', function () {
        var expId = $(this).val();
		$.get(baseUrl+'/'+freelancer_id+'/'+expId , function(data) {
			console.log(data);
			$('#expTitle').val(data.title);
			$('#description').val(data.description);
			$('#btn-save').val('update');
            $('#exp-id').val(expId);
			$('#myModal').modal('show');
		});
	});

    $('#exp-delete').click(function (e) {
        var expId = $('#exp-id').val();
        e.preventDefault();
        $.ajax({
            url: baseUrl+'/exp-delete/'+ freelancer_id + '/' + expId ,
            type: "POST",
            success: function (data) {
                console.log(data);
                $('#myModal').modal('hide');
                alert('experience is deleted');
                $('#exp'+expId).remove();
            }
        })
    });
    
    $('.exp').on('click', '.btn-add-exp', function () {
        $('#btn-save').val("add");
        $('#frmExp').trigger("reset");
        $('#myModal').modal('show');
    });
    
    $('#btn-save').click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            title: $('#expTitle').val(),
            description: $('#description').val()
        };
        var expId = $('#exp-id').val();
        var state = $('#btn-save').val();
        var type = "POST";
        var freelancer_id = $('#freelancer_id_exp').val();
        var myUrl = baseUrl+'/freelancers/'+freelancer_id;
        if(state == 'update'){
            type = "PUT";
            myUrl = baseUrl+'/'+ freelancer_id + '/' + expId;
        }
        console.log(formData);
        if( formData.title.length  == 0 && formData.description.length == 0 ) {
            alert('Title and Description must have some value');
        } else {
            $.ajax({
                type: type,
                url: myUrl,
                data: formData,
                success: function (data) {
                    console.log(data);
                    if (state == 'add') {
                        $('.all-exp').append(
                            '<div class="experience panel" id="exp'+data.id+'"><p class="panel-heading">' + data.title + '<button href="" ' +
                            'class="btn btn-danger pull-right exp-edit" value="' + data.id + '">&nbsp;Edit' +
                            '</button> </p> <p class="panel-body">' + data.description + '</p>'
                        )
                    } else {
                        $('#exp'+data.id).replaceWith(
                            '<div class="experience panel" id="exp'+data.id+'"><p class="panel-heading">' + data.title + '<button href="" ' +
                            'class="btn btn-danger pull-right exp-edit" value="' + data.id + '">&nbsp;Edit' +
                            '</button> </p> <p class="panel-body">' + data.description + '</p>'
                        )
                    }
                }
            })
        }
        $('#myModal').modal('hide');
    })
});
$(document).ready(function() {
	console.log('Document is ready!!');
});

//# sourceMappingURL=all.js.map