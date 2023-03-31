var lowerStat = 0
var upperStat = 0
var numberStat = 0
var specialStat = 0
var lengthStat = 0
var pswConfirmStat = 0
var emailConfirmStat = 0
var phoneConfirmStat = 0
var emailStat = 0
var pswInput = document.getElementById("password")
var pswConfirmation = document.getElementById("password_confirmation")
var letter = document.getElementById("letter")
var capital = document.getElementById("capital")
var number = document.getElementById("number")
var special = document.getElementById("special")
var length = document.getElementById("length")
var firstname = document.getElementById("firstname")
var lastname = document.getElementById("lastname")
var birthdate = document.getElementById("birthdate")
var mothersname = document.getElementById("mothers_name")
var email = document.getElementById("email_registration")
var emailConfirmation = document.getElementById("email_confirmation")
var phone = document.getElementById("phone_number")
var phoneConfirmation = document.getElementById("phone_number_confirmation")
var street = document.getElementById("street_address")
var city = document.getElementById("city")
var postal = document.getElementById("postal_code")
var country = document.getElementById("country")

emailConfirmation.onpaste = e => {
    e.preventDefault();
    return false;
};

phoneConfirmation.onpaste = e => {
    e.preventDefault();
    return false;
};

pswConfirmation.onpaste = e => {
    e.preventDefault();
    return false;
};

$('#psw-tooltip').click(function () {
    $('[data-bs-toggle="tooltip"]').tooltip('show')
})

$('#psw-tooltip').focusout(function () {
    $('[data-bs-toggle="tooltip"]').tooltip('hide')
})


//  Remove error message
$('#firstname, #lastname, #mothers_name, #birthdate, #email_registration, #password, #phone_number, #street_address, #city, #postal_code').keyup(function () {
    if ($(this).val() != '') {
        if ($(this).attr('id') == 'firstname') {
            textOnly('firstname', 'First name')
        } else if ($(this).attr('id') == 'lastname') {
            textOnly('lastname', 'Last name')
        } else if ($(this).attr('id') == 'mothers_name') {
            textOnly('mothers_name', 'Mother\'s name')
        } else if ($(this).attr('id') == 'phone_number') {
            numberOnly('phone_number', 'Phone number')
            $('#phone_number_group').css('border', '1px solid #ced4da')
        } else if ($(this).attr('id') == 'password') {
            $(this).parent().parent().next().hide()
            $('#password_group').css('border', '1px solid #ced4da')
        } else if ($(this).attr('id') == 'email_registration') {
            $(this).css('border', '1px solid #ced4da')
            $(this).next().hide()
            $('#email_error').hide()
        } else {
            $(this).css('border', '1px solid #ced4da')
            $(this).next().hide()
        }
    }
})

$('#birthdate').change(function () {
    if ($(this).val() != '') {
        $(this).css('border', '1px solid #ced4da')
        $('#birthdate_message').hide()
    }
})

$('#country').change(function () {
    if ($(this).val() != '') {
        $('.select2-container--default, .select2-selection--single').css('border', '1px solid #ced4da')
        $('#country_message').hide()
    }
})


// Email Input rules
email.onkeyup = function () {
    var validEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (email.value.match(validEmail)) {
        emailStat = 1
    } else {
        emailStat = 0
    }

    if (email.value != emailConfirmation.value) {
        emailConfirmStat = 0
        $('#email_confirmation').css('border', '1px solid red')
        $('#emailconfirm_message span').html('Email do not match')
        $('#emailconfirm_message').show()
    } else {
        emailConfirmStat = 1
        $('#email_confirmation').css('border', '1px solid #ced4da')
        $('#emailconfirm_message').hide()
    }
}

// When the user clicks outside of the password field, hide the message box
//pswInput.onblur = function() {
//    document.getElementById("message").style.display = "none";
//}

