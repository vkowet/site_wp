jQuery(document).ready(function ($) {

    let frame;

    $(document).on('click', '.fms-upload-image', function (e) {
        e.preventDefault();

        const wrapper = $(this).closest('p');
        const imageField = wrapper.find('.fms-image-id');
        const preview = wrapper.find('.fms-image-preview');

        frame = wp.media({
            title: 'Choisir une image',
            button: {
                text: 'Utiliser cette image'
            },
            multiple: false
        });

        frame.off('select');

        frame.on('select', function () {
            const attachment = frame.state().get('selection').first().toJSON();

            imageField.val(attachment.id);

            preview.html(
                '<img src="' + attachment.url + '" style="max-width:150px;height:auto;" />'
            );
        });

        frame.open();
    });

    $(document).on('click', '.fms-remove-image', function (e) {
        e.preventDefault();

        const wrapper = $(this).closest('p');
        const imageField = wrapper.find('.fms-image-id');
        const preview = wrapper.find('.fms-image-preview');

        imageField.val('');
        preview.html('');
    });

});
