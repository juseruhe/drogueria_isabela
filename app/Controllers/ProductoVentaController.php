<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProductoVentaController extends BaseController
{
	public function index()
	{
		$head["titulo"] = "Droguería La Isabela";
		$template["head"] = view('layout/admin/head',$head);
		$template["footer"] = view('layout/admin/footer');

		return view('producto_venta/producto_venta',$template);
	}
}
