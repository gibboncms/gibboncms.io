title: Gibbon - Config
data:
  nav: 
    section: docs-gibbon-4
    name: Config

---

# Config

```bash
$ composer require gibboncms/config
```

The config module reads key-value pairs from yaml files. Config is special since it doen't return entities but primitive data. The module also supports dot notation for easy retrieval.

```yaml
# site.yml
name: GibbonCms
contact:
  email: sebastian@gibboncms.io
```

```php
$name = $configRepository->get->('site.name');
$email = $configRepository->get->('site.contact.email');
```
