<?php
/**
 * Theme storage manipulations
 *
 * @package WordPress
 * @subpackage HYPNOTHERAPY
 * @since HYPNOTHERAPY 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Get theme variable
if (!function_exists('hypnotherapy_storage_get')) {
	function hypnotherapy_storage_get($var_name, $default='') {
		global $HYPNOTHERAPY_STORAGE;
		return isset($HYPNOTHERAPY_STORAGE[$var_name]) ? $HYPNOTHERAPY_STORAGE[$var_name] : $default;
	}
}

// Set theme variable
if (!function_exists('hypnotherapy_storage_set')) {
	function hypnotherapy_storage_set($var_name, $value) {
		global $HYPNOTHERAPY_STORAGE;
		$HYPNOTHERAPY_STORAGE[$var_name] = $value;
	}
}

// Check if theme variable is empty
if (!function_exists('hypnotherapy_storage_empty')) {
	function hypnotherapy_storage_empty($var_name, $key='', $key2='') {
		global $HYPNOTHERAPY_STORAGE;
		if (!empty($key) && !empty($key2))
			return empty($HYPNOTHERAPY_STORAGE[$var_name][$key][$key2]);
		else if (!empty($key))
			return empty($HYPNOTHERAPY_STORAGE[$var_name][$key]);
		else
			return empty($HYPNOTHERAPY_STORAGE[$var_name]);
	}
}

// Check if theme variable is set
if (!function_exists('hypnotherapy_storage_isset')) {
	function hypnotherapy_storage_isset($var_name, $key='', $key2='') {
		global $HYPNOTHERAPY_STORAGE;
		if (!empty($key) && !empty($key2))
			return isset($HYPNOTHERAPY_STORAGE[$var_name][$key][$key2]);
		else if (!empty($key))
			return isset($HYPNOTHERAPY_STORAGE[$var_name][$key]);
		else
			return isset($HYPNOTHERAPY_STORAGE[$var_name]);
	}
}

// Inc/Dec theme variable with specified value
if (!function_exists('hypnotherapy_storage_inc')) {
	function hypnotherapy_storage_inc($var_name, $value=1) {
		global $HYPNOTHERAPY_STORAGE;
		if (empty($HYPNOTHERAPY_STORAGE[$var_name])) $HYPNOTHERAPY_STORAGE[$var_name] = 0;
		$HYPNOTHERAPY_STORAGE[$var_name] += $value;
	}
}

// Concatenate theme variable with specified value
if (!function_exists('hypnotherapy_storage_concat')) {
	function hypnotherapy_storage_concat($var_name, $value) {
		global $HYPNOTHERAPY_STORAGE;
		if (empty($HYPNOTHERAPY_STORAGE[$var_name])) $HYPNOTHERAPY_STORAGE[$var_name] = '';
		$HYPNOTHERAPY_STORAGE[$var_name] .= $value;
	}
}

// Get array (one or two dim) element
if (!function_exists('hypnotherapy_storage_get_array')) {
	function hypnotherapy_storage_get_array($var_name, $key, $key2='', $default='') {
		global $HYPNOTHERAPY_STORAGE;
		if (empty($key2))
			return !empty($var_name) && !empty($key) && isset($HYPNOTHERAPY_STORAGE[$var_name][$key]) ? $HYPNOTHERAPY_STORAGE[$var_name][$key] : $default;
		else
			return !empty($var_name) && !empty($key) && isset($HYPNOTHERAPY_STORAGE[$var_name][$key][$key2]) ? $HYPNOTHERAPY_STORAGE[$var_name][$key][$key2] : $default;
	}
}

// Set array element
if (!function_exists('hypnotherapy_storage_set_array')) {
	function hypnotherapy_storage_set_array($var_name, $key, $value) {
		global $HYPNOTHERAPY_STORAGE;
		if (!isset($HYPNOTHERAPY_STORAGE[$var_name])) $HYPNOTHERAPY_STORAGE[$var_name] = array();
		if ($key==='')
			$HYPNOTHERAPY_STORAGE[$var_name][] = $value;
		else
			$HYPNOTHERAPY_STORAGE[$var_name][$key] = $value;
	}
}

// Set two-dim array element
if (!function_exists('hypnotherapy_storage_set_array2')) {
	function hypnotherapy_storage_set_array2($var_name, $key, $key2, $value) {
		global $HYPNOTHERAPY_STORAGE;
		if (!isset($HYPNOTHERAPY_STORAGE[$var_name])) $HYPNOTHERAPY_STORAGE[$var_name] = array();
		if (!isset($HYPNOTHERAPY_STORAGE[$var_name][$key])) $HYPNOTHERAPY_STORAGE[$var_name][$key] = array();
		if ($key2==='')
			$HYPNOTHERAPY_STORAGE[$var_name][$key][] = $value;
		else
			$HYPNOTHERAPY_STORAGE[$var_name][$key][$key2] = $value;
	}
}

// Merge array elements
if (!function_exists('hypnotherapy_storage_merge_array')) {
	function hypnotherapy_storage_merge_array($var_name, $key, $value) {
		global $HYPNOTHERAPY_STORAGE;
		if (!isset($HYPNOTHERAPY_STORAGE[$var_name])) $HYPNOTHERAPY_STORAGE[$var_name] = array();
		if ($key==='')
			$HYPNOTHERAPY_STORAGE[$var_name] = array_merge($HYPNOTHERAPY_STORAGE[$var_name], $value);
		else
			$HYPNOTHERAPY_STORAGE[$var_name][$key] = array_merge($HYPNOTHERAPY_STORAGE[$var_name][$key], $value);
	}
}

// Add array element after the key
if (!function_exists('hypnotherapy_storage_set_array_after')) {
	function hypnotherapy_storage_set_array_after($var_name, $after, $key, $value='') {
		global $HYPNOTHERAPY_STORAGE;
		if (!isset($HYPNOTHERAPY_STORAGE[$var_name])) $HYPNOTHERAPY_STORAGE[$var_name] = array();
		if (is_array($key))
			hypnotherapy_array_insert_after($HYPNOTHERAPY_STORAGE[$var_name], $after, $key);
		else
			hypnotherapy_array_insert_after($HYPNOTHERAPY_STORAGE[$var_name], $after, array($key=>$value));
	}
}

// Add array element before the key
if (!function_exists('hypnotherapy_storage_set_array_before')) {
	function hypnotherapy_storage_set_array_before($var_name, $before, $key, $value='') {
		global $HYPNOTHERAPY_STORAGE;
		if (!isset($HYPNOTHERAPY_STORAGE[$var_name])) $HYPNOTHERAPY_STORAGE[$var_name] = array();
		if (is_array($key))
			hypnotherapy_array_insert_before($HYPNOTHERAPY_STORAGE[$var_name], $before, $key);
		else
			hypnotherapy_array_insert_before($HYPNOTHERAPY_STORAGE[$var_name], $before, array($key=>$value));
	}
}

// Push element into array
if (!function_exists('hypnotherapy_storage_push_array')) {
	function hypnotherapy_storage_push_array($var_name, $key, $value) {
		global $HYPNOTHERAPY_STORAGE;
		if (!isset($HYPNOTHERAPY_STORAGE[$var_name])) $HYPNOTHERAPY_STORAGE[$var_name] = array();
		if ($key==='')
			array_push($HYPNOTHERAPY_STORAGE[$var_name], $value);
		else {
			if (!isset($HYPNOTHERAPY_STORAGE[$var_name][$key])) $HYPNOTHERAPY_STORAGE[$var_name][$key] = array();
			array_push($HYPNOTHERAPY_STORAGE[$var_name][$key], $value);
		}
	}
}

// Pop element from array
if (!function_exists('hypnotherapy_storage_pop_array')) {
	function hypnotherapy_storage_pop_array($var_name, $key='', $defa='') {
		global $HYPNOTHERAPY_STORAGE;
		$rez = $defa;
		if ($key==='') {
			if (isset($HYPNOTHERAPY_STORAGE[$var_name]) && is_array($HYPNOTHERAPY_STORAGE[$var_name]) && count($HYPNOTHERAPY_STORAGE[$var_name]) > 0) 
				$rez = array_pop($HYPNOTHERAPY_STORAGE[$var_name]);
		} else {
			if (isset($HYPNOTHERAPY_STORAGE[$var_name][$key]) && is_array($HYPNOTHERAPY_STORAGE[$var_name][$key]) && count($HYPNOTHERAPY_STORAGE[$var_name][$key]) > 0) 
				$rez = array_pop($HYPNOTHERAPY_STORAGE[$var_name][$key]);
		}
		return $rez;
	}
}

// Inc/Dec array element with specified value
if (!function_exists('hypnotherapy_storage_inc_array')) {
	function hypnotherapy_storage_inc_array($var_name, $key, $value=1) {
		global $HYPNOTHERAPY_STORAGE;
		if (!isset($HYPNOTHERAPY_STORAGE[$var_name])) $HYPNOTHERAPY_STORAGE[$var_name] = array();
		if (empty($HYPNOTHERAPY_STORAGE[$var_name][$key])) $HYPNOTHERAPY_STORAGE[$var_name][$key] = 0;
		$HYPNOTHERAPY_STORAGE[$var_name][$key] += $value;
	}
}

// Concatenate array element with specified value
if (!function_exists('hypnotherapy_storage_concat_array')) {
	function hypnotherapy_storage_concat_array($var_name, $key, $value) {
		global $HYPNOTHERAPY_STORAGE;
		if (!isset($HYPNOTHERAPY_STORAGE[$var_name])) $HYPNOTHERAPY_STORAGE[$var_name] = array();
		if (empty($HYPNOTHERAPY_STORAGE[$var_name][$key])) $HYPNOTHERAPY_STORAGE[$var_name][$key] = '';
		$HYPNOTHERAPY_STORAGE[$var_name][$key] .= $value;
	}
}

// Call object's method
if (!function_exists('hypnotherapy_storage_call_obj_method')) {
	function hypnotherapy_storage_call_obj_method($var_name, $method, $param=null) {
		global $HYPNOTHERAPY_STORAGE;
		if ($param===null)
			return !empty($var_name) && !empty($method) && isset($HYPNOTHERAPY_STORAGE[$var_name]) ? $HYPNOTHERAPY_STORAGE[$var_name]->$method(): '';
		else
			return !empty($var_name) && !empty($method) && isset($HYPNOTHERAPY_STORAGE[$var_name]) ? $HYPNOTHERAPY_STORAGE[$var_name]->$method($param): '';
	}
}

// Get object's property
if (!function_exists('hypnotherapy_storage_get_obj_property')) {
	function hypnotherapy_storage_get_obj_property($var_name, $prop, $default='') {
		global $HYPNOTHERAPY_STORAGE;
		return !empty($var_name) && !empty($prop) && isset($HYPNOTHERAPY_STORAGE[$var_name]->$prop) ? $HYPNOTHERAPY_STORAGE[$var_name]->$prop : $default;
	}
}
?>