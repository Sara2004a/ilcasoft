<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\productos;

/**
 * Class Detallepedido
 *
 * @property $IdDetallePedido
 * @property $Cantidad
 * @property $TotalDetallePedido
 * @property $Pedidos_IdPedido
 * @property $Productos_IdProducto
 *
 * @property Pedido $pedido
 * @property Producto $producto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Detallepedido extends Model

{
    protected $guarded=[];
    
    static $rules = [
		'IdDetallePedido' => 'required',
		'Cantidad' => 'required',
		'TotalDetallePedido' => 'required',
		'Pedidos_IdPedido' => 'required',
		'Productos_IdProducto' => 'required',
    ];

    protected $perPage = 20;
    protected $primaryKey = 'IdPedido';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    //protected $guarded=[];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pedido()
    {
        return $this->hasOne('App\Models\Pedido', 'IdPedido', 'Pedidos_IdPedido');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'IdProducto', 'Productos_IdProducto');
    }
    
    public function unionProducto(){
        return $this->belongsTo(productos::class,'productos');
    }

}
