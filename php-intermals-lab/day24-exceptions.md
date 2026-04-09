# Day 24 — PHP Internals (Exceptions & try/catch)

file: php-internals-lab/day24-exceptions.md

## Тема

Как работают исключения (exceptions) в PHP и как ими управлять

---

## 1. Что такое exception

Exception — это объект ошибки, который можно обработать.

---

## Пример

```php
throw new Exception("Error occurred");
```

---

## 2. try / catch

```php id="x8k2v1"
try {
    throw new Exception("Error");
} catch (Exception $e) {
    echo $e->getMessage();
}
```

---

## 3. Что происходит внутри

1. возникает исключение (throw)
2. PHP останавливает текущий поток выполнения
3. ищет ближайший catch
4. передаёт объект Exception

---

## 4. Если catch нет

→ fatal error
→ скрипт останавливается

---

## 5. Структура Exception

Exception содержит:

* message
* code
* file
* line
* stack trace

---

## 6. Stack trace

Это список вызовов функций:

```text id="y7n3k2"
functionA
functionB
functionC
```

---

## 7. Несколько catch

```php id="q4p8c1"
try {
    // код
} catch (TypeError $e) {
} catch (Exception $e) {
}
```

---

## 8. finally

```php id="t6v2k9"
try {
    // код
} catch (Exception $e) {
} finally {
    echo "always runs";
}
```

---

## 9. Throwable

В PHP есть общий интерфейс:

```php id="p2m7x4"
catch (Throwable $e)
```

Ловит:

* Exception
* Error

---

## 10. Error vs Exception

Error:

* системные ошибки
* часто критические

Exception:

* управляемые
* создаются разработчиком

---

## 11. Пользовательские исключения

```php id="m9k3v1"
class MyException extends Exception {}
```

---

## 12. Почему это важно

Exceptions:

* позволяют управлять ошибками
* делают код чище
* используются во всех фреймворках

---

# Ключевые вопросы + ответы

## 1. Что такое exception?

Ответ:

Это объект ошибки, который можно перехватить и обработать.

---

## 2. Что делает try/catch?

Ответ:

Позволяет перехватывать исключения и обрабатывать их.

---

## 3. Что происходит при throw?

Ответ:

PHP останавливает выполнение и ищет catch.

---

## 4. Что будет без catch?

Ответ:

Fatal error и остановка программы.

---

## 5. Что такое stack trace?

Ответ:

Список вызовов функций, приведших к ошибке.

---

## 6. Что делает finally?

Ответ:

Выполняется всегда, независимо от ошибок.

---

## 7. Что такое Throwable?

Ответ:

Общий интерфейс для Exception и Error.

---

## 8. Можно ли создать своё исключение?

Ответ:

Да, через наследование от Exception.

---

## 9. В чём разница между Error и Exception?

Ответ:

Error — системные ошибки
Exception — управляемые

---

## 10. Почему это важно для backend?

Ответ:

Потому что:

* позволяет управлять ошибками
* улучшает архитектуру
* используется во всех фреймворках

---

# Мини-схема

throw → остановка → поиск catch → обработка

---

# Мини-итог

Exceptions позволяют управлять ошибками через try/catch.
PHP передаёт управление ближайшему обработчику и позволяет продолжить выполнение.
Это основа надёжных и поддерживаемых backend-приложений.
