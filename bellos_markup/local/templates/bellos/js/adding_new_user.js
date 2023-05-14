

function sendForm() {

    var name = document.querySelector('#name_account_request').value;
    console.log(name);
    var phone = document.querySelector('#phone_account_request').value;
    console.log(phone);

  
    if (name !== '' && phone !== '') {
        console.log('hrhr');

        $.post(
            "/local/templates/bellos/components/bitrix/system.auth.form/personal/ajax.php",
            {
                name: name,
                phone: phone
            },
            function (response) {
                console.log(response);
            }
        );
    }
}
