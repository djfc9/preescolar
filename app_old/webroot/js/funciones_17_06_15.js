var js = jQuery.noConflict();

//Select dependientes para el registro de personas.

//para obtener la lista de municipios dependiendo de la seleccion del estado en personas/add
js(document).ready(function() {
	js("#PersonaEstadoId").change(function(){  //se ejecuta con el evento onChange	
            js.ajax({
               type: "GET",
               url:"/preescolar/personas/lista_municipios/"+js(this).val(),
               //data:"id"+js('#PersonaEstadoId').val(),
               beforeSend: function(){
                   js('#imgcargas').html('<div class="rating-flash" id="cargando_div"><img src="../img/kind-5.gif" whith="60px;" height="60px;"/> Cargando</div>');
                   
               },
               success: function(respuesta){
                    js('#imgcargas').html(respuesta);  
                    
                    
                   }
            });
       });

});
        
        
        
      js(document).ready(function() {
		js("#imgcargas").on('click',function(){   //se ejecuta con el evento onChange
                    js("#imgcargas option:selected").each(function () {
                     var a = js(this).val(); 
                    js.ajax({
                       type: "GET",
                       url:"/preescolar/personas/lista_parroquias/"+a,
                      
                       //data:"id"+js('#Persona.municipio_id').val(),
                       beforeSend: function(){
                           js('#imgcargando').html('<div class="rating-flash" id="cargando_div"><img src="../img/kind-5.gif" whith="60px;" height="60px;"/> Cargando</div>');
                           //alert(a);
                       },
                       success: function(respuestap){
                            js('#imgcargando').html(respuestap);   
                          }
                      });
                       });
                   });
                });
                
                
         //para obtener la lista de municipios dependiendo de la seleccion del estado en alumnos/add
	js(document).ready(function() {
		js("#AlumnoEstadoId").change(function(){  //se ejecuta con el evento onChange	
                    js.ajax({
                       type: "GET",
                       url:"/preescolar/alumnos/lista_municipios/"+js(this).val(),
                       //data:"id"+js('#PersonaEstadoId').val(),
                       beforeSend: function(){
                           js('#imgcarga').html('<div class="rating-flash" id="cargando_div"><img src="../img/kind-5.gif" whith="60px;" height="60px;"/> Cargando</div>');
                           
                       },
                       success: function(respuesta){
                            js('#imgcarga').html(respuesta);  
                            
                            
                           }
                    });
               });
	
	});
        
        
        
      js(document).ready(function() {
		js("#imgcarga").on('click',function(){   //se ejecuta con el evento onChange
                    js("#imgcarga option:selected").each(function () {
                     var a = js(this).val(); 
                    js.ajax({
                       type: "GET",
                       url:"/preescolar/alumnos/lista_parroquias/"+a,
                      
                       //data:"id"+js('#Persona.municipio_id').val(),
                       beforeSend: function(){
                           
                           js('#imgcarga1').html('<div class="rating-flash" id="cargando_div"><img src="../img/kind-5.gif" whith="60px;" height="60px;"/> Cargando</div>');
                           //alert(a);
                       },
                       success: function(respuestap){
                            js('#imgcarga1').html(respuestap);   
                          }
                      });
                       });
                   });
                });

          
         //para obtener la lista de autorizados de un niñ@ dependiendo de la seleccion del niñ@ en fichas/reposo
	js(document).ready(function() {
		js("#busqueda_lista_aut_niño").on('click', (function(){  //se ejecuta con el evento onChange
                    var alu_id = js("#FichaAlumnoCedulaEscolar").val();
                   // alert(alu_id);
                   if(alu_id != "")
                     { 
                    js.ajax({
                       type: "GET",
                       //url:"/preescolar/fichas/lis_autorizados"+js(this).val(),
                       url:"/preescolar/fichas/lis_autorizados/"+alu_id,
                       
                       //data:"id"+js('#PersonaEstadoId').val(),
                       beforeSend: function(){
                           js('#lista_autorizados').html('<div class="rating-flash" id="cargando_div"><img src="../img/kind-5.gif" whith="60px;" height="60px;"/> Cargando</div>');
                           
                       },
                       success: function(respuestal){
                            js('#lista_autorizados').html(respuestal);  
                            
                            
                           }
                    });
                }///llave del if
                else
                    {
                       alert('Debe selecionar un campo válido'); 
                    }//cierre del if
                    
               }) ); 
	
	});




