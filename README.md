# Nova Textarea- & Text field with BBCodes
Quickly developed. Short tutorial.  

With this Nova field you have the _Textarea_ or _Text_ with _BBCodes_.  

(Tested with Nova 4)

## Install
```
composer require norman-huth/nova-bbcode-textarea
```

## Usage
```php

use NormanHuth\BBCode\BBCode;

BBCode::make(__('Name'), 'name')->codes([
    '{author}' => __('This code insert the author'),
    '{date}' => __('This code insert the date'),
]),
```
Or Text Field:
```php

use NormanHuth\BBCode\BB;

BB::make(__('Name'), 'name')->codes([
    '{author}' => __('This code insert the author'),
    '{date}' => __('This code insert the date'),
]),
```

### Don't always show the content of textarea fields inside Nova
```php
BBCode::make(__('Name'), 'name')->codes([
    '{author}' => __('This code insert the author'),
    '{date}' => __('This code insert the date'),
])->alwaysShow(false),
```

### Change button class
```php
BBCode::make(__('Name'), 'name')->codes([
    '{author}' => __('This code insert the author'),
    '{date}' => __('This code insert the date'),
])->btnClass('px-2 bg-white-200 text-dark-800'),
```

### Add inline style to the button
```php
BBCode::make(__('Name'), 'name')->codes([
    '{author}' => __('This code insert the author'),
    '{date}' => __('This code insert the date'),
])->btnStyle('margin-bottom: 1rem'),
```

[![Stand With Ukraine](https://raw.githubusercontent.com/vshymanskyy/StandWithUkraine/main/banner2-direct.svg)](https://vshymanskyy.github.io/StandWithUkraine/)
[![Woman. Life. Freedom.](https://raw.githubusercontent.com/Muetze42/Muetze42/2033b219c6cce0cb656c34da5246434c27919bcd/files/iran-banner-big.svg)](https://linktr.ee/CurrentPetitionsFreeIran)
