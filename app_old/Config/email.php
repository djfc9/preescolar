<?php

class EmailConfig {

	public $default = array(
		'transport' => 'Mail',
		'from' => 'preescolarbolivarnino@mindeporte.gob.ve',
		'charset' => 'utf-8',
		'headerCharset' => 'utf-8',
	);

	public $smtp = array(
		'transport' => 'Smtp',
		'from' => array('preescolarbolivarnino@mindeporte.gob.ve' => 'Preescolar Bolivar Niño'),
		'host' => 'correo.mindeporte.gob.ve',   ///publico
		//'host' => '10.1.110.10',  local
		'port' => 25,
		'timeout' => 30,
		'username' => 'preescolarbolivarnino@mindeporte.gob.ve',
		'password' => 'ceibn99',
		'client' => null,
		'log' => false,
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);
        
        public $configuracion_segura = array(
		'transport' => 'Smtp',
		'from' => array('preescolarbolivarnino@mindeporte.gob.ve' => 'Preescolar Bolivar Niño'),
		'host' => '//smtp.gmail.com',
		'port' => 465,
		'timeout' => 30,
		'username' => 'usuario@gmail.com',
		'password' => 'contraseña',
		'client' => null,
		'log' => true,
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);

	/*public $fast = array(
		'from' => 'you@localhost',
		'sender' => null,
		'to' => null,
		'cc' => null,
		'bcc' => null,
		'replyTo' => null,
		'readReceipt' => null,
		'returnPath' => null,
		'messageId' => true,
		'subject' => null,
		'message' => null,
		'headers' => null,
		'viewRender' => null,
		'template' => false,
		'layout' => false,
		'viewVars' => null,
		'attachments' => null,
		'emailFormat' => null,
		'transport' => 'Smtp',
		'host' => 'localhost',
		'port' => 25,
		'timeout' => 30,
		'username' => 'user',
		'password' => 'secret',
		'client' => null,
		'log' => true,
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);*/

}