///funcion utilizada para ocultar y mostrar el cargo en personas/add1 
        js(document).ready(function() {							   
            js("#PersonaTrabaja").click(function(evento){
      if (js("#PersonaTrabaja").attr("checked")){
         js("#trabajador").css("display", "block");
      }else{
         js("#trabajador").css("display", "none");
         var valor = 6;
         var  f = js("#PersonaCargoId").val(valor);	
      }
                });    
                });
                
                
///funcion utilizada para ocultar y mostrar si el paciente es referido y a que especialista en fichas/add
        js(document).ready(function() {							   
            js("#FichaReferenciado").change(function(){
           var ref = js('#FichaReferenciado').val();
      if (ref === 'Si'){
         js("#referencia").css("display", "block");
      }else{
         js("#referencia").css("display", "none");
         var valor = 'Sin Referencia';
         var  f = js("#FichaReferido").val(valor);	
      }
                });    
                });                
                

///funcion utilizada para ocultar y mostrar el tratamiento al problema de aprendizaje en saluds/add

                js(document).ready(function() {
                    js("#SaludTratamientoProbAprendizaje").attr("disabled", true);
		js("#SaludProblemaAprendizajeId").change(function(){  //se ejecuta con el evento onChange	
			var  problema = js("#SaludProblemaAprendizajeId").val();								   
			if(problema == 10 || problema == 1 )
			{
				js("#SaludTratamientoProbAprendizaje").attr("disabled", true);
                                if(problema ==10){
                                var vacio = 'ninguno';
                                js("#SaludTratamientoProbAprendizaje").val(vacio);
                                }
                                else
                                    {
                                        js("#SaludTratamientoProbAprendizaje").attr("disabled", true);
                                        js("#SaludTratamientoProbAprendizaje").val();
                                        
                                    }
			}
			else
			{
				js("#SaludTratamientoProbAprendizaje").removeAttr("disabled");
                                
				}
			}
                        );
	
                        })
                        
                        
                        //para deshabilitar y habilitar a que es alergico en caso de serlo
                        js(document).ready(function() {
                        js("#SaludAlergico").attr("disabled", true);
		js("#SaludAlergia").change(function(){  //se ejecuta con el evento onChange	
			var  alergias = js("#SaludAlergia").val();								   
			if(alergias == 2 || alergias == 0 )
			{
				
                               js("#SaludAlergico").attr("disabled", true);
                               if(alergias ==2){
                               var al = 'No';
                               var ale= js("#SaludAlergico").val(al);
                               }
                               else
                                   {
                                    js("#SaludAlergico").attr("disabled", true); 
                                    var ale= js("#SaludAlergico").val();  
                                   }
			}
			else
			{
                                js("#SaludAlergico").removeAttr("disabled");
                                var ale= js("#SaludAlergico").val();
                                
				}
			}
                        );
	
                        })
                        
                        
                       // funcion para crear la cedula escolar
                /*js(document).ready(function() {
                        js("#AlumnoPosicion").attr("disabled", true); 
		js("#AlumnoNiñosEnElParto").change(function(){  //se ejecuta con el evento onChange	
			var  año = js("#AlumnoFechaNacimientoYear").val();
                         var ci = js("#AlumnoCedulaRepresentante").val();
                         var parto = js("#AlumnoNiñosEnElParto").val(); 
                         alert (parto);
                         var bar = 1;
                         switch (parto){
                             case 1:
                                        var b = año.substring(2,4); //con esto obtengo los valores de la cadena que estan desde la posicion 2 a la 4
                                        if(ci < 10000000)
                                        {
                                            ci_re = 0+ ci;
                                        }
                                        else
                                        {
                                            ci_re = ci;
                                        }
                                        var ci_alum = parto+b+ci_re;
                                        //alert(ci_re);
                                        js("#AlumnoCedulaEscolar").val(ci_alum);
                             break;
                             case 2:
                                        js("#AlumnoPosicion").removeAttr("disabled");
                                        //js("<option value='1'>Scientific Linux</option>").appendTo("#AlumnoPosicion");
                                        js("#AlumnoPosicion").change(function(){
                                        var posicion = js("#AlumnoPosicion").val();
                                        //alert(posicion);
                                        var b = año.substring(2,4); //con esto obtengo los valores de la cadena que estan desde la posicion 2 a la 4
                                        if(ci < 10000000)
                                        {
                                           ci_re = 0+ ci;
                                        }
                                        else
                                        {
                                           ci_re = ci;
                                        }js(document).ready(function() {							   
            js("#PersonaTrabaja").click(function(evento){
      if (js("#PersonaTrabaja").attr("checked")){
         js("#trabajador").css("display", "block");
      }else{
         js("#trabajador").css("display", "none");
         var valor = 6;
         var  f = js("#PersonaCargoId").val(valor);	
      }
                });    
                });
                                        var ci_alum = posicion+b+ci_re;
                                        //alert(ci_re);
                                        js("#AlumnoCedulaEscolar").val(ci_alum); 
                                 });
                             break;
                             
                         }//cierre de switch
                         
			});
                        });*/

                               // funcion para crear la cedula escolar
                js(document).ready(function() {
                        js("#AlumnoPosicionId").attr("disabled", true); 
		js("#AlumnoNiñosEnElParto").change(function(){  //se ejecuta con el evento onChange	
			var  año = js("#AlumnoFechaNacimientoYear").val();
                         var ci = js("#AlumnoCedulaRepresentante").val();
                         var parto = js("#AlumnoNiñosEnElParto option:selected").val(); 
                         var bar = 1;
                         if (parto < 2)
                             {
                         var b = año.substring(2,4); //con esto obtengo los valores de la cadena que estan desde la posicion 2 a la 4
                        if(ci < 10000000)
                        {
                            ci_re = 0+ ci;
                        }
                        else
                            {
                                ci_re = ci;
                            }
                        var ci_alum = parto+b+ci_re;
                        //alert(ci_re);
                        js("#AlumnoCedulaEscolar").val(ci_alum);
                             }
                             else
                                 {
                                     js("#AlumnoPosicionId").removeAttr("disabled");
                    js.ajax({
                       type: "GET",
                       url:"/preescolar/alumnos/posiciones/"+parto,
                      
                       //data:"id"+js('#Persona.municipio_id').val(),
                       beforeSend: function(){
                           
                           js('#posiciones').html('<div class="rating-flash" id="cargando_div"><img src="../img/kind-5.gif" whith="60px;" height="60px;"/> Cargando</div>');
                           //alert(a);
                       },
                       success: function(respuestapos){
                            js('#posiciones').html(respuestapos);   
                          }
                      });
			}//cierrre del if principal
			}
                        );
	
                        });
                        
                        ////////////////////////////////
                        js(document).ready(function() {
                        js("#posiciones").on('change',function(){
                        js("#posiciones option:selected").each(function () {
                            var  año = js("#AlumnoFechaNacimientoYear").val();
                            var ci = js("#AlumnoCedulaRepresentante").val();
                            var parto = js("#AlumnoNiñosEnElParto").val(); 
                            var bar = 1;
                            var posicion = js(this).val(); 
                                   //alert(posicion);
                           var b = año.substring(2,4); //con esto obtengo los valores de la cadena que estan desde la posicion 2 a la 4
                        if(ci < 10000000)
                        {
                            ci_re = 0+ ci;
                        }
                        else
                            {
                                ci_re = ci;
                            }
                        var ci_alum = posicion+b+ci_re;
                        //alert(ci_re);
                        js("#AlumnoCedulaEscolar").val(ci_alum); 
                                 });
                                 });
                                 });
                        //////////////////////////////////////////////////////
                        
                        
           /*funciones usadas en alumnos/validar_inscripcion y validar_reinscripcion  */             
   ///funcion utilizada para buscar alumnos en la vista alumnos/validar_inscripcion y validar_reinscripcion        
                js(document).ready(function() { 
		js("#img_busqueda").on('click',function(){   //se ejecuta con el evento onChange
                    var ced = js("#AlumnoCedulaEscolar").val();
                    if(ced === "")
                    {
                        alert("Debe insertar una cedula escolar Valida.");
                        document.location=("/preescolar/alumnos/validar_inscripcion/");
                    }
                    else
                    {
                    js.ajax({
                       type: "GET",
                       url:"/preescolar/alumnos/buscar_alumno/"+js("#AlumnoCedulaEscolar").val(),
                       beforeSend: function(){
                           
                           js('#contenido').html('<div class="rating-flash" id="cargando_div"><img src="../img/kind-5.gif" whith="60px;" height="60px;"/> Cargando</div>');
                           //alert(a);
                       },
                       success: function(contenido){
                            js('#contenido').html(contenido);   
                          }
                      });
                  } //cierre del esle
                       });
                   });
                   
                   //utilizado en inscripcion
                     js(document).ready(function() { 
		js("#img_busqueda1").on('click',function(){   //se ejecuta con el evento onChange
                    var ced = js("#AlumnoCedulaEscolar").val();
                    if(ced === "")
                    {
                        alert("Debe insertar una cedula escolar Valida.");
                        document.location=("/preescolar/Alumnos_Grados_Secciones/inscribir/");
                    }
                    else
                    {
                    js.ajax({
                       type: "GET",
                       url:"/preescolar/alumnos/buscar_alumno_1/"+js("#AlumnoCedulaEscolar").val(),
                       beforeSend: function(){
                           
                           js('#contenido1').html('<div class="rating-flash" id="cargando_div"><img src="../img/kind-5.gif" whith="60px;" height="60px;"/> Cargando</div>');
                           //alert(a);
                       },
                       success: function(contenido1){
                            js('#contenido1').html(contenido1);   
                          }
                      });
                  } //cierre del esle
                       });
                   });
                   
                   //utilizado en inscripcion
                     js(document).ready(function() { 
		js("#img_busqueda11").on('click',function(){   //se ejecuta con el evento onChange
                    var ced = js("#AlumnoCedulaEscolar").val();
                    if(ced === "")
                    {
                        alert("Debe insertar una cedula escolar Valida.");
                        document.location=("/preescolar/Alumnos_Grados_Secciones/cambiar_seccion_1/");
                    }
                    else
                    {
                    js.ajax({
                       type: "GET",
                       url:"/preescolar/alumnos/buscar_alumno_2/"+js("#AlumnoCedulaEscolar").val(),
                       beforeSend: function(){
                           
                           js('#contenido1').html('<div class="rating-flash" id="cargando_div"><img src="../img/kind-5.gif" whith="60px;" height="60px;"/> Cargando</div>');
                           //alert(a);
                       },
                       success: function(contenido1){
                            js('#contenido1').html(contenido1);   
                          }
                      });
                  } //cierre del esle
                       });
                   });
                   

                    //utilizado en el retiro de los niños
                     js(document).ready(function() { 
		js("#img_retirar").on('click',function(){   //se ejecuta con el evento onChange
                    var ced = js("#AlumnoCedulaEscolar").val();
                    if(ced === "")
                    {
                        alert("Debe insertar una cedula escolar Valida.");
                        document.location=("/preescolar/alumnos/retirar/");
                    }
                    else
                    {
                    js.ajax({
                       type: "GET",
                       url:"/preescolar/alumnos/buscar_alumno_retirar/"+js("#AlumnoCedulaEscolar").val(),
                       beforeSend: function(){
                           
                           js('#contenido_alumno').html('<div class="rating-flash" id="cargando_div"><img src="../img/kind-5.gif" whith="60px;" height="60px;"/> Cargando</div>');
                           //alert(a);
                       },
                       success: function(contenido_alumno){
                            js('#contenido_alumno').html(contenido_alumno);   
                          }
                      });
                  } //cierre del esle
                       });
                   });
                   
                   /* js(document).ready(function() { 
		js("#AlumnoEstatuId").on('change',function(){   //se ejecuta con el evento onChange
                    var estatus = js("#AlumnoEstatuId").val();
                    if (estatus != ""){
                    js("#estatus").css("display", "block");
                    }else{
                    js("#estatus").css("display", "none");	
                        }
                       });
                   });*/
  
    ///funcion utilizada para buscar personas en la vista personas/asignacion     
                js(document).ready(function() {  
		js("#busqueda").on('click',function(){   //se ejecuta con el evento onChange
                    var ced = js("#PersonaCedula").val();
                    if(ced === "")
                    {
                        alert("Debe insertar una cedula Valida.");
                        document.location=("/preescolar/personas/asignacion/");
                    }
                    else
                    {
                    js.ajax({
                       type: "GET",
                       url:"/preescolar/personas/busqueda/"+js("#PersonaCedula").val(),
                       beforeSend: function(){
                           js('#encontrado').html('<div class="rating-flash" id="cargando_div"><img src="../img/kind-5.gif" whith="60px;" height="60px;"/> Cargando</div>');
                       },
                       success: function(registros){
                            js('#encontrado').html(registros);   
                          }
                      });
                  } //cierre del esle
                       });
                   });
                   
                    ///funcion utilizada para buscar las personas en la vista personas/trabajador_preescolar     
                js(document).ready(function() {  
		js("#busqueda_trabajador").on('click',function(){   //se ejecuta con el evento onChange
                    var ced = js("#PersonaCedula").val();
                    if(ced === "")
                    {
                        alert("Debe insertar una cedula Valida.");
                        document.location=("/preescolar/personas/trabajador_preescolar/");
                    }
                    else
                    {
                    js.ajax({
                       type: "GET",
                       url:"/preescolar/personas/busqueda_datos_trabajador/"+js("#PersonaCedula").val(),
                       beforeSend: function(){
                           js('#trabajador_encontrado').html('<div class="rating-flash" id="cargando_div"><img src="../img/kind-5.gif" whith="60px;" height="60px;"/> Cargando</div>');
                       },
                       success: function(registros_en){
                            js('#trabajador_encontrado').html(registros_en);   
                          }
                      });
                  } //cierre del esle
                       });
                   });
                   
    ///funcion utilizada para generar los pdf ordenados por grado y seccion  
                js(document).ready(function() {
		js("#imgbusqueda").on('click',function(){   //se ejecuta con el evento onclick
                    var ced = js("#AlumnoGradosSecciones").val();
                    if(ced === "")
                    {
                        alert("Debe Selecionar un Grado y Seccion de la lista.");
                        document.location=("/preescolar/alumnos/bd");
                    }
                    else
                    {
                    js.ajax({
                       type: "GET",
                       url:"/preescolar/AlumnosGradosSecciones/bd_alumnos/"+js("#AlumnoGradosSecciones").val(),
                       beforeSend: function(){
                           js('#listado').html('<div class="rating-flash" id="cargando_div"><img src="../img/kind-5.gif" whith="60px;" height="60px;"/> Cargando</div>');
                       },
                       success: function(registross){
                            js('#listado').html(registross);   
                          }
                      });
                  }
                       });
                   });
                   
    ///funcion utilizada para buscar los autorizados de los alumnos en la vista alumnos/lista_autorizados del modulo de profesores y direccion      
                js(document).ready(function() {
                  
		js("#busquemos").on('click',function(){   //se ejecuta con el evento onChange
                    var ced = js("#AlumnoCedulaEscolar").val();
                    if(ced === "")
                    {
                        alert("Debe insertar una cedula escolar Valida.");
                        document.location=("/preescolar/alumnos/lista_autorizados");
                    }
                    else
                    {
                    js.ajax({
                       type: "GET",
                       url:"/preescolar/alumnos/mostrar_lista_autorizados/"+js("#AlumnoCedulaEscolar").val(),
                       beforeSend: function(){
                           
                           js('#lista_autorizados').html('<div class="rating-flash" id="cargando_div"><img src="../img/kind-5.gif" whith="60px;" height="60px;"/> Cargando</div>');
                           //alert(a);
                       },
                       success: function(lista_autorizados){
                            js('#lista_autorizados').html(lista_autorizados);   
                          }
                      });
                  } //cierre del else
                       });
                   });
                   
  ///funcion utilizada para buscar los alumnos autorizados a viajes  en alumnos del modulo de direccion 
                js(document).ready(function() {
		js("#busca_viajes").on('click',function(){   //se ejecuta con el evento onChange
                    //js("#imgcarga option:selected").each(function () {
                   var a = js("#GradosSeccione_id").val();
                    if(a === "")
                    {
                        alert("Debe Selecionar un Grado y Seccion de la lista.");
                        document.location=("/preescolar/alumnos/viajes");
                    }
                    else
                    {
                    js.ajax({
                       type: "GET",
                       url:"/preescolar/Alumnos/viajess/"+js("#GradosSeccione_id").val(),
                       beforeSend: function(){
                           
                           js('#viajes').html('<div class="rating-flash" id="cargando_div"><img src="../img/kind-5.gif" whith="60px;" height="60px;"/> Cargando</div>');
                           //alert(a);
                       },
                       success: function(viajes){
                            js('#viajes').html(viajes);   
                          }
                      
                      });
                  } ///cierre del else
                       });
                   });
