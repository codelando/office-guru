var btnMenu = document.getElementById('menu-mobile');
var menu = document.getElementById('headernav-menu');

btnMenu.onclick = function() {
	if (menu.style.visibility == 'hidden') {
		menu.style.visibility = 'visible';
	}
	else {
		menu.style.visibility = 'hidden';
	}
	
};


