<?php
App::uses('AppModel', 'Model');
/**
 * AlumnosProblemasAprendizaje Model
 *
 * @property ProblemaAprendizaje $ProblemaAprendizaje
 * @property Alumno $Alumno
 */
class AlumnosProblemasAprendizaje extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ProblemaAprendizaje' => array(
			'className' => 'ProblemaAprendizaje',
			'foreignKey' => 'problema_aprendizaje_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Alumno' => array(
			'className' => 'Alumno',
			'foreignKey' => 'alumno_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
