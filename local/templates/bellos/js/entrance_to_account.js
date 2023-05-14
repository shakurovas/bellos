let entrancePhrase = document.querySelector('#entrance-item');
let entrancePhraseMobile = document.querySelector('#entrance-item-mobile');
let closeButtons = document.querySelectorAll('.close-btn');
let closeButtonThird = document.querySelector('.close-btn-third');

if (typeof entrancePhrase !== 'undefined' &&  entrancePhrase != null) {
    entrancePhrase.addEventListener('click', function openModal() {
        document.querySelector('.modal').style.display = 'flex';
    });
}

if (typeof entrancePhraseMobile !== 'undefined' &&  entrancePhraseMobile != null) {
    entrancePhraseMobile.addEventListener('click', function openModal() {
        document.querySelector('.modal').style.display = 'flex';
    });
}

if (typeof closeButtons !== 'undefined' &&  closeButtons != null) {
    closeButtons.forEach(function(elem) {
        elem.addEventListener("click", function() {
            document.querySelector('.modal').style.display = 'none';
            document.querySelector('.modal-second').style.display = 'none';
            document.querySelector('.modal-third').style.display = 'none';
            document.querySelector('.modal-fourth').style.display = 'none';
            document.querySelector('.modal-fifth').style.display = 'none';
            document.querySelector('.modal-six').style.display = 'none';
            document.querySelector('.modal-seven').style.display = 'none';
        });
    });
}

if (typeof closeButtonThird !== 'undefined' &&  closeButtonThird != null) {
    closeButtonThird.addEventListener("click", function() {
        document.querySelector('.modal').style.display = 'none';
        document.querySelector('.modal-second').style.display = 'none';
        document.querySelector('.modal-third').style.display = 'none';
        document.querySelector('.modal-fourth').style.display = 'none';
        document.querySelector('.modal-fifth').style.display = 'none';
        document.querySelector('.modal-six').style.display = 'none';
        document.querySelector('.modal-seven').style.display = 'none';
    });
}