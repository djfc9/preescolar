<?php
App::uses('AppModel', 'Model');
/**
 * AlumnosPersona Model
 *
 * @property Persona $Persona
 * @property Alumno $Alumno
 * @property TipoPersona $TipoPersona
 */
class AlumnosPersona extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Persona' => array(
			'className' => 'Persona',
			'foreignKey' => 'persona_id',
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
		),
		'TipoPersona' => array(
			'className' => 'TipoPersona',
			'foreignKey' => 'tipo_persona_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
