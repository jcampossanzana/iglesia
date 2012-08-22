<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$username=strtolower($this->username);
        $user=Users::model()->find('LOWER(username)=?',array($username));
        if($user===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if(!$user->validatePassword($this->password)) //este metodo esta en el entity bean
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else {
			//guardamos el id para realizar acciones
            $this->_id = $user->id_usuario;
            $this->username = $user->username;
			switch($user->rol){
				case 1: 
					$this->setState('role', "admin");
					break;
				default:
					$this->setState('role', "normal");
					break;
			}
            $this->errorCode = self::ERROR_NONE;
        }
        return $this->errorCode==self::ERROR_NONE;
	}
	
	public function getId()
    {
        return $this->_id;
    }
}