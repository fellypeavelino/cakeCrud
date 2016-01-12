<?
class Pessoa extends AppModel{
	public $hasMany = array(
        'Post' => array(
            'className' => 'Post',
            'dependent' => true
        )
    );
}