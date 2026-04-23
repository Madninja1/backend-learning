# Day 18 — PHP Internals (Namespaces & Name Resolution)

file: php-internals-lab/day18-namespaces.md

## Тема

Как PHP ищет классы и разрешает имена через namespaces

---

## 1. Проблема без namespaces

Без namespaces:

```php id="b7t1sx"
class User {}
class User {}
```

→ конфликт имён

---

## 2. Что такое namespace

Namespace — это пространство имён для классов.

---

## Пример

```php id="z2m8kq"
namespace App\Services;

class UserService {}
```

Полное имя класса:

```text id="v8p1dn"
App\Services\UserService
```

---

## 3. Как PHP ищет класс

```php id="9u5k2l"
new UserService();
```

PHP ищет:

1. в текущем namespace
2. через use
3. в глобальном пространстве

---

## 4. use (импорт)

```php id="f3c7zn"
use App\Services\UserService;

$user = new UserService();
```

Теперь PHP знает:

→ UserService = App\Services\UserService

---

## 5. Полное имя (FQCN)

```php id="c9w1ae"
new \App\Services\UserService();
```

\ — означает:

→ начать с глобального пространства

---

## 6. Name resolution (разрешение имён)

PHP:

1. проверяет текущий namespace
2. проверяет use
3. проверяет глобальный namespace

---

## 7. Пример

```php id="q4y8vn"
namespace App;

use App\Services\UserService;

$user = new UserService();
```

PHP:

→ использует импорт из use

---

## 8. Без use

```php id="8p2k3l"
namespace App;

$user = new Services\UserService();
```

→ ищет внутри App\Services

---

## 9. Глобальные функции

```php id="y7w3xn"
strlen("test");
```

PHP сначала ищет:

* в namespace
* потом в глобальном

---

## 10. Почему это важно

Namespaces:

* избегают конфликтов
* делают код структурированным
* нужны для autoload (PSR-4)

---

# Ключевые вопросы + ответы

## 1. Что такое namespace?

Ответ:

Это пространство имён для классов, чтобы избежать конфликтов.

---

## 2. Что такое FQCN?

Ответ:

Полное имя класса:

\App\Services\UserService

---

## 3. Как PHP ищет класс?

Ответ:

1. текущий namespace
2. use
3. глобальный namespace

---

## 4. Что делает use?

Ответ:

Импортирует класс и позволяет использовать короткое имя.

---

## 5. Что означает \ перед классом?

Ответ:

Начать поиск с глобального namespace.

---

## 6. Что произойдёт здесь?

```php id="9q2x6v"
namespace App;

$user = new UserService();
```

Ответ:

PHP будет искать App\UserService

---

## 7. А здесь?

```php id="d4w1pj"
use App\Services\UserService;

$user = new UserService();
```

Ответ:

PHP использует импорт и найдёт нужный класс

---

## 8. Почему namespaces важны?

Ответ:

Потому что:

* избегают конфликтов
* делают код масштабируемым
* используются в Composer

---

## 9. Как namespace связан с autoload?

Ответ:

PSR-4 сопоставляет namespace с путём к файлу

---

## 10. Почему это важно для backend?

Ответ:

Потому что:

* используется во всех фреймворках
* влияет на архитектуру проекта
* важно для работы Composer

---

# Мини-схема

namespace → имя класса
↓
use (опционально)
↓
autoload
↓
загрузка файла

---

# Мини-итог

Namespaces позволяют организовать код и избежать конфликтов имён.
PHP ищет классы сначала в текущем пространстве, затем через use и только потом в глобальном.
Это основа работы autoload и современной архитектуры PHP-приложений.
