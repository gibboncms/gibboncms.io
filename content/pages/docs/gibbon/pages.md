title: Gibbon - Pages
data:
  nav: 
    section: docs-gibbon-3
    name: Pages

---

# Pages

The pages module allows you to create unique pages for your website. Pages require a title and markdown body. An optional data field is also parsed for extra metadata (e.g. the side navigation to the left is generated based on this kind of data).

```markdown
title: Dummy
data:
  meta_description: Hello world from gibbon

---

## Hello world

I'm a dummy page
```

```php
$pageRepository->find('hello-world');
```

The pages module reads the filesystem recursively, so you can create subpages.

```php
$pageRepository->find('foo/bar/baz');
```
