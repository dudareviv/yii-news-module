# Модуль новостей

Надо добавить модуль в конфиг
```php
...    
'modules' => array(
    'news',
),
...
```

По желанию, можно добавить правила для роутера:
```php
...
'rules' => array(
    'news/<year:\d{4}>/<month:\d{2}>' => 'news/post/index',  
    'news/<year:\d{4}>' => 'news/post/index',
    'news/category-<category:\d+>' => 'news/post/index',     
    ...
)
...
```