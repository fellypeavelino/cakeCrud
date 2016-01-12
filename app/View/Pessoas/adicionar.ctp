<?php
	echo $this->Form->create('Pessoa');
	echo $this->Form->input('nm_pessoa',array(
			'label' => __('Nome', true),
			'required' => 'require'
		));
	echo $this->Form->input('nm_email',array(
			'label' => __('Email', true),
			'required' => 'require'
		));
	echo $this->Form->input('Enviar', array('label' => FALSE, 'type' => 'submit'));
	echo $this->Form->end();
?>
