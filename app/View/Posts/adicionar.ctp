<?php
	echo $this->Form->create('Post');
	echo $this->Form->input('nm_titulo',array(
			'label' => __('Titulo', true),
			'required' => 'require'
		)
	);
	echo $this->Form->input('ds_post',array(
			'label' => __('Post', true),
			'required' => 'require'
		));
	echo $this->Form->hidden('pessoa_id',array('value'=>$this->Session->read('pessoaID')));
	echo $this->Form->input('Enviar', array('label' => FALSE, 'type' => 'submit'));
	echo $this->Form->end();
?>
