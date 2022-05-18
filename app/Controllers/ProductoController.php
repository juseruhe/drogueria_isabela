<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Producto;

class ProductoController extends BaseController
{
	public function index()
	{
		// template 
		$head['titulo'] = 'Droguería La Isabela';
		$template["head"] = view('layout/admin/head', $head);
		$template["footer"] = view('layout/admin/footer');
		$template["crearProducto"] = view('productos/crear');
		$template["editarProducto"] = view('productos/editar');
		$template["eliminarProducto"] = view('productos/eliminar');

		return view('productos/productos', $template);
	}

	public function mostrarProductos()
	{
		$modelo = new Producto();
		$consulta = $modelo->findAll();
		return $this->response->setJSON($consulta);
	}

	public function crearProducto()
	{
		$modelo = new Producto();

		$datos = [
			"nombre" =>  $this->request->getPost('nombre'),
			"codigo_barras" => $this->request->getPost('codigo_barras'),
			"precio" =>  $this->request->getPost('precio')
		];

		$consulta = $modelo->insert($datos);

		return $this->response->setJSON($consulta);
	}

	public function mostrarProducto($id)
	{
		$modelo = new Producto();
		$consulta = $modelo->where('id', $id)->first();

		return $this->response->setJSON($consulta);
	}

	public function actualizarProducto($id)
	{

		$modelo = new Producto();

		$request = $this->request->getRawInput();

		$datos = [
			"nombre" => $request['nombre'],
			"codigo_barras" =>  $request['codigo_barras'],
			"precio" => $request['precio']
		];

		$consulta = $modelo->update($id, $datos);

		$consultaProducto = $modelo->where('id', $id)->first();

		return $this->response->setJSON($consultaProducto);
	}

	public function eliminarProducto($id)
	{
		$modelo = new Producto();

		$consultaProducto = $modelo->where('id',$id)->first();

		$consulta = $modelo->where('id',$id)->delete();

		return $this->response->setJSON($consultaProducto);

	}
}
