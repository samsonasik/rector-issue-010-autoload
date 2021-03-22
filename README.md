Try running rector:

```bash
vendor/bin/rector process system/Fixture/SomeClass.php --debug
[parsing] system/Fixture/SomeClass.php
[refactoring] system/Fixture/SomeClass.php
    [applying] Rector\CodeQuality\Rector\Expression\InlineIfToExplicitIfRector
[post rectors] system/Fixture/SomeClass.php
[printing] system/Fixture/SomeClass.php


[OK] Rector is done!
```

It should exit early as in bootstrap, there is code:

```php
<?php

die;
```