///funcion utilizada para buscar los alumnos autorizados a  fotografias en alumnos del modulo de direccion 
                js(document).ready(function() {
		js("#busca_fotografias").on('click',function(){   //se ejecuta con el evento onChange
                    //js("#imgcarga option:selected").each(function () {
                   var a = js("#GradosSeccione_id").val();
                    if(a === "")
                    {
                        alert("Debe Selecionar un Grado y Seccion de la lista.");
                        document.location=("/preescolar/alumnos/fotografias");
                    }
                    else
                    {
                    js.ajax({
                       type: "GET",
                       url:"/preescolar/Alumnos/fotografiass/"+js("#GradosSeccione_id").val(),
                       beforeSend: function(){
                           
                           js('#fotografias').html('<div class="rating-flash" id="cargando_div"><img src="../img/kind-5.gif" whith="60px;" height="60px;"/> Cargando</div>');
                           //alert(a);
                       },
                       success: function(fotografias){
                            js('#fotografias').html(fotografias);   
                          }
                      
                      });
                  } ///cierre del else
                       });
                   });

///funcion utilizada para buscar los  autorizados de los alumnos del modulo de direccion y hacer el pdf
                js(document).ready(function() {
		js("#autorizados_db").on('click',function(){   //se ejecuta con el evento onChange
                    //js("#imgcarga option:selected").each(function () {
                   var a = js("#GradosSeccione_id").val();
                    if(a === "")
                    {
                        alert("Debe Selecionar un Grado y Seccion de la lista.");
                        document.location=(" /preescolar/alumnos/autorizados/");
                    }
                    else
                    {
                    js.ajax({
                       type: "GET",
                       url:"/preescolar/Alumnos/autorizados_rep/"+js("#GradosSeccione_id").val(),
                       beforeSend: function(){
                           
                           js('#aut').html('<div class="rating-flash" id="cargando_div"><img src="../img/kind-5.gif" whith="60px;" height="60px;"/> Cargando</div>');
                           //alert(a);
                       },
                       success: function(autorizados){
                            js('#aut').html(autorizados);   
                          }
                      
                      });
                  } ///cierre del else
                       });
                   });
                   
 ///funcion utilizada para buscar los alumnos en el filtro de alumnos/index
                js(document).ready(function() {
		js("#busqueda_lista").on('click',function(){   //se ejecuta con el evento onChange
                    //js("#imgcarga option:selected").each(function () {
                   var a = js("#AlumnoCedulaEscolar").val();
                    if(a === "")
                    {
                        alert("Debe insertar una cedula escolar Valida.");
                        document.location=("/preescolar/alumnos/index/");
                    }
                    else
                    
                    {
                    js.ajax({
                       type: "GET",
                       url:"/preescolar/Alumnos/index_lista/"+js("#AlumnoCedulaEscolar").val(),
                       beforeSend: function(){
                           js('#actual').css("display", "none");
                          // js("#referencia").css("display", "none");
                           js('#informacion').html('<div class="rating-flash" id="cargando_div"><img src="../img/kind-5.gif" whith="60px;" height="60px;"/> Cargando</div>');
                           //alert(a);
                       },
                       success: function(info){
                           if(info === "")
                           {
                               js('#actual').css("display", "block");
                           }
                           else{
                            js('#informacion').html(info); 
                               }
                          }
                      
                      });
                  } ///cierre del else
                       });
                   });

