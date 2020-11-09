#Bienvenidos AquaLife 

 
_La página web tiene dos roles diferentes (Administrador y cliente) los cuales van a desplegar diferentes vistas y funciones:_

 
##Rol de administrador:  

###1) Como vista principal tiene acceso a:  

	**1.1)** Crear accesorios, peces y condiciones ambientales 
	(En cada una de estas vistas se encuentran los campos correspondientes a los datos necesarios para 
	crear la determinada opción). 
	**1.2)** Listar accesorios, peces y condiciones ambientales: 

        **1.2.1)** En general cada opción de listar solo muestra una lista ordenada por los id de la determinada opción, 
	      en la cual se ven todos los atributos, y además se encuentra un opción la cual se llama ‘más sobre este elemento’ 
              de la columna ‘información’ en la cual puede modificar y actualizar los datos: 

               	- Si ingresas a ver los datos en detalle del elemento seleccionado, dependiendo de la lista que hallas 
		  seleccionado te muestran los datos correspondientes. 

               	- Dentro de esta vista podrás actualizar los datos del elemento seleccionado, tal como: 

                - Si es un accesorio, puedes cambiar el nombre, la categoría, la descripción, el precio y 
		     la cantidad del accesorio en la tienda.

				- Si es un pez, puedes cambiar el nombre, la especie, la familia, el color, el precio, 
		     el tamaño, el temperamento y la cantidad del pez en la tienda. 

				- Si es una condición ambiental, puedes cambiar los rangos de PH, la temperatura y la dureza del agua.
 
				- Si es una orden, puedes cambiar el estado de la orden. 

    **1.3)** Ver perfil, en esta opción muestra los datos personales del administrador.

 

##Rol de cliente: 

###2) Como vista principal tiene 6 opciones disponibles, la cuales son: 

        **2.1) Accesorio:** _Se le desplegarán todos los accesorios de la tienda así estén disponibles o no, además puede agregar 
	    la cantidad a comprar y lo puede adicionar le producto al carrito de compras._

            - En esta vista puede filtrar los accesorios por su categoría: 

			   - Filtros. 
			   - Iluminación. 
			   - Calentadores. 
			   - Alimentadores. 
			   - Skimmers. 

 

        **2.2) Pez:** _Se le desplegarán todos los peces de la tienda así estén disponibles o no, también puedes añadir el pez a una 
	    lista de favoritos y además puede agregar la cantidad a comprar y lo puede adicionar le producto al carrito de compras._  

                 - En esta vista puede filtrar los peces por: 

                    - Tamaño del pez. 
					- Temperamento del pez. 

        **2.3) Lista de favoritos:** _En la lista de favoritos estarán todos los peces los cuales hayas adicionado manualmente desde la lista de peces, 
  	    esta lista esta con el fin de que le usuario tenga a la mano una lista de sus peces favoritos._ 

        **2.4) Mis ordenes:** _Muestra el registro de todas las compras que ha realizado._

        **2.5) Carrito:** _Muestra una orden la cual está por ejecutarse, en esta opción el cliente puede ejecutar la compra pagando en efectivo o con tarjeta_

        **2.6) Perfil:** _Muestra los datos personales del cliente._