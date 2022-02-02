<img alt="Evalua logo" src="public/logo_e.png"/>


# Prueba Mid Back-end

## Instrucciones sobre la realización de la prueba
Para realizar esta prueba lo primero que debes hacer es descargarte el repositorio. Una vez descargado, debes realizar todas las modificaciones. Finalmente comprime todo el repositorio (sin la carpeta vendor/) en un archivo zip y envía este fichero zip al e-mail candidato.back@e-valua.es

Se ha creado un endpoint de prueba **/api/helloworld** para tener unas pautas. Más información en el fichero **routes/api.php**

## PREGUNTA 1


El repositorio tiene un proyecto Laravel 8 prácticamente limpio. Las únicas modificaciones que se han realizado son las siguientes:

- Se ha creado las migraciones necesarias para realizar la prueba.
- Se ha configurado el fichero phpunit.xml para que pueda ejecutar las pruebas sobre una conexión de SQLite. Puede modificar este fichero si prefiere ejecutar las pruebas sobre una conexión mysql, por ejemplo.
- Se han creado las factorías necesarias para realizar la prueba

Aunque el repositorio tenga un proyecto Laravel, hay libertad absoluta para realizar la prueba en cualquier framework.

Imagina que tenemos la siguiente base de datos:

budgets

- id - primary key, int autoincrement
- total_amount - decimal 10,2
- created_at - timestamp
- update_at - timestamp
- deleted_at - timestamp

budget_lines

- id - primary key, int autoincrement
- budget_id - FK a la tabla *budgets*
- total_amount - decimal 10,2
- net_amount - decimal 10,2
- vat_amount - decimal 10,2
- vat - decimal 10,2
- created_at - timestamp
- update_at - timestamp
- deleted_at - timestamp

y nos piden realizar las siguientes tareas para que la API sea capaz de obtener y crear un presupuesto.

## TAREA T1

La API tiene que ser capaz de recibir una petición POST api/budgets y ser capaz de crear un presupuesto. La petición será de este tipo:

- Array de budgetLine

Cada budgetLine a su vez recibirá estos datos:

- net_amount (decimal, requerido)
- vat (decimal, requerido)

```
[
	{
		"net_amount": 1,
		"vat": 1,
	},
	...
]
```

### Validación
Validar que los datos recibidos y que el valor del campo vat esté entre 0 - 100, si no pasa la validación se devolverá un mensaje de error.

### Creación y calculo del presupuesto
El importe del IVA (vat_amount) se calcula: (net_amount * vat) / 100.

La cantidad total de una línea de presupuesto se calcula a partir de la suma de la cantidad neta (net_amount) y el importe del IVA (vat_amount).

La cantidad total de un presupuesto será la suma de las cantidades totales de todas las líneas del presupuesto.

Guardar las lineas de presupuesto y crear el presuesto con los datos rellenos.

**Se debe crear todos los Unit, Feature tests necesarios para testear la funcionalidad**

## TAREA T2

La API tiene que ser capaz de obtener los presupuestos cuya cantidad total sea mayor a 50 al recibir una petición de este tipo:

GET api/budgets?totalAmount=50

El resultado a devolver por parte de la API debe ser el siguiente:

Array de budgets:
- id
- total_amount
- Array de budgetLines
- created_at
- updated_at

A su vez, cada budgetLine mostrará:

- id
- vat
- net_mount
- vat_amount
- total_amount
- created_at
- updated_at

**Para esta tarea SÓLO se debe crear Feature tests necesarios para testear la funcionalidad**


## IMPORTANTE


```
El objetivo principal de la prueba no es completarla,
evaluaremos sobre todo la calidad y la estructura del código desarrollado.
```