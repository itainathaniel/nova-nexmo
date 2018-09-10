# Nova Nexmo

A card & tool for interacting with [Nexmo](https://www.nexmo.com/)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/itainathaniel/nova-nexmo.svg?style=flat-square)](https://packagist.org/packages/itainathaniel/nova-nexmo)
[![Total Downloads](https://img.shields.io/packagist/dt/itainathaniel/nova-nexmo.svg?style=flat-square)](https://packagist.org/packages/itainathaniel/nova-nexmo)

## Installation

This package relies on [Nexmo's Laravel package](https://github.com/Nexmo/nexmo-laravel). If you hadn't installed it already, do that now and follow their instructions, up until the end, where you have Nexmo's key & secret in your `config/nexmo.php` file.

Install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require itainathaniel/nova-nexmo
```

Now you can register the sending SMS tool, the balance card or the two of them in your `App\Providers\NovaServiceProvider`.

To register the sending SMS tool, do the following:

```php
// in app/Providers/NovaServiceProvider.php

// ...

public function tools()
{
    return [
        // ...
        new \Itainathaniel\NovaNexmo\NovaNexmoTool(),
    ];
}
```

To register the balance card, do this:

```php
// in app/Providers/NovaServiceProvider.php

// ...

public function cards()
{
    return [
        // ...
        new \Itainathaniel\NovaNexmo\NovaNexmoCard(),
    ];
}
```

You can cntroll the number of digits after the decimal point by registering the card with the `decimals()` function, like so:

```php
	(new \Itainathaniel\NovaNexmo\NovaNexmoCard())->decimals(4),
```

The default number of digits is 2, Nexmo support up to 4 digits.

### Security

If you discover any security related issues, please email itainathaniel@gmail.com or use the issue tracker.

## Credits

- [Itai Nathaniel](https://github.com/itainathaniel)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