///funcion utilizada para buscar los alumnos en el filtro de alumnos/index_1
                js(document).ready(function() {
		js("#busqueda_lista").on('click',function(){   //se ejecuta con el evento onChange
                    //js("#imgcarga option:selected").each(function () {
                   var a = js("#AlumnoCedulaEscolar").val();
                    if(a === "")
                    {
                        alert("Debe insertar una cedula escolar Valida.");
                        document.location=("/preescolar/alumnos/index_1/");
                    }
                    else
                    
                    {
                    js.ajax({
                       type: "GET",
                       url:"/preescolar/Alumnos/index_lista_1/"+js("#AlumnoCedulaEscolar").val(),
                       beforeSend: function(){
                           js('#actual').css("display", "none");
                          // js("#referencia").css("display", "none");
                           js('#informacion').html('<div class="rating-flash" id="cargando_div"><img src="../img/kind-5.gif" whith="60px;" height="60px;"/> Cargando</div>');
                           //alert(a);
                       },
                       success: function(infor){
                           if(infor === "")
                           {
                               js('#actual').css("display", "block");
                           }
                           else{
                            js('#informacion').html(infor); 
                               }
                          }
                      
                      });
                  } ///cierre del else
                       });
                   });
                   
                   
                   ///funcion utilizada para buscar los alumnos en el filtro de alumnos/constancias
                js(document).ready(function() {
		js("#busqueda_lista_rep").on('click',function(){   //se ejecuta con el evento onChange
                    //js("#imgcarga option:selected").each(function () {
                   var a = js("#AlumnoCedulaEscolar").val();
                    if(a === "")
                    {
                        alert("Debe insertar una cedula escolar Valida.");
                        document.location=("/preescolar/alumnos/constancias/");
                    }
                    else
                    
                    {
                    js.ajax({
                       type: "GET",
                       url:"/preescolar/Alumnos/index_lista_reportes/"+js("#AlumnoCedulaEscolar").val(),
                       beforeSend: function(){
                           js('#informacion_rep').html('<div class="rating-flash" id="cargando_div"><img src="../img/kind-5.gif" whith="60px;" height="60px;"/> Cargando</div>');
                           //alert(a);
                       },
                       success: function(info){

                            js('#informacion_rep').html(info); 
                               
                          }
                      
                      });
                      
                  } ///cierre del else
                       });
                   });
                   
                  //aqui hago las redireccion a la constancia que se necesite 
                  js(document).ready(function() {
		js("#informacion_rep").on('change',function(){   //se ejecuta con el evento onChange
                    js("#informacion_rep option:selected").each(function () {
                     var a = js(this).val(); 
                     if (a !=""){
                     document.location=(a);
                                }
                                else
                                {
                                  alert("Seleccione una opción valida");
                                }
                       });
                   });
                });
                
                //aqui hago las redireccion a la constancia que se necesite desde el modulo de representantes
                  js(document).ready(function() {
		js("#acciones_reportes").on('change',function(){   //se ejecuta con el evento onChange
                    js("#acciones_reportes option:selected").each(function () {
                     var a = js(this).val(); 
                     if (a !=""){
                     document.location=(a);
                                }
                                else
                                {
                                  alert("Seleccione una opción valida");
                                }
                       });
                   });
                });

                
