<?php
App::uses('AppModel', 'Model');
/**
 * AlumnosNorma Model
 *
 * @property Alumno $Alumno
 * @property Norma $Norma
 */
class AlumnosNorma extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'alumno_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'norma_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Alumno' => array(
			'className' => 'Alumno',
			'foreignKey' => 'alumno_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Norma' => array(
			'className' => 'Norma',
			'foreignKey' => 'norma_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
