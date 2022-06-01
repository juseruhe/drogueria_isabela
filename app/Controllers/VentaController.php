<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Factura;
use App\Models\ProductoVenta;
use App\Models\Sell;
use App\Models\Venta;
use CodeIgniter\I18n\Time;

class VentaController extends BaseController
{
	public function index()
	{
			// template 
			$head['titulo'] = 'Droguería La Isabela';
			$template["head"] = view('layout/admin/head', $head);
			$template["footer"] = view('layout/admin/footer');

			return view('ventas/ventas', $template);
	}
	public function crearVenta(){
		$modelo = new Venta();
		$modeloFactura = new Factura();
		$modeloProductoVenta = new ProductoVenta();
 
		$datosFactura = [
			"fecha" => new Time()
		];

		$consultaFactura = $modeloFactura->insert($datosFactura);

		$consultaFacturaMostrar = $modeloFactura->select('id')
		->orderBy('id','desc')
		->first();

		$consultaProductoVenta = $modeloProductoVenta->findAll();

		foreach($consultaProductoVenta as $productoVenta){
         
		  $consulta = $modelo->insert([
			  "factura_id" => $consultaFacturaMostrar['id'],
			  "producto_id" => $productoVenta['producto_id'],
			  "cantidad"  => $productoVenta['cantidad']
		  ]);
		
		}

        $consultaProductoVentaEliminar = $modeloProductoVenta->truncate();

		$consultaVenta = $modelo->findAll();


        return $this->response->setJSON($consultaVenta);

	}

	public function mostrarVentasDia(){
		$modelo = new Venta();
		$consulta = $modelo->select('sum(productos.precio * cantidad) as ventas_dia')
		->join('productos','productos.id = ventas.producto_id','inner')
		->join('facturas','facturas.id = ventas.factura_id ','inner')
		->where('facturas.fecha','curdate()',false)
		->first();

		return $this->response->setJSON($consulta);
	}

	public function mostrarVentasMes(){
		$modelo = new Venta();
		$consulta = $modelo->select('sum(productos.precio * cantidad) as ventas_mes')
		->join('productos','productos.id = ventas.producto_id','inner')
		->join('facturas','facturas.id = ventas.factura_id ','inner')
		->where('month(facturas.fecha)','month(curdate())',false)
		->first();

		return $this->response->setJSON($consulta);
	}

	public function mostrarVentasAnio(){
		$modelo = new Venta();
		$consulta = $modelo->select('sum(productos.precio * cantidad) as ventas_anio')
		->join('productos','productos.id = ventas.producto_id','inner')
		->join('facturas','facturas.id = ventas.factura_id ','inner')
		->where('year(facturas.fecha)','year(curdate())',false)
		->first();

		return $this->response->setJSON($consulta);
	}

	public function mostrarTotalVentas(){
		$modelo = new Venta();
		$consulta = $modelo->select('day(facturas.fecha) as dia, 
		sum(productos.precio * cantidad) as total')
		->join('productos','productos.id = ventas.producto_id','inner')
		->join('facturas','facturas.id = ventas.factura_id','inner')
		->where('month(facturas.fecha)','month(curdate())',false)
		->groupBy('facturas.fecha')
		->findAll();

		return $this->response->setJSON($consulta);
	}

}
