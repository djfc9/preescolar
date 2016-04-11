<?php
App::uses('AppModel', 'Model');
/**
 * PersonasTipoPersona Model
 *
 * @property Persona $Persona
 * @property TipoPersona $TipoPersona
 */
class PersonasTipoPersona extends AppModel {


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
		'TipoPersona' => array(
			'className' => 'TipoPersona',
			'foreignKey' => 'tipo_persona_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
