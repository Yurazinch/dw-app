const places = document.querySelector('.conf-step__hall-wrapper');
const selectorsBox = document.querySelectorAll('.conf-step__radio');
const hallSizeInputs = document.querySelectorAll('.conf-step__input-size');
const hallPriceInputs = document.querySelectorAll('.conf-step__input-price');
const hallReset = document.querySelector('.conf-step__button-regular');
const filmBoxes = document.querySelector('.conf-step__movies');
const timeLines = document.querySelectorAll('.conf-step__seances-timeline');
const timeBoxes = document.querySelectorAll('.conf-step__seances-movie');
let selectorValue = [];
let chairs = [];
let prices = [];
let seances = [];

places.addEventListener('click', (e) => {	
	if(e.target.classList.contains('conf-step__chair_disabled')) {
		e.target.classList.replace('conf-step__chair_disabled', 'conf-step__chair_standart');		
	} else if (e.target.classList.contains('conf-step__chair_standart')) {
		e.target.classList.replace('conf-step__chair_standart', 'conf-step__chair_vip');
	} else if (e.target.classList.contains('conf-step__chair_vip')) {
		e.target.classList.replace('conf-step__chair_vip', 'conf-step__chair_disabled');
	}
});

// Реализовал в комплоненте livewire
/*selectorsBox.forEach(box => {
	box.addEventListener('click', (e) => {
		let index = Array.from(selectorsBox).findIndex(box => box.classList.contains('checked'));
		/*if(index >= 0) {
			selectorsBox[index].classList.remove('checked');
		}
		e.target.classList.add('checked');
	});
});*/

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

/*document.querySelector('#chairs-price').addEventListener('click', () => {
	let selectedBox = Array.from(selectorsBox).filter(box => box.classList.contains('checked'));
	if(selectedBox.length === 0) {
		alert('Нужно выбрать зал!');		
	}

	let hall = selectedBox[0].value;
	hallPriceInputs.forEach(item => {
		let name = item.name;
		let value = item.value;
		if(item.value > 0) {
			prices.push({
				type: name,
				price: value
			});		
		} else {
			alert('Не указана цена!');
		}
	});
	console.log(hall, prices);
	try {
		fetch(`/api/chairs/${hall}`, {
			method: 'PUT',
			mode: 'cors',
			body: JSON.stringify({ prices }),
			headers: {
			'Content-Type': 'application/json',
			'X-CSRF-TOKEN': '{{ csrf_token() }}'
			}
		})
		.then((response) => response.json())
		.then((data) => {console.log(data)});		
	} catch (error) {
		console.error("Ошибка:", error);
	}
});*/

function sendPrices(prices) {
	try {
		fetch('/api/chairs/', {
			method: 'PUT',
			mode: 'cors',
			body: JSON.stringify({ prices }),
			headers: {
			'Content-Type': 'application/json',
			'X-CSRF-TOKEN': '{{ csrf_token() }}'
			}
		})
		.then((response) => response.json())
		.then((data) => {console.log(data)});		
	} catch (error) {
		console.error("Ошибка:", error);
	}
}

hallReset.addEventListener('click', () => {
	selectorValue = [];
	places.innerHTML = '';
	hallSizeInputs.forEach(el => {
		el.value = '';
		el.removeAttribute('disabled');
	});
});

document.querySelector('#chairs-plan').addEventListener('click', () => {
	let selectedBox = Array.from(selectorsBox).filter(box => box.classList.contains('checked'));
	if(selectedBox.length === 0) {
		alert('Нужно выбрать зал!');		
	}	
	hallPlan(selectedBox);
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
			chair.classList.add('conf-step__chair_standart');
			chair.setAttribute('number', j+1);
			row.insertAdjacentElement('beforeend', chair);
		}
	}
	if(places.children.length > 0) {
		hallSizeInputs.forEach(el => el.setAttribute('disabled', 'disabled'));
	}
}

function hallPlan(selectedBox) {		
	if(places.children.length === 0) {
		alert('Нужно выбрать конфигурацию зала!');
	}	
	let hn = selectedBox[0].value;
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
			chairs.push({
				hall: hn,
				row: rn,
				place: chn,
				type: chs,
				price: 0
			})						
		});
	});

	sendChairs(chairs);
}

function sendChairs(chairs) {
	try {
		fetch('/api/chairs', {
			method: 'POST',
			mode: 'cors',
			body: JSON.stringify({ chairs }),
			headers: {
			'Content-Type': 'application/json',
			'X-CSRF-TOKEN': '{{ csrf_token() }}'
			}
		})
		.then((response) => response.json())
		.then((data) => {console.log(data)});		
	} catch (error) {
		console.error("Ошибка:", error);
	}
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
	e.dataTransfer.clearData();
}));

window.addEventListener('load', () => {
	Array.from(timeBoxes).forEach(timeBox => {
		if(timeBox.children.length > 1) {			
			timeBox.removeAttribute('wire:click');			
		}
	});
	seances = [];
});

document.getElementById('saveSeances').addEventListener('click', () => {
	const formData = new FormData();
	Array.from(timeBoxes).forEach((timeBox, index) => {
		if(timeBox.children.length === 2 && !timeBox.lastElementChild.hasAttribute('wire:key')) {
			let hallName = timeBox.closest('.conf-step__seances-hall').firstElementChild.textContent;
			let filmName = timeBox.firstElementChild.textContent;
			let start = timeBox.lastElementChild.textContent;
			seances.push({
				hall: hallName,
				film: filmName,
				start: start
			});
		}
	});
		
	if(seances.length === 0) {
		alert('Нет добавленных новых сеансов!');
	}	
	sendData(seances);
});

function sendData(seances) {
	try {
		fetch('/api/seances', {
			method: 'POST',
			mode: 'cors',
			body: JSON.stringify({ seances }),
			headers: {
			'Content-Type': 'application/json',
			'X-CSRF-TOKEN': '{{ csrf_token() }}'
			}
		})
		.then((response) => response.json())
		.then((data) => {console.log(data)});		
	} catch (error) {
		console.error("Ошибка:", error);
	}
}

document.getElementById('clearSeances').addEventListener('click', () => {
	seances = [];
});