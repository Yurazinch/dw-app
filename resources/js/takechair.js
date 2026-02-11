const rows = Array.from(document.querySelectorAll('.buying-scheme__row'));
const takechair = Array.from(document.querySelectorAll('.buying-scheme__chair'));
const chair = [];
const selectedchair = [];
takechair.forEach((el, i) => el.addEventListener('click', () => {	
	if(!el.classList.contains('buying-scheme__chair_disabled') || !el.classList.contains('buying-scheme__chair_taken')) {
		if(el.classList.contains('buying-scheme__chair_standart')) {
			selectedchair[i] = 'buying-scheme__chair_standart';
			el.classList.replace('buying-scheme__chair_standart', 'buying-scheme__chair_selected');			
		} else if (el.classList.contains('buying-scheme__chair_vip')) {
			selectedchair[i] = 'buying-scheme__chair_vip';
			el.classList.replace('buying-scheme__chair_vip', 'buying-scheme__chair_selected');			
		} else if (el.classList.contains('buying-scheme__chair_selected')) {
			if(selectedchair[i] === 'buying-scheme__chair_standart') {
				el.classList.replace('buying-scheme__chair_selected', 'buying-scheme__chair_standart');												
			} else if (selectedchair[i] === 'buying-scheme__chair_vip') {
				el.classList.replace('buying-scheme__chair_selected', 'buying-scheme__chair_vip');				
			}
			selectedchair.splice(i, 1);
		}
	}
	console.log(selectedchair);
}));

function takenChair() {	
	for(i=0; i<rows.length; i++) {
		for(j=0; j<rows[i].children.length; j++) {
			if(rows[i].children[j].classList.contains('buying-scheme__chair_selected')) {
				chair.push({
					row: i+1,
					chair: j+1,
				});
				rows[i].children[j].classList.replace('buying-scheme__chair_selected', 'buying-scheme__chair_taken');
			} 
		}
	}
}

const button = document.querySelector('.acceptin-button');
button.addEventListener('click', () => {
	takenChair();
});