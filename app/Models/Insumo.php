<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Insumo
 *
 * @property $IdInsumo
 * @property $Nombre
 * @property $Cantidad
 * @property $Estado
 * @property $UnidadesMedida_IdUnidadMedida
 * @property $created_at
 * @property $updated_at
 *
 * @property Detallecompra[] $detallecompras
 * @property Productosinsumo[] $productosinsumos
 * @property Unidadesmedida $unidadesmedida
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Insumo extends Model
{
    
    static $rules = [
		'Nombre' => 'required',
		'Cantidad' => 'required',
        'Precio'=>'required',
		'Estado' => 'required',
		'UnidadesMedida_IdUnidadMedida' => 'required',
    ];

    protected $perPage = 20;
    protected $primaryKey = 'IdInsumo';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre','Cantidad','Precio','Estado','UnidadesMedida_IdUnidadMedida'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detallecompras()
    {
        return $this->hasMany('App\Models\Detallecompra', 'Insumos_IdInsumo', 'IdInsumo');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productosinsumos()
    {
        return $this->hasMany('App\Models\Productosinsumo', 'Insumos_IdInsumo', 'IdInsumo');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function unidadesmedida()
    {
        return $this->hasOne('App\Models\Unidadesmedida', 'IdUnidadMedida', 'UnidadesMedida_IdUnidadMedida');
    }
    

}
