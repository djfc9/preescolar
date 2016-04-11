<?php
App::uses('AppModel', 'Model');
/**
 * Persona Model
 *
 * @property Estado $Estado
 * @property Municipio $Municipio
 * @property Parroquia $Parroquia
 * @property Sexo $Sexo
 * @property Cargo $Cargo
 * @property User $User
 * @property TipoPersona $TipoPersona
 * @property Alumno $Alumno
 * @property GradosSeccione $GradosSeccione
 */
class Persona extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nombre';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nombre' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'apellido' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cedula' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Debe ingresar una cédula',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
                        'IsUnique' => array(
				'rule' => array('IsUnique'),
				'message' => 'esta cédula ya esta registrada',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'direccion' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'estado_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'municipio_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'parroquia_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sexo_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            'autorizado' => array(
			'notempty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
                ),
            'telefono_movil'=> array(
                'formato' => array(
				'rule' => array('custom','/[0-9]{4}-[0-9]{7}$/'),
				'message' => 'El Formato valido es Ejm. 0416-5555555',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            ),
            'telefono_local'=> array(
                'formato' => array(
				'rule' => array('custom','/[0-9]{4}-[0-9]{7}$/'),
				'message' => 'El Formato valido es Ejm. 0212-5555555',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            ),
          /*  'telefono_trabajo'=> array(
                'formato' => array(
				'rule' => array('custom','/[0-9]{4}-[0-9]{7}$/'),
				'message' => 'El Formato valido es Ejm. 0212-5555555',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            ),*/
            'cargo_id'=> array(
                'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Debe seleccionar su cargo',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            ),
            'tipo_persona_id'=> array(
                'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Debe seleccionar el parentesco',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            ),
                       /* 'foto' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'La Foto es requerida',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),*/

	); 
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	/*public $belongsTo = array(
		'Estado' => array(
			'className' => 'Estado',
			'foreignKey' => 'estado_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Municipio' => array(
			'className' => 'Municipio',
			'foreignKey' => 'municipio_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Parroquia' => array(
			'className' => 'Parroquia',
			'foreignKey' => 'parroquia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Sexo' => array(
			'className' => 'Sexo',
			'foreignKey' => 'sexo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Cargo' => array(
			'className' => 'Cargo',
			'foreignKey' => 'cargo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
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

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	/*public $hasAndBelongsToMany = array(
		'Alumno' => array(
			'className' => 'Alumno',
			'joinTable' => 'alumnos_personas',
			'foreignKey' => 'persona_id',
			'associationForeignKey' => 'alumno_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'GradosSeccione' => array(
			'className' => 'GradosSeccione',
			'joinTable' => 'grados_secciones_personas',
			'foreignKey' => 'persona_id',
			'associationForeignKey' => 'grados_seccione_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);
        */
        
                ///////Para subir las fotos//////////////
        public $actsAs = array(
    'MeioUpload' => array(
        'foto' => array(
            'dir' => 'img{DS}{ModelName}{DS}{fieldName}',
            'createDirectory' => true,
            'allowedMime' => array('image/jpeg', 'image/pjpeg', 'image/png'),
            'allowedExt' => array('.jpg', '.jpeg', '.png','.gif'),
            'default' => 'default.jpg',
        )
    )
);
        
        public $belongsTo = array(
		'Estado' => array(
			'className' => 'Estado',
			'foreignKey' => 'estado_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Municipio' => array(
			'className' => 'Municipio',
			'foreignKey' => 'municipio_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Parroquia' => array(
			'className' => 'Parroquia',
			'foreignKey' => 'parroquia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Sexo' => array(
			'className' => 'Sexo',
			'foreignKey' => 'sexo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Cargo' => array(
			'className' => 'Cargo',
			'foreignKey' => 'cargo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Alumno' => array(
			'className' => 'Alumno',
			'joinTable' => 'alumnos_personas',
			'foreignKey' => 'persona_id',
			'associationForeignKey' => 'alumno_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'GradosSeccione' => array(
			'className' => 'GradosSeccione',
			'joinTable' => 'grados_secciones_personas',
			'foreignKey' => 'persona_id',
			'associationForeignKey' => 'grados_seccione_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'TipoPersona' => array(
			'className' => 'TipoPersona',
			'joinTable' => 'personas_tipo_personas',
			'foreignKey' => 'persona_id',
			'associationForeignKey' => 'tipo_persona_id',
			//'unique' => 'keepExisting',
                        'unique' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);


}
