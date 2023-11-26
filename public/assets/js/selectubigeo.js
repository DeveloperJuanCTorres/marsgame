$(document).ready(function() {
	
	//listar departamentos
	var select01 = '';	
	$.each(departamentos1, function(i, obj) {
		select01 = '<option value="'+ departamentos1[i].id + '">' + departamentos1[i].name + '</option>';
		$('#ubigeo_dep').append(select01);
	});
	
	//listar provincias por departamento
	$('#ubigeo_dep').on('change', function() {
		
		//limpiar los selects	
		$('#ubigeo_pro').find('option').remove();
		$('#ubigeo_dis').find('option').remove();
		
		var iddep = this.value;
		var select02 = '';	
		
		$.each(provincias1, function(i, obj) {
			if (provincias1[i].department_id==iddep) {
				select02 = '<option value="'+ provincias1[i].id + '">' + provincias1[i].name + '</option>';
				$('#ubigeo_pro').append(select02);	
			}
			
					
		});
		
		//cargar los distritos
		$('#ubigeo_pro').trigger('change');
		
	});
	
	//listar distritos por provincia
	$('#ubigeo_pro').on('change', function() {
		
		//limpiar el select de distritos		
		$('#ubigeo_dis').find('option').remove();
		
		var idpro = this.value;
		var select03 = '';	
		
		
		$.each(distritos1, function(i, obj) {
			if (distritos1[i].province_id==idpro) {
				select03 = '<option value="'+ distritos1[i].id + '">' + distritos1[i].name + '</option>';
			$('#ubigeo_dis').append(select03);	
			}					
		});
		
	});
	
	//seleccionar por defecto LIMA
	$('#ubigeo_dep option[value="0"]').attr("selected",true);
	$('#ubigeo_dep').trigger('change');
	
	//seleccionar por defecto LIMA
	$('#ubigeo_pro option[value="0"]').attr("selected",true);
	$('#ubigeo_pro').trigger('change');
	
	//seleccionar por defecto LA MOLINA
	$('#ubigeo_dis option[value="0"]').attr("selected",true);
	
	
	
	
	
});