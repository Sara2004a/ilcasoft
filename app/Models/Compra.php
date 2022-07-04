<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Compra
 *
 * @property $IdCompra
 * @property $Factura
 * @property $Total
 * @property $Fecha
 * @property $Estado
 * @property $Proveedores_IdProveedor
 * @property $created_at
 * @property $updated_at
 *
 * @property Detallecompra[] $detallecompras
 * @property Proveedore $proveedore
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Compra extends Model
{
    
    static $rules = [
		'Factura' => 'required',
		'Total' => 'required',
		'Fecha' => 'required',
		'Estado' => 'required',
		'Proveedores_IdProveedor' => 'required',
    ];

    protected $perPage = 20;
    protected $primaryKey = 'IdCompra';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Factura','Total','Fecha','Estado','Proveedores_IdProveedor'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detallecompras()
    {
        return $this->hasMany('App\Models\Detallecompra', 'Compras_IdCompra', 'IdCompra');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proveedore()
    {
        return $this->hasOne('App\Models\Proveedore', 'IdProveedor', 'Proveedores_IdProveedor');
    }
    

}
