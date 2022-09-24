console.log('template_lk_ru.js');

function CBR_XML_Daily_Ru(rates) {
  function trend(current, previous) {
    if (current > previous) return ' ▲';
    if (current < previous) return ' ▼';
    return '';
  }
    
  var USDrate = rates.Valute.USD.Value.toFixed(4).replace('.', '.');

  document.querySelector('.blkyrs').style.display = "block";
  document.querySelector('.blkyrs6').innerHTML = Math.round(USDrate * 100) / 100;
}

"use strict";

var buttons = document.querySelectorAll('.radio--btc');

function clearBtn() {
  buttons.forEach(function (item) {
    item.classList.remove('active');
  });
}

buttons.forEach(function (item) {
  item.addEventListener('click', function (e) {
    clearBtn();
    var target = e.target.closest('.radio--btc');
    console.log(target);
    target.classList.add('active');
  });
});



