<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pedido
 *
 * @property $IdPedido
 * @property $FechaPedido
 * @property $TotalPedido
 * @property $Estado
 * @property $Clientes_IdCliente
 *
 * @property Cliente $cliente
 * @property Detallepedido[] $detallepedidos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pedido extends Model
{
    
    static $rules = [
		'IdPedido' => 'required',
		'FechaPedido' => 'required',
		'TotalPedido' => 'required',
		'Clientes_IdCliente' => 'required',
    ];

    protected $perPage = 20;
    protected $primaryKey = 'IdPedido';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['IdPedido','FechaPedido','TotalPedido','Estado','Clientes_IdCliente'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'IdCliente', 'Clientes_IdCliente');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detallepedidos()
    {
        return $this->hasMany('App\Models\Detallepedido', 'Pedidos_IdPedido', 'IdPedido');
    }
    

}
