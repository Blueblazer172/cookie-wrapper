<?php
/**
 * Cookie Wrapper v0.2
 * For easy cookie managament
 * 
 * @package CookieWrapper
 * @version 0.1
 * @author Ozan "sythdev" Akman <info@ozanakman.com.tr>
 *
 */
namespace Sythdev;

class Cookie{
    /*
     * Set Command =>
     * $Cookie = new Cookie();
     * $Cookie->set('example', 'example data what u want', '+10 days');
     *
     * Get Command =>
     * $Cookie = new Cookie();
     * $Cookie->get('example');
     *
     * Remove Command =>
     * $Cookie = new Cookie();
     * $Cookie->del('example');
     *
    */

    /**
     * prefix for cookies
     *
     * @var string
     */
    protected static $prefix = '';

    /**
     * domain for cookies
     *
     * @var string
     */
    protected static $domain;

    /**
     * path on the server for cookies
     *
     * @var string
     */
    protected static $path = '/';

    /**
     * HTTPS only requests
     *
     * @var bool
     */
    protected static $secure = false;
    /**
     * Get a list of cookies that browser keeps.
     * @return array A list of cookies that browser keeps.
     */
    public static function all()
    {

        return $_COOKIE;
        
    }
    /**
     * get true name of cookies
     *
     * @param $name
     * @return string
     */
    public function addPrefix($name)
    {

        return self::$prefix . $name;

    }

    /**
     * set a cookie
     *
     * @param $name
     * @param $value
     * @param $expire
     * @return string;
     */
    public function set($name, $value, $expire = 0)
    {

        $name   = $this->addPrefix($name);
        $expire = ($expire <> 0 ? strtotime($expire) : $expire);
        $value  = serialize($value);


        return setcookie($name, $value, $expire, self::$path, self::$domain);

    }

    /**
     * get value of the cookie
     *
     * @param $name
     * @return bool|mixed|null
     */
    public function get($name)
    {

        $name   = $this->addPrefix($name);
        $value  = (array_key_exists($name, $_COOKIE) ? unserialize($_COOKIE[$name]) : null);

        if ($value == null){

            return false;

        }else{

            return $value;

        }

    }

    /**
     * remove the cookie from browser
     *
     * @param $name
     * @return bool
     */
    public function del($name)
    {

        $name   = $this->addPrefix($name);

        return setcookie($name, false, 1, self::$path, self::$domain);


    }

}
