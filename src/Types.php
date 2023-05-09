<?php

namespace Ahmed\Morelib;
/** A Class that handles Types */
class Types {
    /** String code for _STRING */
    public const _STRING = 'string';
    /** String code for _INTEGER */
    public const _INTEGER = 'integer';
    /** String code for _DOUBLE */
    public const _DOUBLE = 'double';
    /** String code for _BOOLEAN */
    public const _BOOLEAN = 'boolean';
    /** String code for _NULL */
    public const _NULL = 'null';
    /** String code for _OBJECT */
    public const _OBJECT = 'object';
    /** String code for _RESOURCE */
    public const _RESOURCE = 'resource';
    /** String code for _NUMERIC */
    public const _NUMERIC = 'numeric';
    /** String code for _ARRAY */
    public const _ARRAY = 'array';
    /**
     * Returns the type of $value
     * @param mixed $value
     * @return string
     */
    public static function getType(mixed $value) : string
    {
        return strtolower(gettype($value));
    }
/** 
     * Checks if given $value is of type empty
     * @param mixed $value
     * @return bool
     */
    static function isEmpty(mixed $value) : bool
    {
        return empty($value);
    }
    /** 
     * Checks if given $value is of type empty or is null
     * @param mixed $value
     * @return bool
     */
    static function isEmptyOrNull(mixed $value) : bool
    {
        return (bool)(static::isEmpty($value) && static::isNull($value));
    }
    /** 
     * Checks if given $value is set and not empty or equal to null
     * @param mixed $value
     * @return bool
     */
    static function isSet(mixed $value): bool
    {
        return isset($value);
    }
    /** 
     * Checks if given $value is null or equal to null
     * @param mixed $value
     * @return bool
     */
    static function isNull(mixed $value): bool
    {
        return is_null($value);
    }
    /** 
     * Checks if given $name is an instance of $instanceName
     * @param mixed $name
     * @param mixed $instanceName
     * @return bool
     */
    static function isInstance(mixed $name,mixed $instanceName) : bool
    {
        if ($name instanceof $instanceName) return true;

        return false;
    }
    /** 
     * Checks if given $value is of type string
     * @param mixed $value
     * @return bool
     */
    static function isString(mixed $value): bool
    {
        return (bool) static::getType($value) == static::_STRING && !static::isEmptyOrNull($value);
    }
    /** 
     * Checks if given $value is of type boolean
     * @param mixed $value
     * @return bool
     */
    static function isBoolean(mixed $value): bool
    {
        return (bool) static::getType($value) == static::_BOOLEAN && !static::isEmptyOrNull($value);
    }
    /** 
     * Checks if given $value is of type numeric
     * @param mixed $value
     * @return bool
     */
    static function isNumeric(mixed $value): bool
    {
        return (bool) static::getType($value) == static::_NUMERIC && !static::isEmptyOrNull($value);
    }
    /** 
     * Checks if given $value is of type integer
     * @param mixed $value
     * @return bool
     */
    static function isInteger(mixed $value): bool
    {
        return (bool) static::getType($value) == static::_INTEGER && !static::isEmptyOrNull($value);
    }
    /** 
     * Checks if given $value is of type double
     * @param mixed $value
     * @return bool
     */
    static function isDouble(mixed $value): bool
    {
        return (bool) static::getType($value) == static::_DOUBLE;
    }
    /** 
     * Checks if given $value is of type object
     * @param mixed $value
     * @return bool
     */
    static function isObject(mixed $value): bool
    {
        return (bool) static::getType($value) == static::_OBJECT;
    }
    /** 
     * Checks if given $value is of type resource
     * @param mixed $value
     * @return bool
     */
    static function isResource(mixed $value): bool
    {
        return (bool) static::getType($value) == static::_RESOURCE;
    }
    /** 
     * Checks if given $value is of type array
     * @param mixed $value
     * @return bool
     */
    static function isArray(mixed $value): bool
    {
        return (bool) static::getType($value) == static::_ARRAY;
    }
    /**
     * Checks if given $value is of type date
     * @param string $value
     * @return bool
     */
    static function isDate(string $value): bool
    {
        $date = \DateTime::createFromFormat('Y-m-d', $value);
        $date_errors = \DateTime::getLastErrors();
        if($date_errors == false) return TRUE;
        if ($date_errors['warning_count'] + $date_errors['error_count'] == 0) {

            return TRUE;
        } 
            return FALSE;
    }
    /**
     * Checks if given $value is of type Callable
     * @param mixed $value
     * @return bool
     */
    static function isCallable(mixed $value): bool
    {
        return (bool)is_callable($value);
    }
    static function isFunction($value)
    {
        return (bool) (static::isString($value) && function_exists($value)) || (static::isObject($value) && static::isInstance($value, \Closure::class));
    }
}