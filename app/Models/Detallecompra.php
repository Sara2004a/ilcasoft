<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Detallecompra
 *
 * @property $IdDetalleCompra
 * @property $Cantidad
 * @property $Precio
 * @property $Estado
 * @property $Insumos_IdInsumo
 * @property $Compras_IdCompra
 * @property $created_at
 * @property $updated_at
 *
 * @property Compra $compra
 * @property Insumo $insumo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Detallecompra extends Model
{
    
    static $rules = [
		'Cantidad' => 'required',
		'Precio' => 'required',
		'Estado' => 'required',
		'Insumos_IdInsumo' => 'required',
		'Compras_IdCompra' => 'required',
    ];

    protected $perPage = 20;
    protected $primaryKey = 'IdDetalleCompra';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Cantidad','Precio','Estado','Insumos_IdInsumo','Compras_IdCompra'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function compra()
    {
        return $this->hasOne('App\Models\Compra', 'IdCompra', 'Compras_IdCompra');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function insumo()
    {
        return $this->hasOne('App\Models\Insumo', 'IdInsumo', 'Insumos_IdInsumo');
    }
    

}
