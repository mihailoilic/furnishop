$(document).ready(function(){

    prepareInput();

    $(".add-pin").click(addPin);

    $(".pin-circle").hide();
    $(document).on("click", ".check-pin", showPinCircle);
    $(document).on("click",".remove-pin", removePin);

    $(document).on("input",".product, .pos-x, .pos-y", prepareInput);

    $("#update-form").submit(function(e){
        validate(e);
    });


})
function showPinCircle(){

    let x = Number($(this).parents(".product-pin").find(".pos-x").val());
    let y = Number($(this).parents(".product-pin").find(".pos-y").val());

    $(".pin-circle")
        .css({
            "left": `${x}%`,
            "top": `${y}%`
        })
        .stop(true, true)
        .fadeIn("fast")
        .delay(3000)
        .fadeOut("fast");

    $("html").animate({
        scrollTop: $("#idea-image").offset().top
    }, 200);

}

function addPin(){
    let html = `
            <div class="product-pin col-md-12 mt-5">

                <input type="hidden" class="final-input" name="pins[]" value=""/>

                <div>
                    <label>Left:</label>
                    <input type="number"  value="" min="1" max="99" class="pos-x form-control">
                    <span class="text-muted h4">%</span>

                    <label class="ml-5">Top:</label>
                    <input type="number" value="" min="1" max="99" class="pos-y form-control">
                    <span class="text-muted h4">%</span>


                    <label class="ml-5">product id:</label>
                    <input type="text" class="form-control product"/>
                </div>
                <div class="mt-3">
                    <a href="#!" class="check-pin btn btn-fill btn-info">Check coordinates</a>
                    <a href="#!" class="btn btn-fill btn-danger remove-pin ml-5">
                        <i class="pe-7s-less"></i> Remove pin
                    </a>
                </div>
                <div class="mt-3">
                </div>
            </div>`;

        $(html).appendTo($("#pins"));

}

function removePin(){
    $(this).parents(".product-pin").remove();
}

function prepareInput(){

    $(".product-pin").each(function(){

        let x = Number($(this).find(".pos-x").val());
        let y = Number($(this).find(".pos-y").val());

        if(Number.isNaN(x)){
            $(this).find(".pos-x").val("");
        }
        if(x < 0 || x > 99){
            $(this).find(".pos-x").val(x < 0 ? "1" : "99");

        }
        if(Number.isNaN(y)){
            $(this).find(".pos-y").val("");
        }
        if(y < 0 || y > 99){
            $(this).find(".pos-y").val(y < 0 ? "1" : "99");

        }

        x = $(this).find(".pos-x").val();
        y = $(this).find(".pos-y").val();
        let product = $(this).find(".product").val();

        $(this).find(".final-input").val(`${x},${y},${product}`);

    });

}

function validate(e){

    $(".pos-x, .pos-y, .product").each(function(){


        if($(this).val() == "" || $(this).val() == "0"){
            e.preventDefault();
            $(this).addClass("form-error-border");
        }
        else {
            $(this).removeClass("form-error-border");
        }


    });

}




