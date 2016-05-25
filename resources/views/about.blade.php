@extends('layout.default')
@section('title')
Modo de Uso
@stop

@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading"><h1> Modo de uso</h1></div>
			<section>
				<h2>Alumno</h2>
				<div class="panel-body">
					<article>
						<header class ="label label-default">Realización de Tareas</header>
					</br>
					Los alumnos registrados tendrán acceso a las tareas publicadas. El administrador del sistema les proporcionará el usuario y contraseña para poder acceder a la plataforma.
					Tanto las Tareas como los Temas disponen de una ayuda auditiva para facilitar la información a alumnos con deficiencias visuales, además, esta ayuda pretende ser una explicación más exhaustiva de como se debe realizar la tarea.
				</br>
				</article>
				</div>
			</section>
			<div class="separador"></div>
			<section>
				<h2>Profesor</h2>
				<div class="panel-body">
					<article>
					<header class ="label label-default">Gestión de Temas</header>
						</br>
						Los usuarios del sistema registrados como profesores, podrán crear tantos Temas como deseen. Cada Tema es un contenedor para añadir Tareas, que realizarán los alumno. Debe tener un nombre único y poder así agrupar las tareas por  un tema en común.
						Un profesor que no sea administrador sólo podrá borrar y modificar sus propios Temas. Tendrá acceso al resto de Temas que han creado el resto de profesores.
						</br>
					<header class ="label label-default">Gestion de Tareas</header>
					</br>
					El profesor deberá crear previamente las tareas a subir a la plataforma, hay gran variedad de software que permite realizar este tipo de trabajo, yo he usado <a href="#hotpotatoes">Hot Potatoes</a>, pero se puede usar cualquier otro. La gestión y edición de las tareas corresponde al creador de cada una de ellas, de tal forma que un profesor que no sea administrador sólo podrá borrar y modificar sus propias Tareas. Tendrá acceso al resto de Tareas que han creado el resto de profesores.
					</br>
					<header class ="label label-default">Gestion de Notas</header>
					</br>
					El profesor podrá incluir notas de las tareas que realizán sus alumnos.
					</br>
					</article>
				</div>
			</section>
			<div class="separador"></div>
			<section>
				<h2>Administrador</h2>
				<div class="panel-body">
					<article>
						<header class ="label label-default" id="hotpotatoes">Hot Potatoes</header>
					</br>
						<a href="https://hotpot.uvic.ca/">Hot Potatoes</a> es un sistema para crear ejercicios educativos que pueden realizar posteriormente a través de la web. Los ejercicios que crea son del tipo respuesta corta, selección múltiple, rellenar los huecos, crucigramas, emparejamiento y variados. 
						Su licencia no es libre, pero a partir del 1 de septiembre de 2009 se distribuye la versión sin limitaciones a través de la sección <a href="https://hotpot.uvic.ca/index.php#downloads">Descargas</a> de su sitio web.
						Hot Potatoes está creado por el centro de humanidades y computación de la <a href="http://hcmc.uvic.ca/">Universidad de Victoria</a>, en Canadá. Para asuntos comerciales se ha creado la empresa Half-Baked Software Inc.

						Consta de varios programitas o esquemas predeterminados (también los llamaremos simplememente "patatas") que sirven para la elaboración de diversos tipos de ejercicios interactivos multimedia.

						Estos ejercicios se podrán publicar en un servidor Web y difundir a través de Internet, y ofrecen la gran ventaja de ser soportados por todos los navegadores modernos ( fuente: <a href="http://www.ite.educacion.es/formacion/materiales/62/cd/modulo_1_primeros_pasos/qu_es_hot_potatoes.html" title="Ministerio de Educación y Ciencia" >Instituto de Tecnologías Educativas</a>). En este enlace se puede leer una pequeña introducción al uso de esta herramienta.
						<blockquote>
							<li><a href="http://platea.pntic.mec.es/~iali/CN/HotPot60/tutorial.htm">Manual interactivo </a></li>
							<li><a href="http://es.slideshare.net/adrysilvav/manual-hot-potatoes-6">Manual Hot Potatoes 6</a><footer> por Adriana Silva Villareal (Universidad de Madrid)</footer></li>
							<li><a href="https://campusvirtual.uca.es/uca/es/show/docexterna/hot_potatoe2">Ejercicios de ejemplo</a><footer> Universidad de Cadiz</footer></li>
						</blockquote>
					</article>
					<article>
						<header class ="label label-default">Gestión de usuarios</header>
						Desde los diferentes menús se puede realizar los distintos trabajos de mantenimiento de usuario y tareas. Un usuario administrador puede visualizar, crear, actualizar y borrar cualquier tipo de registro , precaución con las posibles perdidas de información.
						</br>
						<header class ="label label-default">Primer acceso</header>
						Al realizar la importación de los datos de carga iniciales en la base de datos, se crea automáticamente un usaurio adminRfuerzo con la contraseña: adminRfuerzo.
						Una vez finalizada la instalación del sistema, es recomendable cambiar dicha contraseña o crear un nuevo profesor con el rol de 'Administrador'.	
						<h3>usuarios predefinidos</h3>
						<blockquote>
							<table class="table table-striped">
								<tr>
									<th>Rol</th>
									<th>Usuario</th>
									<th>Password</th>
								</tr>
								<tr class="danger">
									<td>Administrador</td>
									<td>adminRefuezo</td>
									<td>adminRefuezo</td>
								</tr>
								<tr class="info">
									<td>Profesor</td>
									<td>profe1</td>
									<td>profe1</td>
								</tr>
								<tr class="info">
									<td>Profesor</td>
									<td>profe2</td>
									<td>profe2</td>
								</tr>
								<tr class="success">
									<td>Alumno</td>
									<td>alumno1</td>
									<td>alumno1</td>
								</tr>
								<tr class="success">
									<td>Alumno</td>
									<td>alumno2</td>
									<td>alumno2</td>
								</tr>
							</table>
						</blockquote>
						</br>
					</article>
				</div>
			</section>
			<div class="separador"></div>			
		</div>
	</div>
</div>
@stop