$(document).ready(function($){
	/* Функция показа  формы заказа */
	function showOrder() {
		$('.overlay').fadeIn(300);
		$('.order').fadeIn(300);
	}
	function closeOrder() {
		$('.overlay').fadeOut(100);
		$('.order').fadeOut(100);
	}

	var url = document.URL;
	var id = url.substring(url.lastIndexOf('#') + 1);
	if (id == 'send-wishlist') {
		setTimeout(function(){
			showOrder();			
			event.preventDefault();
		}, 500);
	}
	$('body').on('click', '.send_list', function () {
			showOrder();			
			event.preventDefault();
		});		
		$('body').on('click', '.overlay', function () {
			closeOrder();
		});	
		$('body').on('click', '.close_order', function () {
			closeOrder();
		});	
		$(document).keyup(function(e) {
			if (e.keyCode === 27) closeOrder();   // esc
		}); 
});