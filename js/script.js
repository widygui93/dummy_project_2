$(document).ready(function(){

	$(".btn-success").on('click',function(){
		const tipe = $(this).next().next().next().next().val();
		const nama = $(this).next().val();
		const harga = parseInt($(this).next().next().val());
		const idMenu = parseInt($(this).next().next().next().val());
		const quantity = parseInt($(this).prev().find("span").text());

		$.post("App/Core/Order.php",
		{
			tipe: tipe,
            nama: nama,
            harga: harga,
            idMenu: idMenu,
            quantity: quantity
		},
		function(data, status){
			if(data == "orderan gagal masuk ke cart"){
				alert(data);
			} else{
				alert("orderan sukses masuk ke cart");
				$("#cart").text(data);
			}
			
		});

	});

	$(".btn-sm.plus").on('click',function(){
		let quantity = parseInt($(this).next().text());
		quantity += 1;
		$(this).next().text(quantity);
	});

	$(".btn-sm.minus").on('click',function(){
		let quantity = parseInt($(this).prev().text());
		if(quantity >= 1){
			quantity -= 1;
		}
		
		$(this).prev().text(quantity);
	});




});

