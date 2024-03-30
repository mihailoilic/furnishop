$(document).ready(function(){

    let initialCategory = $("#title-categories").data("initial-category");
    if(initialCategory){
        changeCategoryDisplay(initialCategory.id, initialCategory.parent_id)
    }
    else {
        changeCategoryDisplay();
    }

    getProducts()


    $(".cateItem").click(function(e){

        e.preventDefault()

        let categoryId = $(this).parent().attr("id").split("-")[1];
        let parentId = $(this).parent().data("parent") ??  null;

        changeCategoryDisplay(categoryId, parentId)

        getProducts()

    })

    $("#keywords, [name=collections], [name=colors], #sort-products").on("input", getProducts)




})
function changeCategoryDisplay(categoryId = "", parentCategoryId = null){

    $(".cateTitle").not(`[id=category-${parentCategoryId}]`).children(".arrow.collapse-icons[aria-expanded=true]").click();

    if(!categoryId){
        window.history.pushState({}, "", "/shop");
    }
    else{
        window.history.pushState({}, "", "/category/"+categoryId);

    }



    let elementId = `#category-${categoryId} > a`;

    if(parentCategoryId){
        $(`#category-${parentCategoryId} .arrow.collapse-icons[aria-expanded=false]`).click();

    }

    $(".cateTitle .cateItem.active").removeClass("active");
    $(elementId).addClass("active");


}

function getFiltersObj(){

    let dataObj = {};

    let keywords = $("#keywords").val()
    if(keywords) { dataObj.keywords = keywords }

    let collections = $("[name=collections]:checked")
        .map(function(){
            return Number($(this).val())
        })
        .get()
    if(collections.length) { dataObj.collections = collections }

    let colors = $("[name=colors]:checked")
        .map(function(){
            return Number($(this).val())
        })
        .get()
    if(colors.length) { dataObj.colors = colors }

    let sort = $("#sort-products").val();
    if(sort){
        dataObj.sort = sort;
    }

    return dataObj


}

async function getProducts(){

    let url = baseUrl + "/shop";

    let category = null;
    let activeCategoryLink = $(".cateTitle .cateItem.active");

    if(activeCategoryLink.length){
        let categoryIdAttr = $(activeCategoryLink).parent().attr("id");
        category = categoryIdAttr.split("-")[1];
        if(category){
            url = baseUrl + "/category/"+category;
        }
    }


    try {

        $("#product-grid").html("");
        $("#products-loader").show();
        $(".pagination").addClass("d-none");


        data.products = await fetchData(url, "get", getFiltersObj());

        $("#products-loader").hide();

        showProducts()
        createPageLinks()
        $(".total-products p").text(`THERE ARE ${data.products.total} PRODUCTS`);
    }
    catch(ex){
        console.log(ex);
    }

}

function showProducts(){
    let html = "";

    if(data.products.data.length == 0){
        html = "<p class='not-found w-100 p-5 mt-5 text-muted h5 text-center'>No products found &nbsp; =(</p>"
    }

    for(let product of data.products.data){

        let img1 = product.images[0].thumbnail_filename;
        let img2 = product.images[1] ? product.images[1].thumbnail_filename : img1;

        let productLink = productRoute.substr(0, productRoute.length-1) + product.id;


        html += `<div class="item text-center col-md-4">
                    <div class="product-miniature js-product-miniature item-one first-item">
                        <div class="thumbnail-container border">
                            <a href="${productLink}">

                                <img class="img-fluid image-cover" src="${imgDir + img1}" alt="${product.name}">


                                <img class="img-fluid image-secondary" src="${imgDir + img2}" alt="${product.name}">

                            </a>
                        </div>
                        <div class="product-description">
                            <div class="product-groups">
                                <div class="product-title">
                                    <a href="${productLink}">${product.name}</a>
                                </div>
                                <div class="product-group-price">
                                    <div class="product-price-and-shipping">
                                        <span class="price">$${product.price}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;

    }

    $("#product-grid").html(html);

}

function createPageLinks(){

    if(data.products.data.length  == 0){

        $(".pagination").addClass("d-none");
        return
    }


    let html = "";
    for(let i = 1; i<=data.products.last_page; i++){
        html += `<li ${i == data.products.current_page ? "class='active'" : ""}>
                    <a rel="nofollow" href="#!" data-page="${i}" class="page-link-action disabled js-search-link ">
                        ${i}
                    </a>
                </li>`;
    }
    $(".pagination").removeClass("d-none");
    $(".page-list ul").html(html);
    $(".page-link-action").click(getPage);
}

async function getPage(){

    let pageNo = $(this).data("page");

    $("html").animate({
        scrollTop: $("header").offset().top
    }, 300);

    let dataObj = getFiltersObj()
    dataObj.page = pageNo

    $("#product-grid").html("");
    $("#products-loader").show();
    $(".pagination").addClass("d-none");

    data.products = await fetchData(data.products.path, "get", dataObj);

    $("#products-loader").hide();

    showProducts()
    createPageLinks()

}
