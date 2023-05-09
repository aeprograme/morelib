<?php

namespace Ahmed\Morelib;

/** A class that handles string operations */
class Str
{
    /**
     * Remove the slash at the end of a string
     * @param string $string
     * @return string
     */
    static function untrail_slash(string $string) : string
    {
        return rtrim( $string, '/\\' );
    }

    /**
     * Adds a slash at the end of a string
     * @param string $string
     * @return string
     */
    static function trail_slash(string $string) : string
    {
        return SELF::untrail_slash($string) . '/';
    }
    /**
     * Converts a string to uppercase
     * @param string $string
     * @return string
     */
    static function upper(string $string) : string
    {
        return strtoupper($string);
    }
    /**
     * Converts first character of a string to uppercase
     * @param string $string
     * @return string
     */
    static function upperFirst(string $string) : string
    {
        return ucfirst($string);
    }
    /**
     * Converts a string to lowercase
     * @param string $string
     * @return string
     */
    static function lower(string $string): string
    {
        return strtolower($string);
    }
    /**
     * Converts first character of a string to lowercase
     * @param string $string
     * @return string
     */
    static function lowerFirst(string $string) : string
    {
        return lcfirst($string);
    }
    /**
     * Check if a substring is in a string
     * @param string $haystack The string to search in
     * @param string $needle The substring to search for
     * @return bool true if found, false if not found
     */
    static function contains(string $haystack,string $needle) : bool
    {
        return str_contains($haystack,$needle);
    }
    /**
     * Check if an array of substrings is in a string
     * @param string $haystack The string to search in\
     * @param array $needle the substring array to search for
     * @return bool true if all found, false if not
     */
    static function containsAll(string $haystack,array $needle) : bool
    {
        foreach ($needle AS $row)
        {
            if(!SELF::contains($haystack,$row)) return false;
        }
        return true;
    }
    /**
     * Replace first occurence in a string that matchs the $search. Can be case sensitive or case insensitive
     * @param string $string the full string
     * @param string $search the string to search for
     * @param string $replace the replacement string
     * @param bool $case_sensitive Whether to use case sensitive match or not. defaul: false
     * @return string
     */
    static function replace(string $string,string $search,string $replace,bool $case_sensitive = false) : string
    {
        if($case_sensitive)
        {
            return str_replace($search, $replace, $string, 1);
        }
        return str_ireplace($search, $replace, $string, 1);
    }
        /**
     * Replace All occurences in a string that matchs the $search. Can be case sensitive or case insensitive
     * @param string $string the full string
     * @param string $search the string to search for
     * @param string $replace the replacement string
     * @param bool $case_sensitive Whether to use case sensitive match or not. defaul: false
     * @return string
     */
    static function replaceAll(string $string,string $search,string $replace,bool $case_sensitive = false):string
    {
        if($case_sensitive)
        {
            return str_replace($search,$replace,$string);
        }
        return str_ireplace($search,$replace,$string);
    }
    /**
     * Checks if given string starts with $search string
     * @param string $string the string to check
     * @param string $search the string to look for
     * @return bool
     */
    static function startsWith(string $string ,string $search) : bool
    {
            return str_starts_with($string, $search);
    }
    /**
     * Checks if given string ends with $search string
     * @param string $string the string to check
     * @param string $search the string to look for
     * @return bool
     */
    static function endsWith(string $string ,string $search) : bool
    {
        return str_ends_with($string,$search);
    }
    /**
     * Remove all in a string thats between start character and end character
     * @param mixed $string
     * @param mixed $start
     * @param mixed $end
     * @return string|mixed
     */
    static function removeBetween(mixed $string,mixed $start,mixed $end) : string|mixed
    {
        $start = preg_quote($start, '/');
        $end = preg_quote($end, '/');
        $regex = "/({$start})(.*?)({$end})/";
        return preg_replace($regex,'',$string);
    }
        /**
     * Replace all in a string thats between start character and end character
     * @param mixed $string
     * @param mixed $replacement
     * @param mixed $start
     * @param mixed $end
     * @return string|mixed
     */
    static function replaceBetween(mixed $string,mixed $replacement,mixed $start,mixed $end) : string|mixed
    {
        $start = preg_quote($start, '/');
        $end = preg_quote($end, '/');
        $regex = "/({$start})(.*?)({$end})/";
        return preg_replace($regex,$replacement,$string);
    }
    /**
     * Removes first character from a string
     * @param string $string
     * @return string Returns the rest of the string
     */
    static function removeFirst(string $string): string
    {
        return substr($string,1);
    }
    /**
     * Replace first character from a string
     * @param string $string
     * @param string $replacement
     * @return string Returns the new string
     */
    static function replaceFirst(string $string,string $replacement): string
    {
        return $replacement . SELF::removeFirst($string);
    }
    /**
     * Get the first subString between two characters in a string
     * @param string $string
     * @param string $start
     * @param string $end
     * @return string|mixed
     */
    static function getBetween(string $string,string $start,string $end) : string|mixed
    {
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }
    /**
     * Get all substrings between two characters in a string
     * Code from https://stackoverflow.com/a/51276851
     * @param string $string
     * @param string $start
     * @param string $end
     * @return array|mixed
     */
    static function getBetweenAll(string $string,string $start,string $end) : array|mixed
    {
        //Code from https://stackoverflow.com/a/51276851
        $n = explode($start, $string);
    $result = Array();
    foreach ($n as $val) {
        $pos = strpos($val, $end);
        if ($pos !== false) {
            $result[] = substr($val, 0, $pos);
        }
    }
    return $result;
    }
    /**
     * Split a string by seperator
     * @param string $string string to be split
     * @param string $seperator the string key to be seperated
     * @return array
     */
    static function split(string $string, string $seperator): array
    {
        return explode($seperator,$string);
    }
}