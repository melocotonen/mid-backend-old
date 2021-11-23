<img alt="Evalua logo" src="public/logo_e.png"/>


# Prueba Back-end

## Instrucciones sobre la realización de la prueba
Para realizar esta prueba lo primero que debes hacer es descargarte el repositorio. Una vez descargado, debes realizar todas las modificaciones. Finalmente, comprime todo el repositorio (sin la carpeta vendor/) en un archivo zip y envía el fichero zip al e-mail que se te indicaba previamente.

La prueba está formada por una pregunta puramente de programación para poder analizar los conocimientos que tienes sobre arquitectura DDD/Clean Arquitecture.

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

y nos piden realizar la siguiente tarea para que la API sea capaz de obtener y crear un presupuesto.

TAREA T1

La API tiene que ser capaz de recibir una petición POST api/budgets y ser capaz de crear un presupuesto. LA petición será de este tipo:

...

El importe del IVA (vatAmount) se calcula: (netAmount * vat) / 100.

La cantidad total de una línea de presupuesto se calcula a partir de la suma de la cantidad neta (netAmount) y el importe del IVA (vatAmount).

La cantidad total de un presupuesto será la suma de las cantidades totales de todas las líneas del presupuesto.

**Se debe crear todos los Unit, Feature tests necesarios para testear la funcionalidad**
