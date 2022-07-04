<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Proveedore
 *
 * @property $IdProveedor
 * @property $NombreEmpresa
 * @property $Nit
 * @property $Email
 * @property $Nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Compra[] $compras
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Proveedore extends Model
{
    
    static $rules = [
		'NombreEmpresa' => 'required',
    ];

    protected $perPage = 20;
    protected $primaryKey = 'IdProveedor';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $guarded=[];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function compras()
    {
        return $this->hasMany('App\Models\Compra', 'Proveedores_IdProveedor', 'IdProveedor');
    }
    

}
