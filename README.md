
# EzFlash PHP Library

Lightweight, simple and easy way to display flash message.




## Usage/Examples
1. First, add the following line into your PHP code:
```php
<?php
use elmyrockers\EzFlash;
```
2. Create new instance of EzFlash class:
```php
$message = new EzFlash;
```
3. After that, you can set flash message in 4 different ways:

$message->{$key} = {$message};
```php
$message->success = 'Message'; //Property
$message['success'] = 'Message'; //Array key
$message->success( 'Message' ); //Method call or
$message( 'success', 'Message' ); //Object call
```
4. Then, that flash message can be displayed using echo:
```php
echo $message(); //Method call with no parameter
```
Or you can treat this object like a string:
```php
echo $message;
```
5. You can set different template for each $key:
```php
$message->setTemplate( ['success',
                        'danger',
                        'warning',
                        'info',
                        'primary',
                        'secondary',
                        'default'], '<div class="alert alert-{$key}">{$message}</div>' ); //default

//custom template
$message->setTemplate( 'errorInfo', '<div class="alert alert-danger {$key}">{$message}</div>' );
```
You can override default/existing template too with this.

## Authors

- [@elmyrockers](https://www.github.com/elmyrockers)


## License

[MIT](https://choosealicense.com/licenses/mit/)

