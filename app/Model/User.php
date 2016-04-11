<?php
App::uses('AppModel', 'Model', 'AuthComponent', 'Controller/Component');

/**
 * User Model
 *
 * @property Question $Question
 */
class User extends AppModel {
    
    
    public $displayField = 'username';

    

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Usuario no debe ser vacio',
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
                                //'isUnique' => true,
				'message' => 'Usuario usado por otra persona, Use otro por favor.',
			),
                        
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),

                    'minLength' => array(
				'rule' => array('minLength', 6, 'custom','/[A-Z]{1}[0-9]{1}[a-z]{1}$/'),
                                'message' => 'Su contraseña debe tener al menos 6 caracteres entre Mayusculas, Minusculas y Numeros',
                        ),
		),
		'respuesta' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'question_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
            'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Ingrese un correo valido',
			),
                        'isUnique' => array(
				'rule' => array('isUnique'),
                                //'isUnique' => true,
				'message' => 'Este correo esta siendo usado por otra persona.',
			),
		),
            'group_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Seleccione un grupo valido',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            'user_id' => array(
			'unico' => array(
				'rule' => array('isUnique'),
				'message' => 'Usted ya tiene un perfil Registrado en el sistema',
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
		'Question' => array(
			'className' => 'Question',
			'foreignKey' => 'question_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	/*funcion para encriptar la clave del usuario al registrarse*/
public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['password'])) {
        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
    }
    return true;
}

     /////////////////////////////////////////
    public $actsAs = array(
        'Acl' => array('type' => 'requester'));

    public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        } else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        } else {
            return array('Group' => array('id' => $groupId));
        }
       
    }
    
    public function bindNode($user){
        return array('model'=>'Group', 'foreign_key'=>$user['User']['group_id']);
    }
    

        
        
        
        ///////////////////////////////////////
    
    
    ///////////////para el captcha///////////////////
     /*public $actsAs = array(
        'Captcha' => array(
            // We will be handling 2 captcha controls on the form
            'field' => array('captcha', 'captcha-2'),
            'error' => 'Código invalido'
        )
    );*/
    ///////////////////////////////////////////////////

}
