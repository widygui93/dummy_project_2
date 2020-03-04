$(document).ready(function(){

	$(":checkbox").change(function(){
		if(this.checked){
			let priceOfAddionalItem = parseInt($(this).val());
			let priceOfSelectedItem = parseInt($(this).parent().next().next().next().val());
			let total = priceOfSelectedItem + priceOfAddionalItem;

			const formatter = new Intl.NumberFormat('id-ID', {
			  style: 'currency',
			  currency: 'IDR',
			  minimumFractionDigits: 0
			});

			$(this).parent().prev().children().text(formatter.format(total));
		} else {
			let priceOfSelectedItem = parseInt($(this).parent().next().next().next().val());
			
			const formatter = new Intl.NumberFormat('id-ID', {
			  style: 'currency',
			  currency: 'IDR',
			  minimumFractionDigits: 0
			});

			$(this).parent().prev().children().text(formatter.format(priceOfSelectedItem));
		}
	});




});

