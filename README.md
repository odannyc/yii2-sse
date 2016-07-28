# yii2-sse
Yii2 SSE is a wrapper for the library libSSE-php. Its used for managing Server Sent Events in Yii2.

## Installation
You'll be installing this package through composer.

Run this command within your project folder: `composer require odannyc/yii2-sse`

## Usage
*These steps are for the simple/basic Yii2 project.*

Edit your `web.php` config file which is located usually in `app/config/web.php`

``` php
'components' => [
  ...
  'sse' => [
    'class' => \odannyc\Yii2SSE\LibSSE::class
  ]
  ...
];
```

You'll have to create a handler for your SSE instance. Usually located in `app/sse/`.
```php
use odannyc\Yii2SSE\SSEBase;

class MessageEventHandler extends SSEBase
{
  public function check()
  {
    return true;
  }

  public function update()
  {
    return "Something Cool";
  }
}
```

Then, anywhere in your controller:

``` php
public function actionIndex()
{
  $sse = Yii::$app->sse;
  $sse->addEventListener('message', new MessageEventHandler());
  $sse->start();
}
```

## More information
For more information on using the SSE functionalites of this package visit:
https://github.com/licson0729/libSSE-php
