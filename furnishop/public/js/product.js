$(document).ready(function(){

    $(".bootstrap-touchspin-up").click(function(){
        quantity(1);
    });

    $(".bootstrap-touchspin-down").click(function(){
        quantity(-1);
    });

    $(".add-to-cart").click(addToCart);


})

function quantity(number = 0){

    let quantity = $("#quantity_wanted").val();

    quantity = Number(quantity) + number;

    if( Number.isNaN(quantity) || quantity < 1 || quantity > 100){
        quantity = 1;
    }

    $("#quantity_wanted").val(quantity);

    return quantity;
}

async function addToCart(){

    let dataObj = {};
    dataObj.quantity = quantity();
    dataObj.product_id = $(this).data("id");

    let result = await fetchData(cartStoreUrl, "post", dataObj);
    if(result.success){

        $("<p class='text-success m-3 pl-5 h6'>"+ result.message +"</p>")
            .insertAfter($(this).parent())
            .hide()
            .show(300)
            .delay(2000)
            .hide(300);
    }
    else {
        $("<p class='text-danger m-3 pl-5 h6'>"+ result.message +"</p>")
            .insertAfter($(this).parent())
            .hide()
            .show(300)
            .delay(2000)
            .hide(300);
    }


    quantity(-1000);

}
