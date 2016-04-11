<?php
App::uses('AppModel', 'Model');
/**
 * Noticia Model
 *
 */
class Noticia extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'descripcion';
        
        public $validate = array(
            'descripcion' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Agregue un contenido de la noticia',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
        );

}
