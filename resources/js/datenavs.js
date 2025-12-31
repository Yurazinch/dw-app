const dayMenu = [];

function dateMenu(today, step) {
  let nextDay, dayNumber, dayName;
  const optionsDay = {day: 'numeric'};
  const optionsWeek = {weekday: 'short'}
  for(let i = 0 + step; i < 7 + step; ++i) {
    nextDay = new Date(today.getTime() + i * 86400000);
    dayNumber = nextDay.toLocaleDateString('ru-RU', optionsDay);
    dayName = nextDay.toLocaleDateString('ru-RU', optionsWeek);
    dayMenu.push({
      date: dayNumber,
      dayname: dayName
    });
  }
}
let today = new Date();
let step = 0;
dateMenu(today, step);

const navs = Array.from(document.querySelectorAll('.page-nav__day-week'));
const numbers = Array.from(document.querySelectorAll('.page-nav__day-number'));
const navdays = Array.from(document.querySelectorAll('.page-nav__day'));

navs.forEach((nav, i) => {
  nav.textContent = dayMenu[i].dayname;  
});

numbers.forEach((number, i) => {
  number.textContent = dayMenu[i].date;
});

navs.forEach((nav, i) => {
  if(nav.textContent === 'сб' || nav.textContent === 'вс') {
    navdays[i].classList.add('page-nav__day_weekend');
  }  
});

numbers.forEach((number, i) => {  
  if(number.textContent === new Date(today.getTime()).toLocaleDateString('ru-RU', {day: 'numeric'})) {
    navdays[i].classList.add('page-nav__day_today');
  }   
});