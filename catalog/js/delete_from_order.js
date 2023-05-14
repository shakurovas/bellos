function deleteFromOrder(dataToDelete) {

    function executeJS(tableData, totalSum){
        
        // if it is called from the template for mobile devices
        if (dataToDelete[2] == 'mobile') {
            var cartDiv = document.getElementById('order-content-mobile');
            console.log(cartDiv);
            cartDiv.innerHTML = tableData;
            var sumLabel = document.getElementById('order-sum');
            sumLabel.innerHTML = totalSum + " РУБ";
        } else { // if it is called from the template for desktop devices
            if (totalSum == 0) {
                document.querySelector('.order__button-gray').removeAttribute('id');
                document.querySelector('.order__button__text').removeAttribute('id');
                document.querySelector('.order__button-gray').style.cursor = 'default';
                document.querySelector('.order__button__text').style.cursor = 'default';
            }

            var cartTable = document.getElementById('ajax-content').getElementsByTagName('tbody')[0];
            cartTable.innerHTML = tableData;
            var sumLabel = document.getElementById('order-sum');
            sumLabel.innerHTML = totalSum + " РУБ";
        }
        if (!totalSum) {
            if (typeof order_box !== 'undefined' && order_box != null) {
                order_box.removeEventListener('mouseout', handleMouseOut2);
                order_box.removeEventListener('mouseover', handleMouseOver2);
            }
            if (typeof orderBox !== 'undefined' && orderBox != null) {
                orderBox.removeEventListener('mouseout', handleMouseOut);
                orderBox.removeEventListener('mouseover', handleMouseOver);
            }
            document.querySelector(".order__button-gray").classList.remove('mobile-change-color');
            document.querySelector(".order__button-gray").classList.add('mobile-def-color');
            document.querySelector('.order__button-gray').removeAttribute('id');
            document.querySelector('.order__button__text').removeAttribute('id');
            document.querySelector('.order__button-gray').style.cursor = 'default';
            document.querySelector('.order__button__text').style.cursor = 'default';
        }
    }

    $.post(
        "/catalog/ajax/delete_from_order.php",
        {
            product_to_delete: dataToDelete,
            device_type: dataToDelete[2]
        },
        function (response) {
            data = JSON.parse(response);
            executeJS(data['tableData'], data['totalSum']);
        }
    );

};
