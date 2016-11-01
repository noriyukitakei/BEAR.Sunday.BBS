# Koriym.Psr4List

PSR4ディレクトリと名前空間のprefixを指定してクラスとファイルの一覧を取得します。

## Requirements
 * PHP 5.5+

## Usage

```php
$list = new Psr4List;
$prefix = 'BEAR\Sunday';
$path = __DIR__ . '/src';

foreach ($list($prefix, $path) as $class => $file) {
    var_dump($class);
    var_dump($file);
}
```

