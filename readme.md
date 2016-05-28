## RFuerzo 
####- la plataforma de apoyo al aprendizaje

RFuerzo es un proyecto realizado como parte del proyecto de fin de ciclo  Desarrollo de Aplicaciones Web (DAW) del Centro Especifico de Educacion a Distacia de la Comunida Valenciana [ CEEDCV ](https://www.ceedcv.org).

El proyecto se distribuye bajo licencia* Creative Commons* [![BY-NC-SA](http://es.creativecommons.org/blog/wp-content/uploads/2013/04/by-nc-sa.eu_petit.png)](http://creativecommons.org/licenses/by-nc-sa/3.0/es/). El software se distribuye tal cual, sin ninguna garantia.

Puedes utilizar nuestra [demo](www.rfuerzo.hol.es), y usar los distintos roles descritos en la [ tabla](#TablaRoles) de roles, que encontraras más abajo.

Para colaborar ponte en contacto conmigo [Sergio Estada](https://github.com/sergi10)

Para reportar algún [error]( https://github.com/sergi10/rfuerzo/issues)

#####Fork Me!!! [![ForkMe](https://upload.wikimedia.org/wikipedia/commons/thumb/6/61/AB-Vzw.svg/16px-AB-Vzw.svg.png)](https://github.com/login?return_to=%2Fsergi10%2Frfuerzo)
## Manual de usuario

#### Alumno
**Realización de Tareas**

Los alumnos registrados tendrán acceso a las tareas publicadas. El administrador
del sistema les proporcionará el usuario y contraseña para poder acceder a la
plataforma. Tanto las Tareas como los Temas disponen de una ayuda auditiva
para facilitar la información a alumnos con deficiencias visuales, además, esta
ayuda pretende ser una explicación más exhaustiva de como se debe realizar la
tarea.

#### Profesor
**Gestión de Temas**

Los usuarios del sistema registrados como profesores, podrán crear tantos Temas
como deseen. Cada Tema es un contenedor para añadir Tareas, que realizarán los
alumno. Debe tener un nombre único y poder así agrupar las tareas por un tema
en común. Un profesor que no sea administrador sólo podrá borrar y modificar
sus propios Temas. Tendrá acceso al resto de Temas que han creado el resto de
profesores.

**Gestión de Tareas**

El profesor deberá crear previamente las tareas a subir a la plataforma, hay gran
variedad de software que permite realizar este tipo de trabajo, yo he usado Hot
Potatoes, pero se puede usar cualquier otro. La gestión y edición de las tareas
corresponde al creador de cada una de ellas, de tal forma que un profesor que
no sea administrador sólo podrá borrar y modificar sus propias Tareas. Tendrá
acceso al resto de Tareas que han creado el resto de profesores.
Gestión de Notas
El profesor podrá incluir notas de las tareas que realizan sus alumnos.

#### Administrador
**Hot Potatoes**

[Hot Potatoes](https://hotpot.uvic.ca/index.php#downloads) es un sistema para crear ejercicios educativos que pueden realizar
posteriormente a través de la web. Los ejercicios que crea son del tipo respuesta
corta, selección múltiple, rellenar los huecos, crucigramas, emparejamiento y
variados. Su licencia no es libre, pero a partir del 1 de septiembre de 2009 se
distribuye la versión sin limitaciones a través de la sección[ Descargas]( http://hcmc.uvic.ca/) de su sitio
web. Hot Potatoes está creado por el centro de humanidades y computación de
la [Universidad de Victoria](http://hcmc.uvic.ca/), en Canadá. Para asuntos comerciales se ha creado la
empresa Half-Baked Software Inc. Consta de varios programas o esquemas
predeterminados (también los llamaremos simplemente "patatas") que sirven
para la elaboración de diversos tipos de ejercicios interactivos multimedia. 

**Gestión de usuarios **

Desde los diferentes menús se puede realizar los distintos
trabajos de mantenimiento de usuario y tareas. Un usuario administrador puede
visualizar, crear, actualizar y borrar cualquier tipo de registro , precaución con
las posibles perdidas de información.
Primer acceso Al realizar la importación de los datos de carga iniciales en la base
de datos, se crea automáticamente un usuario adminRfuezo con la contraseña:
adminRfuezo. Una vez finalizada la instalación del sistema, es recomendable
cambiar dicha contraseña o crear un nuevo profesor con el rol de
'Administrador'.

<a id="TablaRoles"></a>
**Usuarios predefinidos**

| Rol                            |   Usuario               |   Password          |
|--------------------|:------------------:|-----------------:|
| Administrador      | adminRefuezo | adminRefuezo |
| Profesor      | profe1 | profe1 |
| Alumno      |alumno1      |   alumno1 |


##Despliegue
Tan solo se requiere de un servidor web, en el que corra el servicio de php
5.5 o mayor y un motor de base de datos MySQL 5.5 o superior. Tendremos que
tener acceso a las carpetas de despliegue o bien por conexión ssh o por ftp,
también es importante poder disponer de los permisos necesarios para poder
cambiar los privilegios de algunas carpetas, ya que depende de la configuración
del servidor nos mostrará algún mensaje de error tras realizar una carga de
ficheros desde el formulario.

####Ficheros de configuración
Existen distintas formas de configurar la aplicación web, por un lado hay que
indicar a Laravel los datos de nuestra app, en el fichero rfuerzo/config/app.php
donde le podemos indicar desde la url, al timezone pasando por el tipo de debug
que queremos que se realice, se recomienda deshabilitar el debug para
servidores en producción. Es muy importante asignar una key a nuestra app para
identificarla de forma única y proporcionar un sesión con mejor encriptación. Para
generar esta key se puede utilizar el comando:

`php artisan key:generate`

Otra configuración importante es la del fichero **config/auth.php**, donde indicamos el
modelo que queremos utilizar para la autentificación en el sistema.
En el fichero**config/ filesystems.php** indicamos el tipo de almacenamiento que
usaremos en nuestra aplicación, existen varios sistemas predefinidos por el
sistema, en nuestro caso usaremos el 'driver' => 'local' para almacenar en el
propio directorio los ficheros importados y creados por los usuarios.
####El acceso a la base de datos 
Es gestionado por el fichero **config/database.php**, en el
cual se le puede indicar los datos de nuestra conexión y los datos del **servidor,basededatos, usuario, password** también se pueden
establecer estos datos desde el fichero **.env** que se encuentra en la carpeta raíz
del directorio de trabajo.
