$(document).ready(function(){
	//searchProducts();
	$('.sidebar-menu').tree();
	$("#tb-without-buttons").DataTable({
		language: {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        },
	}); 

	$("#search").on("keyup", function(){
		var search = $(this).val();
		searchProducts(search);
	});

	$('#pagination').on('click','a',function(e){
       	e.preventDefault(); 
       	var pageno = $(this).attr('data-ci-pagination-page');
       	loadPagination(pageno);
    });
 
    loadPagination(1);
 
    function loadPagination(pagno){
     	var search = $("#search").val();
       	$.ajax({
         	url: base_url +'frontend/home/loadRecord/'+pagno,
         	type: 'get',
         	dataType: 'json',
         	data:{search:search},
         	success: function(response){
         		console.log(response);
            	$('#pagination').html(response.pagination);
            	createTable(response.result);
         	}
       	});
    }
 
    function createTable(data){
    	html = "";
		$.each(data, function(key, value){
			html += '<div class="col-md-3 col-sm-6">';
			html += '<span class="thumbnail text-center">';
    		html += '<img src="'+base_url + 'assets/backend/images/products/'+value.image+'" alt="...">';
    		html += '<h4 class="text-danger" style="height:40px;">'+value.name+'</h4>';
    		html += '<p style="font-size:18px;"><strong>S/.'+value.price+'</strong></p>';
			html += '</span>';
			html += '</div>';

		});
		$("#products").html(html);	
    }
});

function searchProducts(search){
	$.ajax({
			url: base_url + "frontend/home/search",
			type: "POST",
			data: {search:search},
			dataType: "json",
			success: function(data){
				html = "";
				$.each(data, function(key, value){
					html += '<div class="col-md-3 col-sm-6">';
        			html += '<span class="thumbnail text-center">';
            		html += '<img src="'+base_url + 'assets/backend/images/products/'+value.image+'" alt="...">';
            		html += '<h4 class="text-danger" style="height:40px;">'+value.name+'</h4>';
            		html += '<p style="font-size:18px;"><strong>S/.'+value.price+'</strong></p>';
        			html += '</span>';
    				html += '</div>';

				});
				$("#products").html(html);
			}
		});
}