window.data = {
    forms: {}
}

function fetchData(url, method, data = {}){

    return new Promise((resolve,reject)=>{

        $.ajax({
            url: url,
            method: method,
            dataType: "json",
            data: data,
            success: resolve,
            error: reject,
            cache: false
        })
    })
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function(){

    $("#page-preloader").fadeOut({duration: 200, queue:false});

    loadRegularExpressions();

    $(".login-form").submit(validateLoginForm);
    $("#customer-form").submit(validateRegistrationForm);
    $("#contact-form").submit(validateContactForm);



})

function loadRegularExpressions(){
    data.forms.name = {
        "regex" : /^\p{Uppercase_Letter}\p{Letter}{1,14}(\s\p{Uppercase_Letter}\p{Letter}{1,14}){0,2}$/u,
        "length": 20,
        "message": "All words must begin with a capital letter."
    };
    data.forms.email = {
        "regex" : /^[a-z]((\.|-|_)?[a-z0-9]){2,}@[a-z]((\.|-)?[a-z0-9]+){2,}\.[a-z]{2,6}$/i,
        "length": 50,
        "message": "Use only letters, numbers and symbols @.-_"
    };
    data.forms.password = {
        "regex" : /^(?=.*\p{Uppercase_Letter})(?=.*\p{Lowercase_Letter})(?=.*\d)(?=.{6,})/u,
        "length": 50,
        "message": "Password should be at least 6 characters long and contain at least one uppercase letter, one lowercase letter and one number"
    };
    data.forms.subject = {
        "regex" : /^.{5,50}$/u,
        "length": 50,
        "message": "Subject should have at least 5 characters."
    };
    data.forms.message = {
        "regex" : /^.{20,200}$/u,
        "length": 200,
        "message": "Message should have at least 20 characters."
    };

}
function validateString(string, validation){
    if(string == ""){
        return "empty";
    }
    if(string.length > validation.length){
        return "long";
    }
    if(!validation.regex.test(string)){
        return "incorrect";
    }
    return "valid";
}
function validateElement(element, validation){
    let fieldName = $(element).attr("placeholder");
    let fieldValidation = validateString($(element).val(), validation);
    if(fieldValidation == "empty"){
        formError(element, `Please input ${fieldName.toLowerCase()}.`);
    }
    if(fieldValidation == "long"){
        formError(element, `${fieldName} is too long. Maximum characters: ${validation.length}.`);
    }
    else if(fieldValidation == "incorrect"){
        formError(element, `${fieldName} is invalid. ${validation.message}`);
    }
}
function formError(element, message){
    $(`<p class="form-error small text-danger mt-1">${message}</p>`).insertAfter($(element));
    data.forms.error = true;
}
function resetFormMessages(){
    $(".form-error").remove();
    $(".form-success").remove();
}



function validateLoginForm(e){


    data.forms.error = false;
    resetFormMessages();

    let email = $("[name=email]");
    let password = $("[name=password]");

    validateElement(email, data.forms.email);
    validateElement(password, data.forms.password);

    if(data.forms.error){
       e.preventDefault();
    }

}

function validateRegistrationForm(e){


    data.forms.error = false;
    resetFormMessages();

    let first = $("[name=firstname]");
    let last = $("[name=lastname]");
    let email = $("[name=email]");
    let password = $("[name=password]");

    validateElement(first, data.forms.name);
    validateElement(last, data.forms.name);
    validateElement(email, data.forms.email);
    validateElement(password, data.forms.password);

    if(data.forms.error){
        e.preventDefault();
    }

}
function validateContactForm(e){


    data.forms.error = false;
    resetFormMessages();

    let name = $("[name=name]");
    let email = $("[name=email]");
    let subject = $("[name=subject]");
    let message = $("[name=message]");

    validateElement(name, data.forms.name);
    validateElement(email, data.forms.email);
    validateElement(subject, data.forms.subject);
    validateElement(message, data.forms.message);

    if(data.forms.error){
        e.preventDefault();
    }

}
