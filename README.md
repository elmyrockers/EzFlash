# EzFlash
Lightweight, simple and easy way to display flash message




# How To Use This Library?
	1. Add the following line into your PHP code:
```php
				<?php
				class GO_Example_Model_Thing extends GO_Base_Db_ActiveRecord {
```


	1. Create new instance of EzFlash class
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