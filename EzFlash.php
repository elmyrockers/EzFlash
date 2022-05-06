<?php
namespace elmyrockers;



/**
 * 
 */
class EzFlash implements \ArrayAccess
{
	private $_templates = [];
	public function __construct()
	{
		# Make sure session has been started first
			if ( !session_id() ) session_start();

		# Set default template
			$this->setTemplate( ['success',
								'danger',
								'warning',
								'info',
								'primary',
								'secondary',
								'default'], '<div class="alert alert-{$key}">{$message}</div>' ); //default
	}

	public function __set( $key, $message )
	{
		if ( !$message ) return;
		if ( empty($this->_templates[$key]) ) return; // template doesn't exist

		$_SESSION[ 'EzFlash' ][ $key ] = str_replace( '{$message}', $message, $this->_templates[$key] );
	}

	public function __call( $key, $messages )
	{
		$this->$key = $messages[0];
	}

	public function __invoke( string $key = null, string $message = null )
	{
		if ( !$key ) return (string) $this;
		$this->$key = $message;
	}

	public function __toString()
	{
		# Make sure flash message has been set first
			if ( empty($_SESSION['EzFlash']) ) return '';

		# Then, display it and delete it at the same time (show one-time only)
			$key = key( $_SESSION['EzFlash'] );
			$message = current( $_SESSION['EzFlash'] );
			unset( $_SESSION[ 'EzFlash' ][ $key ] );

		return $message;
	}

	public function offsetSet( $key, $message )
	{
		$this->$key = $message;
	}

	public function offsetGet( $key ){}

	public function offsetExists( $key ){}

	public function offsetUnset($key ){}

	public function setTemplate( string|array $key, string $template )
	{
		if ( is_array($key) ) {
			foreach ( $key as $k ) {
				$this->_templates[ $k ] = str_replace( '{$key}', $k, $template );
			}
		} elseif ( is_string($key) ) {
			$this->_templates[ $key ] = str_replace( '{$key}', $key, $template );
		}
	}
}


// Create new instance of EzFlash class
	// $message = new EzFlash;
	// $message->setTemplate( ['success',
	// 						'danger',
	// 						'warning',
	// 						'info',
	// 						'primary',
	// 						'secondary',
	// 						'default'], '<div class="alert alert-{$key}">{$message}</div>' ); //default
	// $message->setTemplate( 'errorInfo', '<div class="alert alert-danger {$key}">{$message}</div>' );//custom template
	// (you can override default/existing template too with this)

//Set (in 4 different ways):
	// $message->success = 'Success message';
	// $message['success'] = 'Success message';
	// $message->success( 'Success message' );
	// $message( 'success', 'Success message' );


//Show (one-time only)
	// echo $message();
	// echo $message;