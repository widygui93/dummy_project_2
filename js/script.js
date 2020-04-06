$(document).ready(function(){

	$(document).on("click", ".btn-success.order", function () {
	     // ambil nilai nama,harga,idMenu,tipe dan quantity dengan DOM 
	     // masukkan nilai-nilai tersebut ke masing-masing id di dalam modal
	    $(".modal-body #nama").val($(this).next().val());
	    $(".modal-body #harga").val(parseInt($(this).next().next().val()));
	    $(".modal-body #idMenu").val(parseInt($(this).next().next().next().val()));
	    $(".modal-body #tipe").val($(this).next().next().next().next().val());
	    $(".modal-body .badge-success").text(parseInt($(this).next().next().next().next().next().val()))

	});

	$("#submit-order").on('click', function(){
		const nama = $(".modal-body #nama").val();
		const harga = $(".modal-body #harga").val();
		const idMenu = $(".modal-body #idMenu").val();
		const tipe = $(".modal-body #tipe").val();
		const quantity = $(".modal-body .badge-success").text();

		if(quantity != 0){
			$.post("App/Core/Order.php",
			{
				tipe: tipe,
	            nama: nama,
	            harga: harga,
	            idMenu: idMenu,
	            quantity: $(".modal-body .badge-success").text()
			},
			function(data, status){
				alert(data);
				location.reload();
			});
		} else {
			alert("Your Quantity can't 0");
		}
		

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

	$(".plus-edit").on('click',function(){
		let quantity = parseInt($(this).next().text());
		quantity += 1;
		$(this).next().text(quantity);
		$(this).prev().prev().attr("value", quantity);
	});

	$(".minus-edit").on('click',function(){
		let quantity = parseInt($(this).prev().text());
		if(quantity > 1){
			quantity -= 1;
		}
		
		$(this).prev().text(quantity);
		$(this).prev().prev().prev().prev().attr("value", quantity);
	});

	





});

