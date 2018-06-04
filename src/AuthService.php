<?php

namespace KeywordAPI;

use KeywordAPI\Exceptions\AuthException;

/**
 * Class AuthService
 * @package KeywordAPI
 */
class AuthService
{
    /**
     * Check user a guest
     *
     * @return bool
     */
    public function guest(): bool
    {
        return !$this->authenticated();
    }
    
    /**
     * Check user authenticated
     *
     * @return bool
     */
    public function authenticated(): bool
    {
        return Session::get('auth') === true;
    }
    
    /**
     * @param string $login
     * @param string $password
     *
     * @return bool
     */
    public function authenticate(string $login, string $password): bool
    {
        $config = Config::instance()->get('auth');
        
        $password = md5($password);
        
        if ($login === $config['login'] && $password === $config['password']) {
            Session::set('auth', true);
            
            return true;
        }
        
        return false;
    }
    
    /**
     * Logout
     */
    public function logout()
    {
        Session::destroy();
    }
}