<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductoVenta;

class ProductoVentaController extends BaseController
{
	public function index()
	{
		$head["titulo"] = "Droguería La Isabela";
		$template["head"] = view('layout/admin/head', $head);
		$template["footer"] = view('layout/admin/footer');
		$template["productos_encontrados"] = view('producto_venta/productos_encontrados');
		$template["editarProductoVenta"] = view('producto_venta/editar');
		$template["eliminarProductoVenta"] = view('producto_venta/eliminar');

		return view('producto_venta/producto_venta', $template);
	}

	public function mostrarProductosVentas(){
       $modelo = new ProductoVenta();
	   $consulta = $modelo->select('productos_ventas.id as id,productos.nombre as nombre,
	   productos.precio as precio,productos_ventas.cantidad as cantidad,')
	   ->join('productos','productos.id=productos_ventas.producto_id','inner')
	   ->findAll();
	   return $this->response->setJSON($consulta);
	}

	public function crearProductoVenta(){
		$modelo = new ProductoVenta();
        
		$datos = [
			"producto_id" => $this->request->getPost('producto_id'),
			"cantidad" => $this->request->getPost('cantidad')
		];

	   $consulta = $modelo->insert($datos);

	   return $this->response->setJSON($datos);
	}

	public function mostrarProductoVenta($id)
	{
		$modelo = new ProductoVenta();
		$consulta = $modelo->where('id', $id)->first();

		return $this->response->setJSON($consulta);
	}

	public function actualizarProductoVenta($id){
       $modelo = new ProductoVenta();
	   $request = $this->request->getRawInput();

	   $datos = [
		   "cantidad" => $request["cantidad"]
	   ];

	   $consulta = $modelo->update($id,$datos);

	   
		$consultaProductoVenta = $modelo->where('id', $id)->first();

	   return $this->response->setJSON($consultaProductoVenta);
	}

	public function eliminarProductoVenta($id){
		$modelo = new ProductoVenta();

		$consultaProductoVenta = $modelo->where('id', $id)->first();
		$consulta= $modelo->where('id',$id)->delete();

        return $this->response->setJSON($consultaProductoVenta);
	}
}
