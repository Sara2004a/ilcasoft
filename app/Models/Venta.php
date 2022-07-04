<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Venta
 *
 * @property $IdVenta
 * @property $Estado
 * @property $Clientes_IdCliente
 * @property $created_at
 * @property $updated_at
 *
 * @property Cliente $cliente
 * @property Detalleventa[] $detalleventas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Venta extends Model
{
    
    static $rules = [
		'IdVenta' => 'required',
		'Clientes_IdCliente' => 'required',
    ];

    protected $perPage = 20;
    protected $primaryKey = 'IdVenta';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['IdVenta','Estado','Clientes_IdCliente'];


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
    public function detalleventas()
    {
        return $this->hasMany('App\Models\Detalleventa', 'Ventas_IdVenta', 'IdVenta');
    }
    

}
