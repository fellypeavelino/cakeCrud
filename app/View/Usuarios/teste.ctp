<?
	echo print_r($usuarios,true);
?>
<?php echo $this->Session->read('usuarioID'); ?>
<?php 
echo $this->Form->create('Usuario');
echo $this->Form->input('field', array('options' => array(
    'Value 1'=>'Label 1',
    'Value 2'=>'Label 2',
    'Value 3'=>'Label 3'
 ))); 
echo $this->Form->end(); 
 ?>
