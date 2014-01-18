$(function() {
    $('#authtoken-role, #user-role').change(function() {
        $('#authtoken-section, #user-section')[$(this).val() == 'editor' ? 'show' : 'hide']();
    }).change();
    $('input[name="document[visual]"]').change(function() {
        $('#document-photographer-id-wrapper')[$('input[name="document[visual]"]:checked').val() == 'photo' ? 'show' : 'hide']();
    }).change();
    $('input[name="document[visual]"]').change(function() {
        $('#document-illustrator-id-wrapper')[$('input[name="document[visual]"]:checked').val() == 'illustration' ? 'show' : 'hide']();
    }).change();
    $('.ops h5 a').click(function() { window.location = $(this).attr('href'); });
    $.editors = function(editors, editor_id) {
        $('#document-section').change(function() {
            $('#document-editor_id').empty();
            for (i in editors[$(this).val()]) {
                var o = $('<option>').attr('value', i).text(editors[$(this).val()][i]);
                if (i == editor_id) {
                    o.attr('selected', 'selected');
                }
                $('#document-editor_id').append(o);
            }
        }).change();
    };
});

