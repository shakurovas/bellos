const box = document.getElementsByClassName('main__wrap')[0];
const title = document.getElementsByClassName('main__subtitle')[0];

const bannerBox = document.getElementById('banner-button');
const bannerTitle = document.getElementById('banner-title');
const bannerPic = document.getElementById('color-change-svg-banner');

const footerBox = document.getElementById('main__wrapthird');
const footerTitle = document.getElementById('footer-title');
const footerPic = document.getElementById('color-change-svg-footer');

function findOrderElems(){
  const orderBox = document.getElementById('order-btn');
  const orderTitle = document.getElementById('order-button');
  const orderPic = document.getElementById('color-change-svg-order');
  
  if(!orderBox || !orderTitle || !orderPic) return setTimeout(findOrderElems, 1);
  else {
    if (typeof orderBox !== 'undefined' && orderBox != null) {
      // changing text color on mouseover
      orderBox.addEventListener('mouseover', function handleMouseOver() {
        orderBox.style.background = 'black';
        orderTitle.style.color = 'white';
        orderPic.style.fill = 'white';
      });
    
      // changing text color back on mouseout
      orderBox.addEventListener('mouseout', function handleMouseOut() {
        orderBox.style.background = '#939393';
        orderTitle.style.color = 'white';
        orderPic.style.fill = '#4A4A4A';
      });
    }    
  }
}

findOrderElems();
// const orderBox = document.getElementById('order-btn');
// const orderTitle = document.getElementById('order-button');
// const orderPic = document.getElementById('color-change-svg-order');

const goodCategoryBox = document.getElementsByClassName('category-box');
const goodCategoryTitle = document.getElementsByClassName('category-title');
const goodCategoryPic = document.getElementsByClassName('color-change-svg-category');


if (typeof footerBox !== 'undefined' && footerBox != null) {
  // changing text color on mouseover
  footerBox.addEventListener('mouseover', function handleMouseOver() {
    footerBox.style.background = 'black';
    footerTitle.style.color = 'white';
    footerPic.style.fill = 'white';
  });

  // changing text color back on mouseout
  footerBox.addEventListener('mouseout', function handleMouseOut() {
    footerBox.style.background = 'white';
    footerTitle.style.color = '#4A4A4A';
    footerPic.style.fill = '#4A4A4A';
  });
}


if (typeof bannerBox !== 'undefined' && bannerBox != null) {
  // changing text color on mouseover
  bannerBox.addEventListener('mouseover', function handleMouseOver() {
    bannerBox.style.background = 'black';
    bannerTitle.style.color = 'white';
    bannerPic.style.fill = 'white';
  });

  // changing text color back on mouseout
  bannerBox.addEventListener('mouseout', function handleMouseOut() {
    bannerBox.style.background = 'white';
    bannerTitle.style.color = '#4A4A4A';
    bannerPic.style.fill = '#4A4A4A';
  });
}


if (typeof orderBox !== 'undefined' && orderBox != null) {
  // changing text color on mouseover
  orderBox.addEventListener('mouseover', function handleMouseOver() {
    orderBox.style.background = 'black';
    orderTitle.style.color = 'white';
    orderPic.style.fill = 'white';
  });

  // changing text color back on mouseout
  orderBox.addEventListener('mouseout', function handleMouseOut() {
    orderBox.style.background = '#939393';
    orderTitle.style.color = 'white';
    orderPic.style.fill = '#4A4A4A';
  });
}


  if (typeof goodCategoryBox !== 'undefined' && goodCategoryBox != null) {
    console.log(goodCategoryBox);
    Array.from(goodCategoryBox).forEach(function (item, index) {
      // changing colors on mouseover
      item.addEventListener('mouseover', function handleMouseOver() {
        item.style.background = 'black';
        Array.from(goodCategoryTitle)[index].style.color = 'white';
        Array.from(goodCategoryPic)[index].style.fill = 'white';
      });

      // changing colors back on mouseout
      item.addEventListener('mouseout', function handleMouseOut() {
        item.style.background = 'white';
        Array.from(goodCategoryTitle)[index].style.color = 'black';
        Array.from(goodCategoryPic)[index].style.fill = 'black';
      });
  });

}