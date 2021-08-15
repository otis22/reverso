# otis22/reverso

<img src="https://www.elegantobjects.org/badge.svg" alt="EO badge">

Library for working with [context.reverso.net](https://context.reverso.net/) api

![GitHub CI](https://github.com/otis22/reverso/workflows/CI/badge.svg)
[![Coverage Status](https://coveralls.io/repos/github/otis22/reverso/badge.svg?branch=master)](https://coveralls.io/github/otis22/reverso?branch=master)

## How to use 

```
composer require otis22/reverso
```
**Be careful library can translate only one a single word**

**Available language list:** en, fr, es, de, it, pt, ru, ro, cz, zh


```php
use Otis22\Reverso\Context;

$context = Context::fromLanguagesAndWord("ru", "en", "пример");

$context->firstInDictionary(); # return "example" word, because it is the most popular variant in the reverso.net

$context->dictionary(); #return synonyms array ['example', 'sample', 'case', ...]

$context->examples(); #return examples sentences
/** 
    [
        [
            'source' => 'Красивый <em>пример</em> - прошлогодняя эпидемия свиного гриппа.',
            'target' => 'So a nice <em>example</em> of this came from last year and swine flu.'
        ],
        ...
    ]
*/
```

[Why it looks so?](https://otis22.github.io/unit/testing/2021/08/07/for-interns.html)

## Contributing

For run all tests
```shell
make all
```
or connect to terminal
```shell
make exec
```

*Dafault php version is 7.4*. Use PHP_VERSION= for using custom version. 
```shell
make all PHP_VERSION=8.0
# run both 
make all PHP_VERSION=7.4 && make all PHP_VERSION=8.0
```

all commands
```shell
# composer install
make install
# composer install with --no-dev
make install-no-dev
# check code style
make style
# fix code style
make style-fix
# run static analyze tools
make static-analyze
# run unit tests
make unit
#  check coverage
make coverage
```

