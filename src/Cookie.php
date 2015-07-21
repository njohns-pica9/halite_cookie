<?php
namespace ParagonIE\Halite;

class Cookie extends Halite
{
    /**
     * Store a value in an encrypted cookie
     * 
     * @param string $name
     */
    public function fetch($name)
    {
        if (!isset($_COOKIE[$name])) {
            return array();
        }
        $decrypted = $this->decrypt($_COOKIE[$name]);
        
        if (empty($decrypted)) {
            return array();
        }

        return \json_decode($decrypted, true);
    }
    
    /**
     * Store a value in an encrypted cookie
     * 
     * @param string $name
     * @param mixed $value
     * @param int $expire
     * @param string $path
     * @param string $domain
     * @param bool $secure
     * @param bool $httponly
     * @return bool
     */
    public function store(
        $name,
        $value,
        $expire = 0,
        $path = '/',
        $domain = null,
        $secure = null,
        $httponly = null
    ) {
        return \setcookie(
            $name,
            $this->encrypt($value),
            $expire,
            $path,
            $domain,
            $secure,
            $httponly
        );
    }
}
