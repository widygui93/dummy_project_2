$(document).ready(function(){

	$(":checkbox").change(function(){
		const formatter = new Intl.NumberFormat('id-ID', {
		  style: 'currency',
		  currency: 'IDR',
		  minimumFractionDigits: 0
		});

		let priceOfAddionalItem = parseInt($(this).val());
		let priceOfSelectedItem = parseInt($(this).parent().next().next().next().val());
		let total = priceOfSelectedItem + priceOfAddionalItem;

		if(this.checked){
			$(this).parent().prev().children().text(formatter.format(total));
		} else {
			$(this).parent().prev().children().text(formatter.format(priceOfSelectedItem));
		}
	});




});

