function submitForgotPassword(route) {
    userEmail = $('#email').val()
    if (userEmail == '') {
        warning = 'Please fill in your email'
        $('#warningModal').modal('show')
        $('#warning-description').html(warning)
        return false
    }
    $.get(route + '/' + userEmail, function (status) {
        if (status == true) {
            $('form').submit()
        } else {
            warning = 'You have reset your password 5 times. Contact the admin to request a password reset'
            $('#warningModal').modal('show')
            $('#warning-description').html(warning)
        }
    })
};
