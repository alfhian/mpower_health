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