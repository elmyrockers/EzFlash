
# EzFlash PHP Library

Lightweight, simple and easy way to display flash message with Bootstrap 5 (Alert) template




## Usage/Examples
1. First, add the following line into your PHP code:
```php
<?php
require_once 'path/to/src/EzFlash.php';
use elmyrockers\EzFlash;
```
2. Create new instance of EzFlash class:
```php
$message = new EzFlash;
```
3. After that, you can set flash message in 4 different ways:

$message->{$key} = {$yourmessage};
```php
$message->success = 'Message'; //Property
$message['success'] = 'Message'; //Array key
$message->success( 'Message' ); //Method call or
$message( 'success', 'Message' ); //Function call
```
4. Then, that flash message can be displayed using echo:
```php
echo $message(); //Function call with no parameter
```
Or you can treat this object like a string:
```php
echo $message;
```
For instance, if you write code like the following statement:
```php
$message( 'success', 'My message' ); //Set flash message through function call
echo $message; // Echo flash message (one-time display)
```
Then, its output will look like this one:
```html
<div class="alert alert-success">My message</div>
```


5. You can set different template for each $key:
```php
$message->setTemplate( ['success',
                        'danger',
                        'warning',
                        'info',
                        'primary',
                        'secondary',
                        'light',
                        'dark',
                        'default'], '<div class="alert alert-{$key}">{$message}</div>' ); //default

//custom template
$message->setTemplate( 'errorInfo', '<div class="alert alert-danger {$key}">{$message}</div>' );
```
You can override default/existing template too with this.

## Authors

- [@elmyrockers](https://www.github.com/elmyrockers)


## License

[MIT](https://choosealicense.com/licenses/mit/)

