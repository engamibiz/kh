<script src="{{ asset('8x/assets/js/repeater.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function() {
                $('.repeater').repeater({
                    // (Required if there is a nested repeater)
                    // Specify the configuration of the nested repeaters.
                    // Nested configuration follows the same format as the base configuration,
                    // supporting options "defaultValues", "show", "hide", etc.
                    // Nested repeaters additionally require a "selector" field.
                    repeaters: [{
                        // (Required)
                        // Specify the jQuery selector for this nested repeater
                        selector: '.inner-repeater'
                    }],
                    show: function() {
                        // Get items count
                        var items_count = $('.repeater').repeaterVal().translations.length;
                        var current_index = items_count - 1;

                        /* Summernote */
                        // Update the textarea id
                        $(this).find('.note-editor').remove(); // Remove repeated summernote
                        $(this).find('.description').attr('id', 'description-' + current_index);

                        $('#description-' + current_index).summernote({
                            imageTitle: {
                                specificAltField: true,
                            },
                            popover: {
                                image: [
                                    ['imagesize', ['imageSize100', 'imageSize50',
                                        'imageSize25']],
                                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                                    ['remove', ['removeMedia']],
                                    ['custom', ['imageTitle']],
                                ],
                            },
                            height: '300px',
                        });

                        // Showing the item
                        $(this).show();
                    }
                });
                $('#description-' + '0').summernote({
                        imageTitle: {
                            specificAltField: true,
                        },
                        popover: {
                            image: [
                                ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                                ['float', ['floatLeft', 'floatRight', 'floatNone']],
                                ['remove', ['removeMedia']],
                                ['custom', ['imageTitle']],
                                ['mybutton', ['myVideo']] // custom button
                            ],
                            height: '300px',
                            buttons: {
                                myVideo: function(context) {
                                    var ui = $.summernote.ui;
                                    var button = ui.button({
                                        contents: '<i class="fa fa-video-camera"/>',
                                        tooltip: 'video',
                                        click: function() {
                                            var div = document.createElement('div');
                                            div.classList.add('embed-container');
                                            var iframe = document.createElement('iframe');
                                            iframe.src = prompt('Enter video url:');
                                            iframe.setAttribute('frameborder', 0);
                                            iframe.setAttribute('width', '100%');
                                            iframe.setAttribute('allowfullscreen', true);
                                            div.appendChild(iframe);
                                            context.invoke('editor.insertNode', div);
                                        }
                                    });

                                    return button.render();
                                }
                            },
                        }});
                    
                });
</script>
<script>
    // Initialize select picker for repeated items
    $("#repeater_btn").click(function() {
        setTimeout(function() {
            // $(".selectpicker").selectpicker('refresh');
        }, 100);
    });
</script>
