title: Gibbon - Blog
data:
  nav: 
    section: docs-gibbon-4
    name: Blog

---

# Blog

The blog module allows you to create posts. The publication date is in the filename so your posts are correctly sorted in your filesystem. Posts require a title, and have an optional data field.

```markdown
# 2015-05-27-my-first-post.md
title: My First Post
data:
  author: Sebastian De Deyne

---

## Hello world

This is my first post in Gibbon!
```

```php
$blogRepository->find('my-first-post');
```