// Password Input rules
pswInput.onkeyup = function () {
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g
    if (pswInput.value.match(lowerCaseLetters)) {
        lowerStat = 1
        //letter.classList.remove("invalid")
        //letter.classList.add("valid")
    } else {
        lowerStat = 0
        //letter.classList.remove("valid")
        //letter.classList.add("invalid")
    }

    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g
    if (pswInput.value.match(upperCaseLetters)) {
        upperStat = 1
        //capital.classList.remove("invalid")
        //capital.classList.add("valid")
    } else {
        upperStat = 0
        //capital.classList.remove("valid")
        //capital.classList.add("invalid")
    }

    // Validate numbers
    var numbers = /[0-9]/g
    if (pswInput.value.match(numbers)) {
        numberStat = 1
        //number.classList.remove("invalid")
        //number.classList.add("valid")
    } else {
        numberStat = 0
        //number.classList.remove("valid")
        //number.classList.add("invalid")
    }

    // Validate special character
    var specials = /[-'/`~!#*$@_%+=.,^&(){}[\]|;:”<>?\\]/g
    if (pswInput.value.match(specials)) {
        specialStat = 1
        //special.classList.remove("invalid")
        //special.classList.add("valid")
    } else {
        specialStat = 0
        //special.classList.remove("valid")
        //special.classList.add("invalid")
    }

    // Validate length
    if (pswInput.value.length >= 8) {
        lengthStat = 1
        //length.classList.remove("invalid")
        //length.classList.add("valid")
    } else {
        lengthStat = 0
        //length.classList.remove("valid")
        //length.classList.add("invalid")
    }

    if (pswInput.value != pswConfirmation.value) {
        pswConfirmStat = 0
        $('#password_confirmation_group').css('border', '1px solid red')
        $('#pswconfirm_message span').html('Password do not match')
        $('#pswconfirm_message').show()
    } else {
        pswConfirmStat = 1
        $('#password_confirmation_group').css('border', '1px solid #ced4da')
        $('#pswconfirm_message').hide()
    }
}


// Password Confirmation match validation
pswConfirmation.onkeyup = function () {
    if (pswInput.value != pswConfirmation.value) {
        pswConfirmStat = 0
        $('#password_confirmation_group').css('border', '1px solid red')
        $('#pswconfirm_message span').html('Password do not match')
        $('#pswconfirm_message').show()
    } else {
        pswConfirmStat = 1
        $('#password_confirmation_group').css('border', '1px solid #ced4da')
        $('#pswconfirm_message').hide()
    }
}

// Email Confirmation match validation
emailConfirmation.onkeyup = function () {
    if (email.value != emailConfirmation.value) {
        emailConfirmStat = 0
        $('#email_confirmation').css('border', '1px solid red')
        $('#emailconfirm_message span').html('Email do not match')
        $('#emailconfirm_message').show()
    } else {
        emailConfirmStat = 1
        $('#email_confirmation').css('border', '1px solid #ced4da')
        $('#emailconfirm_message').hide()
    }
}


// Phone Number Confirmation match validation
phoneConfirmation.onkeyup = function () {
    if (phone.value != phoneConfirmation.value) {
        phoneConfirmStat = 0
        $('#phone_confirmation_group').css('border', '1px solid red')
        $('#phoneconfirm_message span').html('Phone number do not match')
        $('#phoneconfirm_message').show()
    } else {
        phoneConfirmStat = 1
        $('#phone_confirmation_group').css('border', '1px solid #ced4da')
        $('#phoneconfirm_message').hide()
    }
}

phone.onkeyup = function () {
    if (phone.value != phoneConfirmation.value) {
        phoneConfirmStat = 0
        $('#phone_confirmation_group').css('border', '1px solid red')
        $('#phoneconfirm_message span').html('Phone number do not match')
        $('#phoneconfirm_message').show()
    } else {
        phoneConfirmStat = 1
        $('#phone_confirmation_group').css('border', '1px solid #ced4da')
        $('#phoneconfirm_message').hide()
    }
}


// Remove red border on password input field
$('#password').keyup(function () {
    if (lowerStat == 1 && upperStat == 1 && numberStat == 1 && specialStat == 1 && lengthStat ==
        1) {
        $(this).css('border', '1px solid #ced4da')
    }
})


// Password Visibility feature
let icon = ''

$('#button-visible1').click(function () {
    if ($('#password').is('input[type="password"]')) {
        icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16"><path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/><path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/></svg>'
        $('#password').attr('type', 'text')
        $(this).html(icon)
    } else {
        icon = '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16"><path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" /><path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" /></svg>'
        $('#password').attr('type', 'password')
        $(this).html(icon)
    }
})

$('#button-visible2').click(function () {
    if ($('#password_confirmation').is('input[type="password"]')) {
        icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16"><path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/><path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/></svg>'
        $('#password_confirmation').attr('type', 'text')
        $(this).html(icon)
    } else {
        icon = '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16"><path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" /><path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" /></svg>'
        $('#password_confirmation').attr('type', 'password')
        $(this).html(icon)
    }
})


// Terms and Conditions check 
$('#terms-button').click(function () {
    if (!$('#terms-check').is(':checked')) {
        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1).toString().padStart(2, 0)+'-'+today.getDate().toString().padStart(2, 0);
        var time = today.getHours().toString().padStart(2, 0) + ":" + today.getMinutes().toString().padStart(2, 0) + ":" + today.getSeconds().toString().padStart(2, 0);
        var dateTime = date+' '+time;
        $('#terms-date').val(dateTime)
        $('#terms_message').hide()
    }
    $('#terms-check').prop('checked', true)
})

