Flynax\Component\Filesystem
===

Based on Symfony\Filesystem


How to use in my plugin?
==

Add to your **composer.json**
```json
"repositories": [
  {
    "type": "vcs",
    "url": "https://gitlab.com/flynax/components/filesystem"
  }
],
"require": {
    "flynax/filesystem": "1.0.0"
}
```

Example how to copy **vendor/** directory from upload directory to plugin root

```php
/**
 * @version X.X.X
 */
public function updateXXX()
{
    require_once RL_UPLOAD . '<pluginKey>/vendor/autoload.php';
    $filesystem = new \Flynax\Component\Filesystem();
    $filesystem->copy(RL_UPLOAD . '<pluginKey>/vendor', __DIR__ . '/vendor');
}
```