<?php namespace PrimeTime\WordPress\Traits;
/**
 * Helper methods for interacting with the WP Plugin API
 */
trait MethodHooks
{
	/**
	 * @param     $handle
	 * @param     $method
	 * @param int $priority
	 * @param int $args
	 */
	public function add_action( $handle, $method, $priority = 10, $args = 1 )
	{
		add_action( $handle, [ $this, $method ], $priority, $args );
	}

	/**
	 * @param     $handle
	 * @param     $method
	 * @param int $priority
	 * @param int $args
	 */
	public function remove_action( $handle, $method, $priority = 10, $args = 1 )
	{
		remove_action( $handle, [ $this, $method ], $priority, $args );
	}

	/**
	 * @param     $handle
	 * @param     $method
	 * @param int $priority
	 * @param int $args
	 */
	public function add_filter( $handle, $method, $priority = 10, $args = 1 )
	{
		add_filter( $handle, [ $this, $method ], $priority, $args );
	}

	/**
	 * @param     $handle
	 * @param     $method
	 * @param int $priority
	 * @param int $args
	 */
	public function remove_filter( $handle, $method, $priority = 10, $args = 1 )
	{
		remove_filter( $handle, [ $this, $method ], $priority, $args );
	}

	/**
	 * @param     $handle
	 * @param     $method
	 * @param int $priority
	 * @param int $args
	 */
	public static function static_add_action( $handle, $method, $priority = 10, $args = 1 )
	{
		add_action( $handle, [ get_called_class(), $method ], $priority, $args );
	}

	/**
	 * @param     $handle
	 * @param     $method
	 * @param int $priority
	 * @param int $args
	 */
	public static function static_remove_action( $handle, $method, $priority = 10, $args = 1 )
	{
		remove_action( $handle, [ get_called_class(), $method ], $priority, $args );
	}

	/**
	 * @param     $handle
	 * @param     $method
	 * @param int $priority
	 * @param int $args
	 */
	public static function static_add_filter( $handle, $method, $priority = 10, $args = 1 )
	{
		add_filter( $handle, [ get_called_class(), $method ], $priority, $args );
	}

	/**
	 * @param     $handle
	 * @param     $method
	 * @param int $priority
	 * @param int $args
	 */
	public static function static_remove_filter( $handle, $method, $priority = 10, $args = 1 )
	{
		remove_filter( $handle, [ get_called_class(), $method ], $priority, $args );
	}

	/**
	 * Registers AJAX action hook.
	 *
	 * @access public
	 * @param string	$action The name of the AJAX action to which the $method is hooked.
	 * @param string	$method The name of the method to be called.
	 * @param boolean	$private Optional. Determines if we should register hook for logged in users.
	 * @param boolean	$public Optional. Determines if we should register hook for not logged in users.
	 * @param int		$priority Optional. Callback priority.
	 */
	public function add_ajax_action( $action, $method, $private = true, $public = false, $priority = 10 )
	{
		if ( $private ) {
			$this->add_action( 'wp_ajax_' . $action, $method, $priority );
		}

		if ( $public ) {
			$this->add_action( 'wp_ajax_nopriv_' . $action, $method, $priority );
		}
	}

	/**
	 * Removes AJAX action hook.
	 *
	 * @access public
	 * @param string	$action The name of the AJAX action to which the $method is hooked.
	 * @param string	$method The name of the method to be called.
	 * @param boolean	$private Optional. Determines if we should register hook for logged in users.
	 * @param boolean	$public Optional. Determines if we should register hook for not logged in users.
	 * @param int		$priority Optional. Callback priority.
	 */
	public function remove_ajax_action( $action, $method, $private = true, $public = false, $priority = 10 )
	{
		if ( $private ) {
			$this->remove_action( 'wp_ajax_' . $action, $method, $priority );
		}

		if ( $public ) {
			$this->remove_action( 'wp_ajax_nopriv_' . $action, $method, $priority );
		}
	}

}