jQuery(document).ready(function ($) {

    $('.fms-upload-image').on('click', function (e) {
        e.preventDefault();

        const button = $(this);
        const imageField = button.prev('.fms-image-id');
        const preview = button.siblings('.fms-image-preview');

        const frame = wp.media({
            title: 'Choisir une image',
            button: {
                text: 'Utiliser cette image'
            },
            multiple: false
        });

        frame.on('select', function () {
            const attachment = frame.state().get('selection').first().toJSON();

            imageField.val(attachment.id);

            preview.html(
                '<img src="' + attachment.url + '" style="max-width:150px;height:auto;" />'
            );
        });

        frame.open();
    });

    $('.fms-remove-image').on('click', function (e) {
        e.preventDefault();

        const button = $(this);
        const imageField = button.siblings('.fms-image-id');
        const preview = button.siblings('.fms-image-preview');

        imageField.val('');
        preview.html('');
    });

});
