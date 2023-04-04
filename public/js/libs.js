const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))


// Idle timer

var popupAutoLogOff = setTimeout(function(){
    $('#autoLogOffModal').modal('show')
}, 900000)

var idleLogOut = setTimeout(function(){
    $('#idle_log_out_form').submit()
}, 1800000)

$('#stay').click(function() {
    clearTimeout(popupAutoLogOff)
    $('#autoLogOffModal').modal('hide')

    clearTimeout(idleLogOut)

    popupAutoLogOff = setTimeout(function(){
        $('#autoLogOffModal').modal('show')
    }, 900000)

    idleLogOut = setTimeout(function(){
        $('#idle_log_out_form').submit()
    }, 1800000)
})


// Number Only validation
function numberOnly(id, title) {
    var letters = /[a-zA-Z ']/g
    value = $('#' + id).val()
    if (value.match(letters)) {
        $('#' + id).val(value.replace(/[^0-9\.]/g, ''))
        $('#' + id + '_message span').html(title +' must contain numeric')
        $('#' + id + '_message').show()
    } else {
        $('#' + id + '_message').hide()
        $('#' + id).css('border', '1px solid #ced4da')
    }
}

// Text Only validation
function textOnly(id, title) {
    var numbers = /[0-9-/`~!#*$@_%+=.,^&(){}[\]|;:"<>?\\]/g
    value = $('#' + id).val()
    if (value.match(numbers)) {
        $('#' + id).val(value.replace(/[^a-zA-Z ']/g, ''))
        $('#' + id + '_message span').html(title +' must contain alphabetical')
        $('#' + id + '_message').show()
    } else {
        $('#' + id + '_message span').html('')
        $('#' + id + '_message').hide()
        $('#' + id).css('border', '1px solid #ced4da')
    }
}

/*
$(window).on('load', function(){ 
    setTimeout(function(){
        $('#message-alert').fadeOut()
    }, 2000)
 })
 */


// Upload Lab Result validation
let filename = ''
let ext = ''
let warning = ''

$('#upload-lab-result-form').submit(function() {
    //if ($('#policy-check').is(':checked')) {
        filename = $('#lab-result').val().replace(/^.*?([^\\\/]*)$/, '$1')
        ext = filename.replace(/^.*\./, '')
        if (ext != 'pdf' && ext != 'jpg' && ext != 'png') {
            warning = 'File type must be <b>PDF, JPG or PNG</b>'
            $('#uploadLabResultModal').modal('hide')
            $('#warningModal').modal('show')
            $('#warning-description').html(warning)
            $('#close-warning').attr('href', '#uploadLabResultModal')
            return false
        } else {
            if ($('#lab-result')[0].files[0].size > 2097152) {
                warning = 'File size cannot be more than <b>2 Mb</b>!'
                $('#uploadLabResultModal').modal('hide')
                $('#warningModal').modal('show')
                $('#warning-description').html(warning)
                $('#close-warning').attr('href', '#uploadLabResultModal')
                return false
            } else {
                return true
            }
        }
    /*} else {
        warning = 'Please read the <b>Terms and Conditions</b> and <b>Privacy Policy</b> before upload your lab results.'
        $('#uploadLabResultModal').modal('hide')
        $('#warningModal').modal('show')
        $('#warning-description').html(warning)
        $('#close-warning').attr('href', '#uploadLabResultModal')
        return false
    }*/
})


// Popup Modal for option
function showOption(form, action) {
    $('#action-text').html(action)
    $('#optionModal').modal('show')
    $('#option-yes').click(function() {
        $('#'+form).submit()
    })
}

