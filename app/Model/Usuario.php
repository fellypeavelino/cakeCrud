<?

class Usuario extends AppModel{
	//var $name = 'User';
	var $validate = array(
		'login' => array(
            'alphanumeric' => array(
                'rule' => 'alphaNumeric',
                'required' => true,
                'message' => 'Letras e números somente'
                )
		)
	);	
}