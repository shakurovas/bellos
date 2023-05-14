let order_box = document.querySelector(".order__button-gray");
let order_text = document.querySelector(".order__button__text");
let order_pic = document.getElementById('color-change-svg-order');

function handleMouseOver2() {
    order_box.style.background = 'black';
    order_text.style.color = 'white';
    order_pic.style.fill = 'white';
}

function handleMouseOut2() {

order_box.style.background = '#939393';
order_text.style.color = 'white';
order_pic.style.fill = '#4A4A4A';
}

function findOrderElems2(){
    if(order_box && order_text && order_pic) {
        if (typeof order_box !== 'undefined' && order_box != null) {
        // changing text color on mouseover
        order_box.addEventListener('mouseover', handleMouseOver2);
        
        // changing text color back on mouseout
        order_box.addEventListener('mouseout', handleMouseOut2);
        }    
    }
}


const orderBox = document.getElementsByClassName('order-button-change-color')[0];
const orderTitle = document.getElementsByClassName('order-title-change-color')[0];
const orderPic = document.getElementById('color-change-svg-order');

function handleMouseOver() {

  orderBox.style.background = 'black';
  orderTitle.style.color = 'white';
  orderPic.style.fill = 'white';
}

function handleMouseOut() {

  orderBox.style.background = '#939393';
  orderTitle.style.color = 'white';
  orderPic.style.fill = '#4A4A4A';
}

function findOrderElems(){
  
  
  if(!orderBox || !orderTitle || !orderPic) return setTimeout(findOrderElems, 1);
  else {
    if (typeof orderBox !== 'undefined' && orderBox != null) {
      // changing text color on mouseover
      orderBox.addEventListener('mouseover', handleMouseOver);
    
      // changing text color back on mouseout
      orderBox.addEventListener('mouseout', handleMouseOut);
    }    
  }
}

findOrderElems();

function repeatOrder(deviceType, orderedProductsInfo) {
    var products_to_order = {};
    for (var key in orderedProductsInfo) {
        products_to_order[orderedProductsInfo[key]['NAME']] = {'AMOUNT': orderedProductsInfo[key]['AMOUNT'], 'PRICE': orderedProductsInfo[key]['PRICE']}
    }

    function executeJS(tableData, totalSum){
        
        // if it is called from the template for mobile devices
        if (deviceType == 'mobile') {
            var cartTable = document.getElementById('ajax-content').getElementsByTagName('tbody')[0];
            cartTable.innerHTML = tableData;
            var sumLabel = document.getElementById('order-sum');
            sumLabel.innerHTML = totalSum + " РУБ";
        } else { // if it is called from the template for desktop devices

            if (totalSum !== 0) {
               
                order_box.classList.add('order-button-change-color');
                order_box.style.removeProperty('cursor');

                order_text.classList.add('order-title-change-color');
                order_text.style.removeProperty('cursor');
                
                findOrderElems2()
            }
            var cartTable = document.getElementById('ajax-content').getElementsByTagName('tbody')[0];
            cartTable.innerHTML = tableData;
            var sumLabel = document.getElementById('order-sum');
            sumLabel.innerHTML = totalSum + " РУБ";
        }
    }

    $.post(
        "/catalog/ajax/repeat_the_order.php",
        {
            products: products_to_order
        },
        function (response) {
            data = JSON.parse(response);
            executeJS(data['tableData'], data['totalSum']);
        }
    );
};


function repeatOrderFromHistoryOrCatalog(orderedProductsInfo)
{
    console.log(orderedProductsInfo);
    var products_to_order = {};
    for (var key in orderedProductsInfo) {
        products_to_order[orderedProductsInfo[key]['NAME']] = {'AMOUNT': orderedProductsInfo[key]['AMOUNT'], 'PRICE': orderedProductsInfo[key]['PRICE']}
    }
    console.log(products_to_order);
    $.post(
        "/catalog/ajax/repeat_the_order.php",
        {
            products: products_to_order,
            is_from_history_or_catalog: true
        },
        function (response) {
            console.log(JSON.parse(response));
        }
    );
    location.reload();
    window.location.href = '/catalog/order.php?clear_cache=Y';
    
}