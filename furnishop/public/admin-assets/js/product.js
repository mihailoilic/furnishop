const data = {
    forms: {}
}

$(document).ready(function(){

    loadRegularExpressions();
    $("form").submit(validateProductForm);

    $("#add-image").click(addImage);
    $(document).on("click", ".remove-image", removeImage);

    window.categories = $("#subcategories").data("categories");

    fillSubcategories();
    $("#add-subcat").click(addSubcategory);
    $(document).on("click", ".remove-subcat", removeSubcategory);

    $("#images-wrapper").hide();
    $("#change_images").change(function(){
       if(this.checked){
            $("#images-wrapper").stop().show(300);
       }
       else{
            $("#images-wrapper").stop().hide(300);
       }
    });


})

function addImage(){
    $(`
        <div class="js-image my-5">
            <input type="file" name="images[]">
            <a href="#!" class="ml-3 remove-image text-danger">
                <i class="pe-7s-less"></i>Remove image
            </a>
        </div>
    `).appendTo("#js-images");

}
function removeImage(){
    $(this).parent().remove();
}

function prepareSubcategoryHtml(selected = 0){

    let selectHtml = `<div><select name="subcategories[]" class="form-control mt-3">`;

    for(let cat of categories){
        selectHtml += `<optgroup label="${cat.name}">`;
            for(let sub of cat.subcategories){
                selectHtml += `<option value="${sub.id}"
                            ${sub.id == selected ? "selected" : ""}>${sub.name}</option>`;
            }
            selectHtml += `</optgroup>`;
    }

    selectHtml += `</select>`;

    return selectHtml;


}

function addSubcategory(withRemove = true, selected = 0){

    let html = prepareSubcategoryHtml(selected);

    if(withRemove) {

        html += `<a href="#!" class="text-danger remove-subcat">
                    <i class="pe-7s-less"></i>Remove subcategory
                </a>`;
    }

    $(html + "</div>").appendTo("#subcategories");


}

function removeSubcategory(){
    $(this).parent().remove();
}

function fillSubcategories(){
    let subcats = $("#subcategories").data("selected").toString();
    console.log(subcats)
    subcats = subcats.split(",");


    let first = true;
    for(let cat of subcats){
        if(first){
            addSubcategory(false, cat);
            first = false;
        }
        else {
            addSubcategory(true, cat);
        }
    }

}



function loadRegularExpressions(){
    data.forms.name = {
        "regex" : /^.{4,30}$/,
        "length": 30,
        "message": "Name must be at least 4 characters long."
    };
    data.forms.description = {
        "regex" : /^.{20,300}$/,
        "length": 300,
        "message": "Description must be at least 20 characters long."
    };
    data.forms.price = {
        "regex" : /^\d+$/,
        "length": 50,
        "message": "Use only digits."
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



function validateProductForm(e){


    data.forms.error = false;
    resetFormMessages();

    let name = $("[name=name]");
    let price = $("[name=price]");
    let description = $("[name=description]");

    validateElement(name, data.forms.name);
    validateElement(price, data.forms.price);
    validateElement(description, data.forms.description);

    if(!$("#colors input:checked").length){
        formError($("#colors"), "You must check at least one color.");
    }

    if(!$("#first-file")[0].files.length){
        formError($("#first-file"), "First image field must not be empty.");
    }

    if(data.forms.error){
        e.preventDefault();
    }

}
