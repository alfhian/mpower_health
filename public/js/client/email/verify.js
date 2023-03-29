$('a').click(function(e) {
    e.preventDefault()
    var route = $(this).attr('href')
    $('#route').val(route)
    $('#force-logout-form').submit()
})