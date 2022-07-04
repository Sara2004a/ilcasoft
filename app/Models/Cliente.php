<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 *
 * @property $IdCliente
 * @property $Nombre
 * @property $Apellido
 * @property $Cedula
 * @property $Telefono
 * @property $Direccion
 * @property $Email
 * @property $Estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Venta[] $ventas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{
    
    static $rules = [
		'IdCliente' => 'required',
		'Nombre' => 'required',
		'Apellido' => 'required',
		'Cedula' => 'required',
		'Telefono' => 'required',
		'Direccion' => 'required',
		'Email' => 'required',
    ];

    protected $perPage = 20;
    protected $primaryKey = 'IdCliente';


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre','Apellido','Cedula','Telefono','Direccion','Email','Estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventas()
    {
        return $this->hasMany('App\Models\Venta', 'Clientes_IdCliente', 'IdCliente');
    }
    

}
