@if (Session:: has('message'))
var type = "{{ Session::get('alert-type','info') }}"
switch (type) {
    case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;

    case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;

    case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;

    case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break;
}
@endif



$(function () {
    $(document).on('click', '#delete', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Deleted!',
                    'Brand has been deleted.',
                    'success'
                )
            }
        })
    });
});



{/* // get category */ }
$(document).ready(function () {
    $('select[name="category_id"]').on('change', function () {
        var category_id = $(this).val();
        if (category_id) {
            $.ajax({
                url: "{{ url('/category/subcategory/ajax') }}/" + category_id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('select[name="subsubcategory_id"]').html('');
                    var d = $('select[name="subcategory_id"]').empty();
                    $.each(data, function (key, value) {
                        $('select[name="subcategory_id"]').append('<option value="' + value.id + '">' + value.subcategory_name_en + '</option>');
                    });
                },
            });
        } else {
            alert('danger');
        }
    });
    // get subcategory
    $('select[name="subcategory_id"]').on('change', function () {
        var subcategory_id = $(this).val();
        if (subcategory_id) {
            $.ajax({
                url: "{{ url('/product/subsubcategory/ajax') }}/" + subcategory_id,
                type: "GET",
                dataType: "json",
                success: function (data) {

                    var d = $('select[name="subsubcategory_id"]').empty();
                    $.each(data, function (key, value) {
                        $('select[name="subsubcategory_id"]').append('<option value="' + value.id + '">' + value.subsubcategory_name_en + '</option>');
                    });
                },
            });
        } else {
            alert('danger');
        }
    });

});


$(document).ready(function () {
    $('select[name="subcategory_id"]').on('change', function () {
        var category_id = $(this).val();
        if (category_id) {
            $.ajax({
                url: "{{ url('/category/subsubcategory/ajax') }}/" + category_id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    var d = $('select[name="subsubcategory_id"]').empty();
                    $.each(data, function (key, value) {
                        $('select[name="subsubcategory_id"]').append('<option value="' + value.id + '">' + value.subsubcategory_name_en + '</option>');
                    });
                },
            });
        } else {
            alert('danger');
        }
    });

});



function mainThumbnailUrl(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader()
        reader.onload = function (e) {
            $('#mainThumbnail').attr('src', e.target.result).width(80).height(80);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

// <!-- ---------------------------Show Multi Image JavaScript Code ------------------------ -->

$(document).ready(function () {
    $('#multiImg').on('change', function () { //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data

            $.each(data, function (index, file) { //loop though each file
                if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function (file) { //trigger function on successful read
                        return function (e) {
                            var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(80)
                                .height(80); //create image element 
                            $('#preview_img').append(img); //append image to output element
                        };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });

        } else {
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
    });
});

// <!-- ================================= End Show Multi Image JavaScript Code. ==================== -->
