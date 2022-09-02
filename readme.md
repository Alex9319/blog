## Backend Blog
La web la he orientado como si fuera el backend de un blog, podemos llegar al listado de los post y visualizarlos en una pagina, junto con los detalles del autor del post.
## Organización del código
He organizado el código de tal forma que cada acción la realiza un solo Controlador o Servicio, exceptuando la interfaz de los datos, que la he dejado actualmente para que funcione solo con la API: https://jsonplaceholder.typicode.com/.

## Librerias utilizadas
- Backend
    - PHP 8.1
    - Symfony 6 webpack
    - Validator de Symfony
    - php Unit
- Frontend
    - Bootstrap
    - FontAwesome
    - Jquery
    - Datatable

## Soluciones alternativas a probar 
Como puntos de mejora creo que la API debería tener algún tipo de validación de acceso ya sea por un token o por usuario y contraseña los cuales tubieran un rol y dependiendo de ese rol puedas leer, escribir o ambas funcionalidades.
Por otra parte también haría una integración con mysql para tener persistencia de los datos por eso he creado la interfaz para dejar abierto este tema.