let modalButtonfifth = document.getElementsByClassName("add");
let modalFifth = document.querySelector(".modal-fifth");
// console.log(modalFifth);
let modalFifthClose = document.querySelector(".close-btn-fifth");
// console.log(modalFifthClose);

let productsNames = document.getElementsByClassName('catalogProduct__subtitle');
console.log(productsNames);

let productsPrices = document.getElementsByClassName('catalogProduct__price-bottom');
console.log(productsPrices);

if (typeof modalButtonfifth !== 'undefined' && modalButtonfifth != null) {
    Array.from(modalButtonfifth).forEach(function (item, index) {
        item.addEventListener("click", function () {
           
            modalFifth.innerHTML = '<div class="modal__wrapper"><div class="modal__header"><div class="modal__wrap__btn"><button onclick="closingButton()"><img src="/local/templates/bellos/images/icons/close.svg" alt="" class="close-btn-fifth"></button></div><div class="modal__wrap"><div class="modal-fifth__block"><h2 class="modal-fifth__subtitle">' + productsNames[index].innerHTML + '</h2></div><form class="modal__form"><p class="modal__text" style="font-family: DIN Condensed;">КОЛИЧЕСТВО</p><input class="modal__input modal__input__name" type="text" name="name" id="amount-input" oninput="getAmount(this)"><p class="modal__text" style="font-family: DIN Condensed;">ЦЕНА</p><div class="modal-fifth__price" style="font-family: DIN Condensed;">' + productsPrices[index].innerHTML + '</div><p class="modal__button modal__button__text" id="application-processing2" style="font-family: DIN Condensed;" onclick="addToCart(' + index + ')">ДОБАВИТЬ</p><div id="adding-result"></div></form></div></div></div>';
            modalFifth.style.display = "flex";
            
        });
    });
 
}

function closingButton() {
    modalFifth.style.display = "none";
}

modalFifth.addEventListener("click", function (event) {
if (event.target === modalFifth) {
    modalFifth.style.display = "none";
     document.querySelector("#adding-result").innerHTML = '';
}
});

function addToCart(index) {

    $.post(
        "/catalog/ajax/addProductFromCatalog.php",
        {
            name: productsNames[index].innerHTML,
            price: productsPrices[index].innerHTML,
            amount: document.getElementById("amount-input").value
        },
        function (response) {
            resultData = JSON.parse(response);
            if (resultData['status'] == 'success_catalog'){
                document.querySelector("#adding-result").innerHTML = '<div style="color: green; font-family: DIN Condensed; font-size: 20px;">Товар добавлен</div>';
            } else {
                document.querySelector("#adding-result").innerHTML = '<div style="color: red; font-family: DIN Condensed; font-size: 20px;">Укажите количество товара</div>';
            }
        }
    );
}

function getAmount(elem) {
    window.amount = elem.value;
}
