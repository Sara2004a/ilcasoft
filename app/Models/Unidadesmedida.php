<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Unidadesmedida
 *
 * @property $IdUnidadMedida
 * @property $Descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @property Insumo[] $insumos
 * @property Producto[] $productos
 * @property Productosinsumo[] $productosinsumos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Unidadesmedida extends Model
{
    protected $table = 'unidadesmedida';
    
    static $rules = [
		'Descripcion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Descripcion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function insumos()
    {
        return $this->hasMany('App\Models\Insumo', 'UnidadesMedida_IdUnidadMedida', 'IdUnidadMedida');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productos()
    {
        return $this->hasMany('App\Models\Producto', 'UnidadesMedida_IdUnidadMedida', 'IdUnidadMedida');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productosinsumos()
    {
        return $this->hasMany('App\Models\Productosinsumo', 'UnidadesMedida_IdUnidadMedida', 'IdUnidadMedida');
    }
    

}
