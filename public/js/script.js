// Отправка запроса на изменение цены продукта
	$('.product_price').change(function(){
		
		data = 'product_id='+$(this).attr('data-product_id')+'&price='+$(this).val();
		$.ajax({
			url: "saveNewPrice",
			type: "POST",
			data: data,
			cache: false,
			headers: {
				'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
			},
			error: function (msg) {
				alert("Error - saveNewPrice");
			}				
		});
		
	});