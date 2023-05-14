const orderBtn = document.getElementById('order-btn');
const modalSeventh = document.querySelector('.modal-seven');
console.log(modalSeventh);

if (typeof orderBtn !== 'undefined' && orderBtn !== null) {
    orderBtn.addEventListener('click', function onClick() {
        let orderSum = document.querySelector('#order-sum').innerHTML;
        console.log(orderSum);
        if (orderSum != '0 РУБ') {
            $.post(
                "/catalog/ajax/addOrder.php",
                {
                    // products: products_to_order
                },
                function (response) {
                    var cartTable = document.getElementById('ajax-content').getElementsByTagName('tbody')[0];
                    if (typeof cartTable !== 'undefined' && cartTable != null) {	
                        cartTable.innerHTML = '<tr class="order__table-third__line"><td colspan="5" class="order__table-third__column" style="font-family: \'DIN Condensed\'";">В корзине нет товаров</td></tr>';
                    }
        
                    var cartTableMobile = document.getElementById('order-content-mobile');
                    if (typeof cartTableMobile !== 'undefined' && cartTableMobile != null) {	
                        cartTableMobile.innerHTML = '<h3 class="order__mobile__subtitle">Детали заказа:</h3><div class="order__mobile__wrap"><h4 class="order__mobile__description" style="font-family: \'DIN Condensed\';">В корзине нет товаров</h4></div>';
                    }
                  
        
                    // updating the total sum of the order
                    var sumLabel = document.getElementById('order-sum');
                    sumLabel.innerHTML = 0 + ' РУБ';
      
                    // console.log(orderBox);
                    if (typeof order_box !== 'undefined' && order_box != null) {
                        order_box.removeEventListener('mouseout', handleMouseOut2);
                        order_box.removeEventListener('mouseover', handleMouseOver2);
                    }
                    if (typeof orderBox !== 'undefined' && orderBox != null) {
                        orderBox.removeEventListener('mouseout', handleMouseOut);
                        orderBox.removeEventListener('mouseover', handleMouseOver);
                    }
                    

                    document.querySelector(".order__button-gray").classList.remove('order-button-change-color');
                    document.querySelector(".order__button__text").classList.remove('order-title-change-color');
                    document.querySelector('.order__button-gray').style.cursor = 'default';
                   
                }
            );
            modalSeventh.style.display = "flex";
            document.querySelector(".order__button-gray").classList.remove('mobile-change-color');
            document.querySelector(".order__button-gray").classList.add('mobile-def-color');
        }
    });
}
