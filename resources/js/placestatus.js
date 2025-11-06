const places = document.querySelector('.conf-step__hall-wrapper');
places.addEventListener('click', (e) => {	
	if(e.target.classList.contains('conf-step__chair_disabled')) {
		e.target.classList.replace('conf-step__chair_disabled', 'conf-step__chair_standart');		
	} else if (e.target.classList.contains('conf-step__chair_standart')) {
		e.target.classList.replace('conf-step__chair_standart', 'conf-step__chair_vip');
	} else if (e.target.classList.contains('conf-step__chair_vip')) {
		e.target.classList.replace('conf-step__chair_vip', 'conf-step__chair_disabled');
	}
});