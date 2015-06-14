title: Gibbon - Blocks
data:
  nav: 
    section: docs-gibbon-2
    name: Blocks

---

# Blocks

Blocks have a similar structure to pages, but don't have a title. They do have class and id fields to easily edit a blocks' style on your site. Blocks are ideal for elements on your homepage or in your layout.

```markdown
# dummy.md
class: block
id: block-hello-world

---

## Hello world

I'm a dummy block
```

```php
$blockRepository->find('dummy');
```
