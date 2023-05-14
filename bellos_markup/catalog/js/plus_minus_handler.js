function counterFunction(count) {

    let plus = count.querySelector('.plus');
    let minus = count.querySelector('.minus');

    minus.addEventListener('click', function() {
      let number = count.querySelector('.number');
      let numberValue = parseFloat(number.value, 10);
      console.log(numberValue);
      
      if (numberValue === 0) {
        return;
      };
    
      numberValue--;
      number.value = numberValue;
      console.log(numberValue);

    });
    
    plus.addEventListener('click', function() {
      let number = count.querySelector('.number');
      let numberValue = parseFloat(number.value, 10);
      numberValue++;
      number.value = numberValue;
      console.log(numberValue);
    });
    
}

let counts = document.querySelectorAll('.counter');

counts.forEach(counterFunction);


let modalButtonSeven = document.querySelector(".adopted");
let modalSeven = document.querySelector(".modal-seven");
modalButtonSeven.addEventListener("click", function () {
    modalSix.style.display = "none";
});
modalButtonSeven.addEventListener("click", function () {
    modalSeven.style.display = "flex";
});

modalSeven.addEventListener("click", function (event) {
    if (event.target === modalSeven) {
    modalSeven.style.display = "none";
    }
});




var thousandSeparator = function(str) {
  var parts = (str + '').split('.'),
      main = parts[0],
      len = main.length,
      output = '',
      i = len - 1;
  
  while(i >= 0) {
      output = main.charAt(i) + output;
      if ((len - i) % 3 === 0 && i > 0) {
          output = ',' + output;
      }
      --i;
  }

  if (parts.length > 1) {
      output += '.' + parts[1];
  }
  return output;
};




function executeJS(data){
    var searchTablePrice = document.getElementById('price');
    searchTablePrice.innerHTML = data;
}

$(".order__mobile__input").on("change input", function(){
  // console.log($(this));
  let amount = $(this)[0].value;
  var searchTablePrice = document.getElementsByClassName('price');
  searchTablePrice[key].innerHTML = ' ' + thousandSeparator(price * amount);
})

function plusSum(price, key)
{
  console.log(document.getElementsByClassName('order__mobile__input')[key].value);
  let amount = parseInt(String(document.getElementsByClassName('order__mobile__input')[key].value).replace(/ /g, '')) + 1;
  var searchTablePrice = document.getElementsByClassName('price');
  searchTablePrice[key].innerHTML = ' ' + thousandSeparator(price * amount);
}

function minusSum(price, key)
{
  // $(".order__mobile__input").on("change input", function(){
    // console.log($(this)[0].value);
    console.log(document.getElementsByClassName('order__mobile__input')[key].value);
    let amount = parseInt(String(document.getElementsByClassName('order__mobile__input')[key].value).replace(/ /g, ''));
    if (amount > 1) {
      amount -= 1;
    // }
    var searchTablePrice = document.getElementsByClassName('price');
    searchTablePrice[key].innerHTML = ' ' + thousandSeparator(price * amount);
  }
  // let amount = parseInt(String(document.getElementsByClassName('order__mobile__input')[key].value).replace(/ /g, ''));
  // if (amount > 0) {
  //   amount -= 1;
  // }
  // var searchTablePrice = document.getElementsByClassName('price');
  // searchTablePrice[key].innerHTML = ' ' + thousandSeparator(price * amount);
}

function plusOrderSum(price, key)
{
  let amount = parseInt(String(document.getElementsByClassName('input-for-order')[key].value).replace(/ /g, '')) + 1;
  var searchTablePrice = document.getElementsByClassName('sum');
  searchTablePrice[key].innerHTML = ' ' + thousandSeparator(price * amount);
}
function minusOrderSum(price, key)
{
  let amount = parseInt(String(document.getElementsByClassName('input-for-order')[key].value).replace(/ /g, ''));
  console.log(amount);
  if (amount > 1) {
    amount -= 1;
  }
  var searchTablePrice = document.getElementsByClassName('sum');
  searchTablePrice[key].innerHTML = ' ' + thousandSeparator(price * amount);
}