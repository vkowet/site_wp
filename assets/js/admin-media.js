jQuery(document).ready(function ($) {

    let mediaUploader;

    $(document).on('click', '.fms-upload-image', function (e) {
        e.preventDefault();

        const wrapper = $(this).closest('.fms-image-field');
        const input = wrapper.find('.fms-image-id');
        const preview = wrapper.find('.fms-image-preview');

        mediaUploader = wp.media({
            title: 'Choisir une image',
            button: {
                text: 'Utiliser cette image'
            },
            multiple: false
        });

        mediaUploader.on('select', function () {
            const attachment = mediaUploader.state().get('selection').first().toJSON();

            input.val(attachment.id);

            preview.html(
                '<img src="' + attachment.url + '" style="max-width:150px;height:auto;">'
            );
        });

        mediaUploader.open();
    });

    $(document).on('click', '.fms-remove-image', function (e) {
        e.preventDefault();

        const wrapper = $(this).closest('.fms-image-field');

        wrapper.find('.fms-image-id').val('');
        wrapper.find('.fms-image-preview').html('');
    });

});
