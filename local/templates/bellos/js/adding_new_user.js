// the first elements are for button on banner, the second - for button in footer
// Считываем поля ввода
let phoneInput = document.querySelector("#phone_account_request");
let phoneInput2 = document.querySelector("#phone_account_request2");
console.log(phoneInput2);
// Считываем кнопки
let btn = document.querySelector("#application-processing");
let btn2 = document.querySelector("#application-processing2");

  // Создаем маски в инпуте
const phoneMask = new IMask(phoneInput, {
  mask: "+{7}(000)000-00-00",
});
const phoneMask2 = new IMask(phoneInput2, {
  mask: "+{7}(000)000-00-00",
});

if (typeof phoneInput !== 'undefined' && phoneInput != null) {
  // Обработчик события для инпута
  phoneInput.addEventListener("input", phoneInputHandler);
}
if (typeof phoneInput2 !== 'undefined' && phoneInput2 != null) {
  // Обработчик события для инпута
  phoneInput2.addEventListener("input", phoneInputHandler2);
}


// Если ввели правлильно - кнопка активна, если нет - то неактивна
function phoneInputHandler() {
  $('#phone_account_request').on("input",function(ev){
    if (phoneMask.masked.isComplete) {
      btn.removeAttribute('disabled');
      btn.style.cursor = 'pointer';
      btn.addEventListener('click', sendForm)
    } else {
      btn.setAttribute('disabled', true);
      btn.style.cursor = 'default';
      document.querySelector('.modal-fourth').style.display = 'none';
    }
  });
}
function phoneInputHandler2() {
  $('#phone_account_request2').on("input",function(ev){
    if (phoneMask2.masked.isComplete) {
      console.log('yeah');
      btn2.removeAttribute('disabled');
      btn2.style.cursor = 'pointer';
      btn2.addEventListener('click', sendForm)
    } else {
      console.log('fu');
      btn2.setAttribute('disabled', true);
      btn2.style.cursor = 'default';
      document.querySelector('.modal-fourth').style.display = 'none';
    }
  });
}

if (typeof btn !== 'undefined' && btn != null) {
  btn.removeEventListener('click', sendForm);
}
if (typeof btn2 !== 'undefined' && btn2 != null) {
  btn2.removeEventListener('click', sendForm);
}


function sendForm() {

    var name = document.querySelector('#name_account_request').value;
    var phone = document.querySelector('#phone_account_request').value;

    var name2 = document.querySelector('#name_account_request2').value;
    var phone2 = document.querySelector('#phone_account_request2').value;
  
    if (name !== '' && phone !== '') {

        $.post(
            "/local/templates/bellos/components/bitrix/system.auth.form/personal/ajax.php",
            {
                name: name,
                phone: phone
            },
            function (response) {
                console.log(response);
                document.querySelector('.modal-second').style.display = 'none';
                document.querySelector('.modal-fourth').style.display = 'flex';
            }
        );
    } else if (name2 !== '' && phone2 !== '') {
      $.post(
        "/local/templates/bellos/components/bitrix/system.auth.form/personal/ajax.php",
        {
            name: name2,
            phone: phone2
        },
        function (response) {
            console.log(response);
            document.querySelector('.modal-fourth').style.display = 'flex';
            document.querySelector('.modal-third').style.display = 'none';
        }
    );
    }
}

