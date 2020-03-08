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

	$(".btn-success").on('click',function(){
		const tipe = $(this).next().next().next().next().val();
		const nama = $(this).next().val();
		const harga = parseInt($(this).next().next().val());
		let isExtraSeafood = "n";
		let isExtraHam = "n";

		if(tipe == "chinese"){
			isExtraSeafood = $(this).next().next().next().val();
		} else{
			isExtraHam = $(this).next().next().next().val();
		}

		$.post("App/Core/Order.php",
		{
			tipe: tipe,
            nama: nama,
            harga: harga,
            isExtraSeafood: isExtraSeafood,
            isExtraHam: isExtraHam
		},
		function(data, status){
			alert(data);
			
		});
	});




});

