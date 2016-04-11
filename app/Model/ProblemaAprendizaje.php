<?php
App::uses('AppModel', 'Model');
/**
 * ProblemaAprendizaje Model
 *
 * @property AlumnosProblemasAprendizaje $AlumnosProblemasAprendizaje
 * @property Salud $Salud
 */
class ProblemaAprendizaje extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'descripion';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'descripion' => array(
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
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'AlumnosProblemasAprendizaje' => array(
			'className' => 'AlumnosProblemasAprendizaje',
			'foreignKey' => 'problema_aprendizaje_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Salud' => array(
			'className' => 'Salud',
			'foreignKey' => 'problema_aprendizaje_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
