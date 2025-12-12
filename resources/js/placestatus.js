const places = document.querySelector('.conf-step__hall-wrapper');
const selectorsBox = document.querySelectorAll('.conf-step__radio');
const hallSizeInputs = document.querySelectorAll('.conf-step__input-size');
const hallPriceInputs = document.querySelectorAll('.conf-step__input-price');
const hallReset = document.querySelector('.conf-step__button-regular');
const planButton = document.querySelector('#chairs-plan');
const priceButton = document.querySelector('#chairs-price');
const filmBoxes = document.querySelector('.conf-step__movies');
const timeLines = document.querySelectorAll('.conf-step__seances-timeline');
const timeBoxes = document.querySelectorAll('.conf-step__seances-movie');
let selectorValue = [];
let chairsPlan = [];
let priceValue = [];
let start = '';

places.addEventListener('click', (e) => {	
	if(e.target.classList.contains('conf-step__chair_disabled')) {
		e.target.classList.replace('conf-step__chair_disabled', 'conf-step__chair_standart');		
	} else if (e.target.classList.contains('conf-step__chair_standart')) {
		e.target.classList.replace('conf-step__chair_standart', 'conf-step__chair_vip');
	} else if (e.target.classList.contains('conf-step__chair_vip')) {
		e.target.classList.replace('conf-step__chair_vip', 'conf-step__chair_disabled');
	}
});

selectorsBox.forEach(box => {
	box.addEventListener('click', () => {
		let index = Array.from(selectorsBox).findIndex(box => box.classList.contains('checked'));
		console.log(index);
		if(index !== -1) {
			selectorsBox[index].classList.remove('checked');
		}
		box.classList.add('checked');
	});
});

hallSizeInputs.forEach(item => {
	item.addEventListener('change', () => {
		let name = item.name;
		let value = item.value;
		selectorValue[name] = value;
		if(selectorValue['rows'] > 0 && selectorValue['chairs'] > 0) {
			hallRender();
		}
	});	
});

priceButton.addEventListener('click', () => {
	let index = Array.from(selectorsBox).findIndex(box => box.classList.contains('checked'));
	if((index ^ 0) === index) {
		chairsPlan.push({
			зал: selectorsBox[index].value
		});
	} else {
		alert('Нужно выбрать зал!');
	}
	priceValue['зал'] = selectorsBox[index].value;
	hallPriceInputs.forEach(item => {
		let name = item.name;
		let value = item.value;
		if(item.value > 0) {
			priceValue[name] = value;		
		} else {
			alert('Не указана цена!');
		}
	});
});

hallReset.addEventListener('click', () => {
	selectorValue = [];
	places.innerHTML = '';
	hallSizeInputs.forEach(el => {
		el.value = '';
		el.removeAttribute('disabled');
	});
});

planButton.addEventListener('click', () => {
	let index = Array.from(selectorsBox).findIndex(box => box.classList.contains('checked'));
	if((index ^ 0) === index) {
		chairsPlan.push({
			зал: selectorsBox[index].value
		});
	} else {
		alert('Нужно выбрать зал!');
	}
	hallPlan();
});

function hallRender() {
	for(let i = 0; i < selectorValue['rows']; i++) {
		let row = document.createElement('div');
		row.classList.add('conf-step__row');
		row.setAttribute('number', i+1);
		places.insertAdjacentElement('beforeend', row);
		for(let j = 0; j < selectorValue['chairs']; j++) {
			let chair = document.createElement('span');
			chair.classList.add('conf-step__chair');
			chair.classList.add('conf-step__chair_disabled');
			chair.setAttribute('number', j+1);
			row.insertAdjacentElement('beforeend', chair);
		}
	}
	if(places.children.length > 0) {
		hallSizeInputs.forEach(el => el.setAttribute('disabled', 'disabled'));
	}
}

function hallPlan() {	
	Array.from(places.children).forEach(row => {
		let rn = row.getAttribute('number');			
		Array.from(row.children).forEach(chair => {
			let chn = chair.getAttribute('number');
			let chs = '';
			if(chair.classList.contains('conf-step__chair_disabled')) {
				chs = 'disabled';
			} else if (chair.classList.contains('conf-step__chair_standart')) {
				chs = 'standart';
			} else if (chair.classList.contains('conf-step__chair_vip')) {
				chs = 'vip';
			}
			chairsPlan.push({
				ряд: rn,
				место: chn,
				тип: chs,
				цена: 0
			})						
		});
	});
}

Array.from(filmBoxes.children).forEach(filmBox => filmBox.addEventListener('dragstart', (e) => {
	e.dataTransfer.setData('text/plain', filmBox.children[2].textContent);
}));

Array.from(timeLines).forEach(timeLine => timeLine.addEventListener('dragover', (e) => e.preventDefault()));

Array.from(timeLines).forEach(timeLine => timeLine.addEventListener('drop', (e) => {
	const film = e.dataTransfer.getData('text');
	const targetEl = Array.from(timeLine.children).filter(el => el === e.target);
	if(targetEl.length > 0) {
		targetEl[0].insertAdjacentHTML('afterbegin', `<p class="conf-step__seances-movie-title">${film}</p>`);
	} else {
		alert('Фильм уже добавлен!');
	}
	//window.location.href = '/admin/seance/create';	
	e.dataTransfer.clearData();
}));

window.addEventListener('load', () => {
	removeAttrSeance();
});

function removeAttrSeance() {	
	Array.from(timeBoxes).forEach(timeBox => {
		if(timeBox.children.length > 1) {			
			timeBox.removeAttribute('wire:click');			
		}
	});
}

Array.from(timeBoxes).forEach(timeBox => timeBox.addEventListener('click', (e) => {
	if(timeBox === e.target) {
		start = timeBox.firstChild.textContent;
		console.log(start);
	}
}));

//const dataBox = [];
//const hall = element.previousElementSibling.textContent;
//dataBox['filmName'] = film;
//dataBox['hallName'] = hall;	
/*fetch('/api/seances', {
	method: 'POST',
	headers: {'Content-Type': 'application/json'},
	body: JSON.stringify({ data: dataBox })
	})
	.then(response => response.json())
	.then(data => {console.log('Success:', data);
});	*/