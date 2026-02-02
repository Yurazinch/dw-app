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
	e.dataTransfer.setData('text/plain', `${filmBox.children[2].textContent}, ${filmBox.children[3].textContent}`);
}));

Array.from(timeLines).forEach(timeLine => timeLine.addEventListener('dragover', (e) => e.preventDefault()));

let start;
Array.from(timeLines).forEach(timeLine => timeLine.addEventListener('drop', (e) => {
	const existEls = Array.from(e.target.children);
	console.log(existEls);
	existEls.forEach((existEl, index) => {
		if(index < existEls.length - 1) {
			existEl.removeAttribute("wire:click");
		}
	})
	const film = e.dataTransfer.getData('text').split(',');	
	const filmName = film[0];
	const filmDuration = film[1].trim().split(' ')[0];
	const draggableElement = document.getElementById('id');
	let width = Math.ceil(parseInt(filmDuration) * 0.75);
	const hallName = e.target.previousElementSibling.textContent;
	function getStart() {
		if(existEls.length === 0) {
			start = '08:00';
		} else {
			let prevStart = existEls[existEls.length - 1].children[1].innerText;
			let prevDuration = Math.floor(parseInt(existEls[existEls.length - 1].style.width) / 0.75);			
			let time = prevStart.split(':');			
			let minutes = parseInt(time[0]) * 60 + parseInt(time[1]);
			let nextStart = minutes + prevDuration + 10;			
			let hours = Math.floor(nextStart / 60);
			let mins = Math.floor(nextStart % 60);
			if(hours >= 24) {
				alert('Линейка сеансов заполнена');
			} else if(hours < 10 && mins < 10) {
				start = `0${hours}:0${mins}`;
			} else if(hours < 10 && mins >= 10) {
				start = `0${hours}:${mins}`;
			} else if(hours >= 10 && mins < 10) {
				start = `${hours}:0${mins}`;
			} else {
				start = `${hours}:${mins}`;
			}
		}
	}	
	getStart();
	e.target.insertAdjacentHTML('beforeend', 
		`<div class="conf-step__seances-movie" style="width: ${width}px; background-color: rgb(202, 255, 133);">
			<p class="conf-step__seances-movie-title">${filmName}</p>
			<p class="conf-step__seances-movie-start">${start}</p>
		</div>`
	);
	seances.push({
		hall: hallName,
		film: filmName,
		start: start,
		width: width
	});	
	console.log(seances);
	e.dataTransfer.clearData();
}));

document.getElementById('saveSeances').addEventListener('click', () => {			
	if(seances.length === 0) {
		alert('Нет добавленных новых сеансов!');
	} else {	
		sendData(seances);	
		seances = [];
	}
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