$('#policy-button').click(function () {
    if (!$('#policy-check').is(':checked')) {
        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1).toString().padStart(2, 0)+'-'+today.getDate().toString().padStart(2, 0);
        var time = today.getHours().toString().padStart(2, 0) + ":" + today.getMinutes().toString().padStart(2, 0) + ":" + today.getSeconds().toString().padStart(2, 0);
        var dateTime = date+' '+time;
        $('#policy-date').val(dateTime)
        $('#policy_message').hide()
    }
    $('#policy-check').prop('checked', true)
})


// Terms checked
$('#terms-check').change(function(){
    if ($('#terms-check').is(':checked')) {
        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1).toString().padStart(2, 0)+'-'+today.getDate().toString().padStart(2, 0);
        var time = today.getHours().toString().padStart(2, 0) + ":" + today.getMinutes().toString().padStart(2, 0) + ":" + today.getSeconds().toString().padStart(2, 0);
        var dateTime = date+' '+time;
        $('#terms-date').val(dateTime)
        $('#terms_message').hide()
    }
})

// Policy checked
$('#policy-check').change(function(){
    if ($('#policy-check').is(':checked')) {
        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1).toString().padStart(2, 0)+'-'+today.getDate().toString().padStart(2, 0);
        var time = today.getHours().toString().padStart(2, 0) + ":" + today.getMinutes().toString().padStart(2, 0) + ":" + today.getSeconds().toString().padStart(2, 0);
        var dateTime = date+' '+time;
        $('#policy-date').val(dateTime)
        $('#policy_message').hide()
    }
})

// Marketing checked
$('#marketing-check').change(function(){
    if ($('#marketing-check').is(':checked')) {
        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1).toString().padStart(2, 0)+'-'+today.getDate().toString().padStart(2, 0);
        var time = today.getHours().toString().padStart(2, 0) + ":" + today.getMinutes().toString().padStart(2, 0) + ":" + today.getSeconds().toString().padStart(2, 0);
        var dateTime = date+' '+time;
        $('#marketing-date').val(dateTime)
    }
})


