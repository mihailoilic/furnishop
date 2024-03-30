$(document).ready(function(){

    $(".bootstrap-touchspin-up").click(function(){

        changeQuantity($(this).data("target"), 1);
    });

    $(".bootstrap-touchspin-down").click(function(){
        changeQuantity($(this).data("target"),-1);
    });

    $(".qty-input").on("input", function(){
       changeQuantity(`#${$(this).attr("id")}`);
    });

    $(".remove-from-cart").click(removeFromCart);



})

function changeQuantity(element, number = 0){

    let quantity = $(element).val();
    let oldQuantity = quantity;

    quantity = Number(quantity) + number;

    if( Number.isNaN(quantity) || quantity < 1){
        quantity = 1;
    }

    $(element).val(quantity);

    updateCart(element, quantity);
    updateTotal();
}

async function updateCart(element, quantity){

    let id = Number(element.split("-")[1]);
    let url = cartUpdateRoute.substr(0,cartUpdateRoute.length-1) + id;


    let dataObj = {
        id: id,
        quantity: quantity
    }

    let result = await fetchData( url,"put", dataObj);

    if(!result.success){
        $(`<p class="text-danger m-3 h6">${result.message}</p>`)
            .insertAfter($(element).parent().parent().parent());
    }



}

async function removeFromCart(){

    let id = Number($(this).data("id"));
    let url = cartDestroyRoute.substr(0,cartDestroyRoute.length-1) + id;


    let result = await fetchData( url,"delete");

    if(!result.success){
        $(`<p class="text-danger m-3 h6">${result.message}</p>`)
            .insertAfter($(this).parent().parent().parent());
    }
    else {
        $(this).parents(".cart-item").remove();
        if($(".cart-items").html().trim() == ""){
            $(".cart-items").html(`<p class="text-muted">Your cart is empty.</p>`);
        }
    }

    updateTotal()



}

function updateTotal(){

    let total = 0;

    $(".cart-item").each(function(){

        let price =Number($(this).find(".price-label").text().substr(1));
        let qty = Number($(this).find(".qty-input").val());
        let productTotal = price * qty;
        $(this).find(".product-price.total").text("$"+productTotal);
        total += productTotal;
    })

    $("#total-all").text("$"+total);
    $("#total-products").text("$"+total);
    $(".summary-label").text("There are " + $(".cart-item").length + " items in your cart");



}
