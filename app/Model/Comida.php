<?php
App::uses('AppModel', 'Model');
/**
 * Comida Model
 *
 */
class Comida extends AppModel {
    
    public $validate = array(
            'created' => array(
			'unico' => array(
				'rule' => array('isUnique'),
				'message' => 'Ya Existe un Menú creado para el dia de Hoy',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

}
