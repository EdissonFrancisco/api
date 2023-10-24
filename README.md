# api - Edisson Francisco Acero Rodriguez

Este proyecto es una API RESTful hecha en PHP y Laravel que permite administrar videos y comentarios. 
La API está diseñada para ser utilizada por aplicaciones web y móviles.

Características principales

1. Permite crear, leer, actualizar y eliminar videos.
2. Permite crear, leer, actualizar y eliminar comentarios.
3. Utiliza una base de datos en MySQL para almacenar los datos.

   
Tecnologías utilizadas

* PHP: Para la lógica del back-end

* Laravel: Un framework PHP para desarrollar aplicaciones web

* MySQL: Una base de datos relacional

* composer y npm

Instalación

Para instalar la API, sigue estos pasos:

Clona el repositorio de GitHub.
Instala las dependencias con Composer.
Crea una base de datos MySQL.
Importa el esquema de la base de datos desde el archivo database/migrations/.
Configura la API en el archivo .env.


Uso

Para usar la API, puedes usar una herramienta de cliente HTTP como Postman


Diagrama ER BD

![BDapi](https://github.com/EdissonFrancisco/api/assets/109987805/4d7d1488-f5b1-48a5-b8ee-aa87e88bf2a7)


el control de las rutas lo realizo en routes/api.php
  //rutas de los videos
  Route::get('/videos', 'App\Http\Controllers\VideoController@index');//trae todos los videsos
  Route::post('/videos', 'App\Http\Controllers\VideoController@store');//Guarda un video
  Route::get('/videos/{video}', 'App\Http\Controllers\VideoController@show');//traer un video
  Route::put('/videos/{videoId}', 'App\Http\Controllers\VideoController@update');//actualizar los datos de un video
  Route::delete('/videos/{video}', 'App\Http\Controllers\VideoController@destroy');//borrar un video


  //comentarios
  Route::get('/comentarios', 'App\Http\Controllers\ComentarioController@index');//mostrar los comentarios del video
  Route::post('/comentarios', 'App\Http\Controllers\ComentarioController@store');//crear un comentario
  Route::put('/videos/{id}/comentarios/{idComentario}', 'App\Http\Controllers\ComentarioController@update');//actualizar un comentario
  Route::delete('/videos/{id}/comentarios/{idComentario}', 'App\Http\Controllers\ComentarioController@destroy');//eliminar


la creacion del api se realiza en la carpeta app - esta a su ves contiene las carpetas 
 * la carpeta Http contiene las carpetas 
    * controllers para los datos del crud
    * models contiene el modelo de las tablas 
 * la carpeta migrations contiene la estructura de los datos para crear la bd en mysql



