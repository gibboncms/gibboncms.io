title: Gibbon - Core
data:
  nav: 
    section: docs-gibbon-1
    name: Core

---

# Core

Gibbon's core doesn't provide any standalone functionality, but exists as a solid foundation for modules. Below a quick rundown of the core's api.

## Repositories

Repositories are pretty important in Gibbon, as they are the link between the persistence layer and the model data. The repository interface only requires two methods:

```php
namespace GibbonCms\Gibbon\Repositories;

interface Repository
{
    public function find($id);
    public function getAll();
}
```

By default, Gibbon ships with a FileRepository, which you can immediately extend for your module.

```php
public function __construct(
    Filesystem $filesystem,
    $directory,
    Cache $cache,
    Factory $factory,
    $recursive = false
) {
    // ...
}
```

A FileRepository needs to be built before it's ready for use. After that it retrieves data from a cache instead of going through the filesystem.

```php
$fileRepository->build();
```

```php
public function find($id)
{
    return $this->cache->get($id);
}

public function getAll()
{
    return array_values($this->cache->all());
}
```

## Filesystems

Filesystem read data from a filesystem (*wow*).

```php
namespace GibbonCms\Gibbon\Filesystems;

interface Filesystem
{
    public function listFiles($directory, $recursive = false);
    public function read($path);
    public function put($path, $contents);
    public function delete($path);
}
```

## Factories & Entities

Factories translate raw data to entities. Since factories are module-dependent, Gibbon doesn't ship with any concrete implementations.

```php
namespace GibbonCms\Gibbon\Factories;

interface Factory
{
    public function make($data);
    public static function makes();
}
```
