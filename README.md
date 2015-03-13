# ManDate

Simple utility for testing dates against chained rules.

[![Build Status](https://api.travis-ci.org/pierswarmers/ManDate.svg)](https://travis-ci.org/pierswarmers/ManDate)

## Installation

The recommended way to install ManDate is through
[Composer](http://getcomposer.org/). Require the `pierswarmers/mandate` package
into your `composer.json` file:

composer require "pierswarmers/mandate" dev-master

```shell
composer require "pierswarmers/mandate" dev-master
```

Or in your `composer.json` file:

```json
{
    "require": {
        "pierswarmers/mandate": "dev-master"
    }
}
```

## Usage

```php
use ManDate\Mandate;
use ManDate\Rule\WeekdayRule;
use ManDate\Rule\DaytimeRule;
use ManDate\Rule\MorningRule;

$mandate = new Mandate();

$mandate
    ->andWhere(new WeekdayRule())
    ->andWhere(new DaytimeRule())
    ->andWhereNot(new MorningRule())
;

$date  = new \DateTime('2015-03-02 11:30', new \DateTimeZone('Australia/Sydney'));

if ($mandate->validate($date)) {
    echo 'It\'s a weekday afternoon!';
}
```

## Rules

Rule  | Details
------------- | -------------
AfternoonRule  | Later than midday.
CollisionRule  | Collides with another date.
DaytimeRule  | After sunrise and before sunset.
MorningRule  | Earlier than midday.
NighttimeRule  | After sunset and before sunrise.
WeekdayRule  | Monday to Friday.
WeekendRule  | Saturday and Sunday.
