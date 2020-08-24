<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JavaScript Image Cropping with DropzoneJS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://unpkg.com/dropzone/dist/dropzone.css" rel="stylesheet" />
    <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        div#myDropzone {
            width: 152px;
            display: inline-block;
            height: 120px;
            border: 1px solid #d3d4fc;
            border-radius: 4px;
            background: white;
            margin: 20px 20px 10px 0;
            vertical-align: top;
            background-image: url(addimg.svg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: 100px;
        }
        #confirm_btn {
            margin: 10px auto;
            text-align: center;
            box-shadow: 0 0 0 1px rgba(49,49,93,0.03), 0 2px 5px 0 rgba(49,49,93,0.1), 0 1px 2px 0 rgba(0,0,0,0.08);
            background: #466afc;
            border: 0 !important;
            font-size: 16px;
            border-radius: 4px;
            color: #fdfdfd;
            height: 60px;
            font-weight: normal;
            letter-spacing: .4px;
            cursor: pointer;
            width: 40%;
            display: block;
            padding: 18px 0;
        }

        #theImg {
            float: none;
            width: 200px;
            display: inline-block;
            height: 120px;
            border: 1px solid #d3d4fc;
            border-radius: 4px;
            background: white;
            margin: 20px 20px 10px 0;
            vertical-align: top;
            padding: 10px;
        }

        .modal .modal-dialog {
            position: fixed;
            margin: auto;
            width: 100%;
            height: 100%;
            -webkit-transform: translate3d(0%, 0, 0);
            -ms-transform: translate3d(0%, 0, 0);
            -o-transform: translate3d(0%, 0, 0);
            transform: translate3d(0%, 0, 0);
            right: 0;
        }


        .modal .modal-content {
            height: 100%;
            overflow-y: auto;
        }


        .modal .modal-body {
            padding: 15px 15px 80px;
        }




        /*Right*/
        .modal.fade .modal-dialog {
            right: -320px;
            -webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
            -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
            -o-transition: opacity 0.3s linear, right 0.3s ease-out;
            transition: opacity 0.3s linear, right 0.3s ease-out;

        }

        .modal.fade.show .modal-dialog {
            right: 0;
        }

        /* ----- MODAL STYLE ----- */
        .modal-content {
            border-radius: 0;
            border: none;
        }

        .modal-header {
            border-bottom-color: #EEEEEE;
            background-color: #FAFAFA;
        }

        @media (min-width: 576px) {
            .modal-dialog {
                max-width: 80%;
            }
        }
    </style>
</head>

<body>
    <span class="image_area"></span>
        <div class="dropzone" id="myDropzone"></div>
    

    <div class="modal" id="myModal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
              <div id="testimg"></div>
              <div id="testbtn"></div>
            </div>
                        
          </div>
        </div>
      </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/dropzone"></script>
    <script src="https://unpkg.com/cropperjs"></script>

    <script>
        Dropzone.options.myDropzone = {
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: 'dropzone/store',
            acceptedFiles: 'image/jpeg,image/png',
            dictDefaultMessage: '',
            transformFile: function (file, done) {
                var myDropZone = this;
                $('#myModal').modal('show');
                $(".dz-preview").remove();

                // Create the image editor overlay
                var editor = document.createElement('div'); 
                editor.setAttribute("id", "editor_area");
                editor.style.zIndex = 9999;
                editor.style.backgroundColor = '#000';

                // Create the confirm button
                var confirm = document.createElement('button');
                confirm.setAttribute("id", "confirm_btn");
                confirm.style.zIndex = 9999;
                confirm.textContent = 'Confirm';
                confirm.addEventListener('click', function () {

                    // Get the canvas with image data from Cropper.js
                    var canvas = cropper.getCroppedCanvas({
                        width: 256,
                        height: 256
                    });

                    // Turn the canvas into a Blob (file object without a name)
                    canvas.toBlob(function (blob) {
                        
                        // Update the image thumbnail with the new image data
                        myDropZone.createThumbnail(
                            blob,
                            myDropZone.options.thumbnailWidth,
                            myDropZone.options.thumbnailHeight,
                            myDropZone.options.thumbnailMethod,
                            false,
                            function (dataURL) {

                                // Update the Dropzone file thumbnail
                                myDropZone.emit('thumbnail', file, dataURL);
                                
                                // Return modified file to dropzone
                                done(blob);
                            }
                        );
                    });

                    // Remove the editor from view
                    editor.parentNode.removeChild(editor);
                    $("#confirm_btn").remove();
                    $('#myModal').modal('hide');
                    $(".dz-preview").remove();
            });

            $('#testbtn').empty().append(confirm);
               
                // Load the image
                var image = new Image();
                image.src = URL.createObjectURL(file);
                editor.appendChild(image);

                // Append the editor to the page
                // document.body.appendChild(editor);
                $('#testimg').empty().append(editor);

                // Create Cropper.js and pass image
                var cropper = new Cropper(image, {
                    // aspectRatio: 1,
                });

            },
            success: function (file, response) {
                    $('.image_area').append('<img id="theImg" src="http://127.0.0.1:8000/images/'+response["success"]+'" />')
            },
        };   
    </script>

</body>

</html>