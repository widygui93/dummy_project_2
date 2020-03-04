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
			$(this).parent().next().next().next().next().val("y");

		} else {
			
			$(this).parent().prev().children().text(formatter.format(priceOfSelectedItem));
			$(this).parent().next().next().next().next().val("n");

		}
	});




});

