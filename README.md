# CookieWrapper
Easy cookie managament class

PS. I created this class so quickly. Some lines can be defective. So you can report me and I'll change it.

# Usage
```php
<?php 
require 'Cookie.php';
$Cookie = new Cookie();

/**
* Set (Add new cookie)
*
* $Cookie->set('name','value','time');
* 
* You can use time parameter like +1 day, +2 week, +2 month, +1 year etc..
*/
$Cookie->set('example', 'example data what u want', '+10 days');

/**
* Get value of the cookie
*
* $Cookie->get('name');
*/
$Cookie->get('example');

/**
* Get all cookies
*/
$Cookie->all();

/**
 * Remove the cookie from browser
 *
 * $Cookie->set('name');
 */
$Cookie->del('example');

/**
 * Get a list of cookies that browser keeps at the moment.
 */
Cookie::all();

```
