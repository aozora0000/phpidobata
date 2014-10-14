# Idobata PHP

for simple send message to Idobata API

[![Build Status](https://travis-ci.org/aozora0000/phpidobata.svg?branch=master)](https://travis-ci.org/aozora0000/phpidobata)
## Environment
- php 5.3
- php 5.4
- php 5.5

```
** caution **
hhvm don't working
```

## Install
### composer.json
```
"require": {
    "aozora0000/phpidobata": "dev-master"
}
```
### shell
```
$ composer install
```

## How to use

### New Instance
```
$idobata = new Idobata(INSERT_HOOK_ID);
```

### setMessage
```
$idobata->setMessage("テスト送信")->send();
```

### setLabel
```
setLabel([label-class],[message])

$idobata->setLabel(Idobta::LABEL_IMPORTANT,"緊急！")->send();
```

### setBadge
```
setBadge([badge-class],[message])

$idobata->setBadge(Idobta::BADGE_WARNING,2)->send();
```

### setTimestamp
```
setTimestamp([timestamp])
$idobata->setTimestamp(date('Y-m-d H:i:s'))->send();
```

## Label/Badge Class
### Label
```
LABEL_NORMAL     ""
LABEL_IMPORTANT  "label-important"
LABEL_WARNING    "label-warning"
LABEL_SUCCSESS   "label-success"
LABEL_INFO       "label-info"
LABEL_INVERSE    "label-inverse"
```

### Badge
```
BADGE_NORMAL     ""
BADGE_IMPORTANT  "badge-important"
BADGE_WARNING    "badge-warning"
BADGE_SUCCSESS   "badge-success"
BADGE_INFO       "badge-info"
BADGE_INVERSE    "badge-inverse"
```

## Dependencies
- [Requests for PHP](http://requests.ryanmccue.info/)
