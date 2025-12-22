const places = document.querySelector('.conf-step__hall-wrapper');
const selectorsBox = document.querySelectorAll('.conf-step__radio');

places.addEventListener('click', (e) => {	
	if(e.target.classList.contains('conf-step__chair_disabled')) {
		e.target.classList.replace('conf-step__chair_disabled', 'conf-step__chair_standart');		
	} else if (e.target.classList.contains('conf-step__chair_standart')) {
		e.target.classList.replace('conf-step__chair_standart', 'conf-step__chair_vip');
	} else if (e.target.classList.contains('conf-step__chair_vip')) {
		e.target.classList.replace('conf-step__chair_vip', 'conf-step__chair_disabled');
	}
});

document.querySelector('#chairs-plan').addEventListener('click', () => {
	let selectedBox = Array.from(selectorsBox).filter(box => box.classList.contains('checked'));
		if(selectedBox.length === 0) {
		alert('Нужно выбрать зал!');		
	}
	
	hallPlan(selectedBox);
});

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