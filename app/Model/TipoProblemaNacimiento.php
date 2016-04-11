<?php
App::uses('AppModel', 'Model');
/**
 * TipoProblemaNacimiento Model
 *
 * @property Salud $Salud
 */
class TipoProblemaNacimiento extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'descripcion';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Salud' => array(
			'className' => 'Salud',
			'foreignKey' => 'tipo_problema_nacimiento_id',
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
