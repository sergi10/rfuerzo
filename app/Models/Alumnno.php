<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumnno extends Model
{
    public static $rules = array(
    'nombre'=>'required|min:2',
    'apellidos'=>'required|min:2',    
    'mail'=>'required|email',
    'user'=>'required|min:2',
    'pass'=>'required|min:2',
    'avatar'=>'required|min:2',
    'f-nac'=>'required|min:2',
    'centro_id'=>'required|min:2'
    );

    protected $table = 'alumno';
	protected $fillable = array('id','nombre','apellidos','mail','user','pass','avatar', 'f-nac','cenro_id');
	public $timestamps=true;

	/**
	* Metodo para devolver datos calculados sobre las tabla
	* @return string 
	**/
	public function getFullNameAttribute(){
		return this->nombre.' '.this->apellidos;
	}

	public function centro(){
		return this->hasOne('ejemplo1\Centro');
	}
 
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');
 
	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}
 
	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}
 
	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}
 
	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}
 
	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}
 
	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->mail;
	}
 
}
?>
}