//funcion que verifica si la cedula de la persona existe o no desde el controller persona
                js(document).ready(function() {
		js("#cedula_busqueda").on('click',function(){   //se ejecuta con el evento onBlur
                    var ci = js("#PersonaCedulaP").val();
                    if(ci === "")
                    {
                        alert('Ingrese una cédula Valida');
                    }
                    else{
                    js.ajax({
                       type: "GET",
                       url:"/preescolar/Personas/consultar_cedula/"+js("#PersonaCedulaP").val(),
                       beforeSend: function(){
                          // js("#referencia").css("display", "none");
                           js('#autorizado_existente').html('<div class="rating-flash" id="cargando_div"><img src="../img/kind-5.gif" whith="60px;" height="60px;"/> Cargando</div>');
                           //alert(a);
                       },
                       success: function(info_c){
                            js('#autorizado_existente').html(info_c); 
                            if(info_c === "")
                           {
                              js("#autorizado_nuevo").css("display", "block");  
                            }
                            else
                                {
                            js("#autorizado_nuevo").css("display", "none");
                            js('#autorizado_existente').css("display", "block");
                            js('#autorizado_existente').html(info_c); 
                            }
                          }
                      
                      });
                  }
                       });
                   });
                   
                   
                   /////funcion que verifica si la cedula de la persona existe o no desde el user
                   js(document).ready(function() {
		js("#PersonaCedula").on('blur',function(){   //se ejecuta con el evento onBlur
                    var ci = js("#PersonaCedula").val();
                    if(ci === "")
                    {
                        alert('Ingrese una cédula Valida');
                    }
                    else{
                    js.ajax({
                       type: "GET",
                       url:"/preescolar/Personas/consultar_persona_existe/"+js("#PersonaCedula").val(),
                       beforeSend: function(){
                          // js("#referencia").css("display", "none");
                           js('#r_cedula_u').html('<div class="rating-flash" id="cargando_div"><img src="../img/kind-5.gif" whith="60px;" height="60px;"/> Cargando</div>');
                           //alert(a);
                       },
                       success: function(info_cu){
                           if(info_cu === "")
                           {
                              js("#datos").css("display", "block");  
                            }
                            else
                                {
                            js("#datos").css("display", "none");
                            js('#r_cedula_u').css("display", "block");
                            js('#r_cedula_u').html(info_cu); 
                            }
                            
                          }
                      
                      });
                  } ///cierre del else
                       });
                   });



            //funcion utilizada para verificar si quedan cupos disponibles en una seccion.    
            js(document).ready(function() {
		js("#GradosSeccioneGradosSeccione").on('change',function(){   //se ejecuta con el evento onChange
                   // js("#informacion_rep option:selected").each(function () {
                     var a = js(this).val(); 
                     //alert(a);
                     if(a === "")
                    {
                        alert('Seleccione una sección Valida');
                    }
                    else{
                    js.ajax({
                       type: "GET",
                       url:"/preescolar/Alumnos/cupos_disponibles_en_secciones/"+a,
                       beforeSend: function(){
                          // js("#referencia").css("display", "none");
                           js('#cupos_disponibles').html('<div class="rating-flash" id="cargando_div"><img src="../img/kind-5.gif" whith="60px;" height="60px;"/> Cargando</div>');
                           //alert(a);
                       },
                       success: function(info_cupos){
                            js('#cupos_disponibles').html(info_cupos);  
                          }
                      
                      });
                  } ///cierre del else
                     
                   });
                });
                
                //funcion utilizada para buscar los datos de la sesion en el cambio de clave.    
            js(document).ready(function() {
		js("#busqueda_correo").on('click',function(){   //se ejecuta con el evento onChange
                   // js("#informacion_rep option:selected").each(function () {
                     var a = js("#UserEmail").val(); 
                     //alert(a);
                     if(!validar_email(a))
                    {
                        alert('Ingrese un correo Valido');
                    }
                    else{
                    js.ajax({
                       type: "GET",
                       url:"/preescolar/Users/buscar_datos/"+a,
                       beforeSend: function(){
                          // js("#referencia").css("display", "none");
                           js('#informacion_user').html('<div class="rating-flash" id="cargando_div"><img src="../img/kind-5.gif" whith="60px;" height="60px;"/> Cargando</div>');
                           alert(a);
                       },
                       success: function(info_user){
                            js('#informacion_user').html(info_user);  
                          }
                      
                      });
                  } ///cierre del else
                     
                   });
                });
                
                function validar_email(valor)
	{
		// creamos nuestra regla con expresiones regulares.
		var filter = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
		// utilizamos test para comprobar si el parametro valor cumple la regla
		if(filter.test(valor))
			return true;
		else
			return false;
	}


//////////////funcion para habilitar o deshabilitar en campo de explicacion del caso de uso////////////

                js(document).ready(function() {
		js("#AlumnoCasoEspecial").on('change',function(){
                    if (js("#AlumnoCasoEspecial").attr("checked")){
                js("#motivo_casos_especial").css("display", "block");
                }else{
                    js("#motivo_casos_especial").css("display", "none");	
                    }
                });
            });
