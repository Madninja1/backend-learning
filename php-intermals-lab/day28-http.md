# Day 28 — PHP Internals (HTTP & Response Handling)

file: php-internals-lab/day28-http.md

## Тема

Как PHP формирует HTTP-ответ и взаимодействует с веб-сервером

---

## 1. Напоминание цепочки

Client (browser)
↓
Nginx
↓
PHP-FPM
↓
Zend Engine
↓
Response

---

## 2. Что такое HTTP response

HTTP-ответ состоит из:

* status code
* headers
* body

---

## Пример

```text id="h1x2k3"
HTTP/1.1 200 OK
Content-Type: text/html

<html>...</html>
```

---

## 3. Как PHP формирует response

```php id="m2k7v1"
echo "Hello";
```

PHP:

* пишет в output buffer
* формирует body

---

## 4. Headers

```php id="p3x8c2"
header("Content-Type: application/json");
```

PHP:

* сохраняет header
* отправляет перед body

---

## 5. Status code

```php id="z7k1m9"
http_response_code(404);
```

---

## 6. Output buffering

PHP не всегда сразу отправляет данные.

---

## Пример

```php id="t9m3x1"
ob_start();
echo "Hello";
ob_end_flush();
```

---

## 7. Как происходит отправка

1. PHP формирует response
2. передаёт в PHP-FPM
3. PHP-FPM → nginx
4. nginx → клиент

---

## 8. Когда отправляются headers

Headers отправляются:

→ перед первым выводом

---

## Проблема

```php id="x2k7m4"
echo "Hello";
header("X-Test: 1");
```

→ ошибка (headers уже отправлены)

---

## 9. php://output

```php id="k4x9p2"
file_put_contents("php://output", "Hello");
```

→ пишет напрямую в response

---

## 10. Content-Type

Определяет формат ответа:

```php id="n8k3v7"
header("Content-Type: application/json");
```

---

## 11. JSON response

```php id="p7m2x4"
echo json_encode(["ok" => true]);
```

---

## 12. Почему это важно

HTTP — основа backend:

* API
* веб-приложения
* взаимодействие с клиентом

---

# Ключевые вопросы + ответы

## 1. Из чего состоит HTTP response?

Ответ:

* status code
* headers
* body

---

## 2. Что делает echo?

Ответ:

Пишет данные в body ответа

---

## 3. Что делает header()?

Ответ:

Добавляет HTTP-заголовки

---

## 4. Когда отправляются headers?

Ответ:

Перед первым выводом

---

## 5. Что произойдёт здесь?

```php id="q3k7m1"
echo "Hello";
header("X-Test: 1");
```

Ответ:

Ошибка — headers уже отправлены

---

## 6. Что делает http_response_code?

Ответ:

Устанавливает статус ответа

---

## 7. Что такое output buffering?

Ответ:

Буферизация вывода перед отправкой

---

## 8. Как PHP отправляет response?

Ответ:

PHP → PHP-FPM → nginx → клиент

---

## 9. Что делает php://output?

Ответ:

Пишет напрямую в output stream

---

## 10. Почему это важно для backend?

Ответ:

Потому что:

* вся работа API — это HTTP
* важно правильно формировать ответы
* влияет на клиент

---

# Мини-схема

PHP → buffer → headers + body → nginx → client

---

# Мини-итог

PHP формирует HTTP-ответ из заголовков и тела.
Вывод происходит через буфер, а затем передаётся веб-серверу.
Понимание HTTP важно для разработки API и веб-приложений.
