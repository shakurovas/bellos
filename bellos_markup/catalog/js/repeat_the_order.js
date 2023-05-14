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
                console.log(666);
                document.querySelector('.order__button-gray').id = 'order-btn';
                document.querySelector('.order__button-gray').style.removeProperty('cursor');
                document.querySelector('.order__button__text').id = 'order-button';
                document.querySelector('.order__button__text').style.removeProperty('cursor');
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