// Register Form validation
$('#register-form').submit(function () {
    if (firstname.value == '' || lastname.value == '' || birthdate.value == '' || email.value == '' || pswInput.value == '' || phone.value == '' || mothersname.value == '' || street.value == '' || city.value == '' || postal.value == '' || country.value == '' || emailStat == 0 || emailConfirmation.value == '' || phoneConfirmation == '' || pswConfirmation.value == '') {
        if (firstname.value == '') {
            $('#firstname').css('border', '1px solid red')
            $('#firstname_message span').html('Please fill out the firstname')
            $('#firstname_message').show()
        }
        if (lastname.value == '') {
            $('#lastname').css('border', '1px solid red')
            $('#lastname_message span').html('Please fill out the lastname')
            $('#lastname_message').show()
        }
        if (birthdate.value == '') {
            $('#birthdate').css('border', '1px solid red')
            $('#birthdate_message span').html('Please fill out the date of birth')
            $('#birthdate_message').show()
        }
        if (email.value == '') {
            $('#email_registration').css('border', '1px solid red')
            $('#email_registration_message span').html('Please fill out the email')
            $('#email_registration_message').show()
        }
        if (emailStat == 0) {
            $('#email_registration').css('border', '1px solid red')
            $('#email_registration_message span').html('Please input a valid email address')
            $('#email_registration_message').show()
        }
        if (emailConfirmation.value == '') {
            $('#email_confirmation').css('border', '1px solid red')
            $('#emailconfirm_message span').html('Please fill out the email confirmation')
            $('#emailconfirm_message').show()
        }
        if (pswInput.value == '') {
            $('#password_group').css('border', '1px solid red')
            $('#password_message span').html('Please fill out the password')
            $('#password_message').show()
        }
        if (pswConfirmation.value == '') {
            $('#password_confirmation_group').css('border', '1px solid red')
            $('#pswconfirm_message span').html('Please fill out the password confirmation')
            $('#pswconfirm_message').show()
        }
        if (phone.value == '') {
            $('#phone_number_group').css('border', '1px solid red')
            $('#phone_number_message span').html('Please fill out the phone number')
            $('#phone_number_message').show()
        }
        if (phoneConfirmation.value == '') {
            $('#phone_confirmation_group').css('border', '1px solid red')
            $('#phoneconfirm_message span').html('Please fill out the phone number confirmation')
            $('#phoneconfirm_message').show()
        }
        if (mothersname.value == '') {
            $('#mothers_name').css('border', '1px solid red')
            $('#mothers_name_message span').html('Please fill out the mother maiden name')
            $('#mothers_name_message').show()
        }
        if (street.value == '') {
            $('#street_address').css('border', '1px solid red')
            $('#street_address_message span').html('Please fill out the street address')
            $('#street_address_message').show()
        }
        if (city.value == '') {
            $('#city').css('border', '1px solid red')
            $('#city_message span').html('Please fill out the city')
            $('#city_message').show()
        }
        if (postal.value == '') {
            $('#postal_code').css('border', '1px solid red')
            $('#postal_code_message span').html('Please fill out the postal code')
            $('#postal_code_message').show()
        }
        if (country.value == '') {
            $('.select2-container--default, .select2-selection--single').css('border', '1px solid red')
            $('#country_message span').html('Please choose the country')
            $('#country_message').show()
        }
        $('html, body').animate({
            scrollTop: 0
        }, 'fast')
        $('#warningModal').modal('show')
        $('#warning-description').html('Please fill out the required fields')
        return false
    }
    if (lowerStat == 1 && upperStat == 1 && numberStat == 1 && specialStat == 1 && lengthStat ==
        1 && pswConfirmStat == 1) {
        if (emailConfirmStat == 1 && phoneConfirmStat == 1) {
            if ($('#terms-check').is(':checked') && $('#policy-check').is(':checked')) {
                return true
            } else {
                if(!$('#terms-check').is(':checked')) {
                    $('#terms_message').show()
                }
                if(!$('#policy-check').is(':checked')) {
                    $('#policy_message').show()
                }
                return false
            }
        } else {
            if (emailConfirmStat == 0) {
                $('html, body').animate({
                    scrollTop: $('#email_confirmation').offset().top - 200
                }, 'fast')
            }
            if (phoneConfirmStat == 0) {
                $('html, body').animate({
                    scrollTop: $('#phone_number_confirmation').offset().top - 200
                }, 'fast')
            }
            return false
        }
    } else {
        $('#password_group').css('border', '1px solid red')
        $('#password_message span').html('Please follow the password rules')
        $('#password_message').show()
        $('html, body').animate({
            scrollTop: $('#password').offset().top - 200
        }, 'fast')
        $('[data-bs-toggle="tooltip"]').tooltip('show')
        setTimeout(function () {
            $('[data-bs-toggle="tooltip"]').tooltip('hide')
        }, 5000)
        return false
    }
})


// API for Country and Phone Code
let cName = []
let pCode = []

$.ajax({
    url: 'https://restcountries.com/v2/all',
    contentType: "application/json",
    dataType: 'json',
    success: function (result) {
        result.forEach(function (o) {
            pCode.push({
                'code': o.callingCodes[0],
                'country': o.alpha3Code
            })
            cName.push(o.name)
        })
        $('#country').append(new Option('Choose your country', ''))
        cName.forEach(function (item, index) {
            $('#country').append(new Option(item, item))
        })
        /*
        for (let x = 0; x < pCode.length; x++) {
            $('#phone_code').append(new Option('(' + pCode[x]['country'] + ') +' +
                pCode[x][
                    'code'
                ],
                '+' + pCode[x]['code']))
        }
        */
    }
})

$(document).ready(function () {
    $('.select').select2()
})
