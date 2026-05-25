jQuery(function ($) {

    let mediaFrame;

    $(document).on('click', '.fms-upload-image', function (e) {
        e.preventDefault();

        const wrapper = $(this).closest('p');
        const imageField = wrapper.find('.fms-image-id');
        const preview = wrapper.find('.fms-image-preview');

        // Une seule instance stable
        mediaFrame = wp.media({
            title: 'Choisir une image',
            button: {
                text: 'Utiliser cette image'
            },
            multiple: false
        });

        mediaFrame.on('select', function () {
            const attachment = mediaFrame
                .state()
                .get('selection')
                .first()
                .toJSON();

            imageField.val(attachment.id);

            preview.html(
                '<img src="' + attachment.url + '" style="max-width:150px;height:auto;" />'
            );

            mediaFrame.close();
        });

        mediaFrame.open();
    });


    $(document).on('click', '.fms-remove-image', function (e) {
        e.preventDefault();

        const wrapper = $(this).closest('p');

        wrapper.find('.fms-image-id').val('');
        wrapper.find('.fms-image-preview').html('');
    });

});
