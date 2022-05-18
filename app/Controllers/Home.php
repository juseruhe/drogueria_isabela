<?php

namespace App\Controllers;

use App\Models\Usuario;

class Home extends BaseController
{
	public function index()
	{
		// template 
		$head['titulo'] = 'Iniciar Sesión';
		$template["head"] = view('layout/login/head', $head);
		$template["footer"] = view('layout/login/footer');
		return view('login', $template);
	}

	public function login()
	{
		$modelo = new Usuario();

		$sha1 = sha1($this->request->getPost('contrasena'));

		$consulta = $modelo->select('usuarios.numero_documento,usuarios.contrasena')
			->where('numero_documento',$this->request->getPost('numero_documento'))
			->where('contrasena', $sha1)
			->first();

		if($consulta > 0){
			$respuesta = $consulta;
		}else {
		    $respuesta = 0;
		}

		return $this->response->setJSON($respuesta);
	}

	public function main(){

			// template 
			$head['titulo'] = 'Droguería La Isabela';
			$template["head"] = view('layout/admin/head', $head);
			$template["footer"] = view('layout/admin/footer');
			return view('admin/main', $template);
	}
	
}
