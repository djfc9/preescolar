<?php
App::uses('GradosSeccionesController', 'Controller');

/**
 * GradosSeccionesController Test Case
 *
 */
class GradosSeccionesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.grados_seccione',
		'app.grado',
		'app.seccion',
		'app.alumno',
		'app.grados_secciones',
		'app.estatu',
		'app.sexo',
		'app.persona',
		'app.estado',
		'app.municipio',
		'app.parroquia',
		'app.cargo',
		'app.user',
		'app.question',
		'app.usuario',
		'app.privilegio',
		'app.privilegios_usuario',
		'app.group',
		'app.tipo_persona',
		'app.autorizados_alumno',
		'app.alumnos_persona',
		'app.salud',
		'app.tipo_parto',
		'app.tipo_problema_nacimiento',
		'app.problema_aprendizaje',
		'app.alumnos_problemas_aprendizaje',
		'app.complicacion_embarazo',
		'app.boleta',
		'app.alumnos_boleta',
		'app.evaluacion',
		'app.asignatura',
		'app.alumnos_evaluacion',
		'app.ficha',
		'app.alumnos_ficha',
		'app.norma',
		'app.alumnos_norma',
		'app.requisito',
		'app.alumnos_requisito',
		'app.alumnos_grados_seccione',
		'app.grados_secciones_persona'
	);

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {
	}

}
