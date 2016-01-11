<?

class UsuariosController extends AppController { 
	public $helpers = array("Form", "Html", "Session"); 

	public function index() {
		//$this->Session->valid()
		$this->Session->destroy();
		$this->set("title", "Usuários"); 
		$usuarios = $this->Usuario->find('all'); 
		$this->set('usuarios', $usuarios); 
	}
	
	public function teste2() { 
		$this->Session->write('usuarioID', 12);
		$this->Session->write('usuarioNome', 'Thiago Belem');
		$this->set("title", "Usuários"); 
		$usuarios = $this->Usuario->find('all');
		//$this->layout = 'Contacts.contact';
		$this->set('usuarios', $usuarios); 
		$this->render('index');
	}

	public function teste() { 
		$this->set("title", "Usuários"); 
		$usuario_ = $this->Session->read('usuarioID');
		$usuarios = $this->Usuario->find('all');
		//$this->layout = 'Contacts.contact';
		$this->set(array('usuarios' => $usuarios, 'session' => $usuario_)); 
		$this->render('teste');
	}	
	
	public function adicionar() { 
		$this->set('title', 'Adicionar usuário');
		
		if ($this->request->is("post")) { 
			$this->Usuario->create(); 
			if ($this->Usuario->saveAssociated($this->request->data)) { 
				$this->Session->setFlash(__("Registro salvo com sucesso.")); 
				$this->redirect(array("action" => '/index/')); 
			} else { 
				$this->Session->setFlash(__("Erro: não foi possível salvar o registro.")); 
				$this->redirect(array("action" => '/adicionar/')); 
			} 
		} 
	}
	
	public function editar($id = NULL) { 
		$this->set("title", "Editar Usuário"); 
		$this->Usuario->id = $id; 
		if (!$this->Usuario->exists()) { 
			throw new NotFoundException(__('Registro não encontrado.')); 
		} 
		if ($this->request->is('post') || $this->request->is('put')) { 
			if ($this->Usuario->saveAssociated($this->request->data)) { 
				$this->Session->setFlash(__('Registro salvo com sucesso.')); 
				$this->redirect(array('action' => '/index/')); 
			} else { 
				$this->Session->setFlash(__('Erro: não foi possível salvar o registro.')); 
			} 
		} else { 
			$this->request->data = $this->Usuario->read(NULL, $id); 
		} 
	}
	
	public function excluir($id = NULL) { 
		if (!$this->request->is('get')) { 
			throw new MethodNotAllowedException(); 
		} 
		$this->Usuario->id = $id; 
		if (!$this->Usuario->exists()) { 
			throw new NotFoundException(__('Registro não encontrado.')); 
		} 
		if ($this->Usuario->delete()) { 
			$this->Session->setFlash(__('Registro excluído com sucesso.')); 
			$this->redirect(array('action' => '/index/')); 
		} 
		$this->Session->setFlash(__('Erro: não foi possível excluir o registro.')); 
		$this->redirect(array('action' => '/index/')); 
	}


}

