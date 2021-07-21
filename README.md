# php skeleton

Skeleton for creating small php packages with static analyzing and unit testing

![GitHub CI](https://github.com/otis22/reverso/workflows/CI/badge.svg)
[![Coverage Status](https://coveralls.io/repos/github/otis22/reverso/badge.svg?branch=master)](https://coveralls.io/github/otis22/reverso?branch=master)

## Local work

For run all tests
```shell
make all
```
or connect to terminal
```shell
make exec
```

or use built in php server [http://localhost:8080](http://localhost:8080)
```shell
# start server on 8080 port
make serve 
# custom port 8081
make serve PORT=8081
```

*Dafault php version is 7.4*. Use PHP_VERSION= for using custom version. 
```shell
make all PHP_VERSION=8.0
# run both 
make all PHP_VERSION=7.4 && make all PHP_VERSION=8.0
```

all commands
```shell
# security check
make security
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

## Adopt for you 

- Click on [Use template button](https://prnt.sc/w7avaw) 
- Put your code to src/ tests/ directory
- Delete config files for unused CI systems
- Change project data in composer.json, README and Makefile


## Comments 

- Repo with analyze tools: https://github.com/exakat/php-static-analysis-tools
- Repo for gitlab-ci php https://gitlab.com/gitlab-org/gitlab-foss/-/blob/master/lib/gitlab/ci/templates/PHP.gitlab-ci.yml
