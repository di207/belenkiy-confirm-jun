## Тестирование (confirmation junior, PHP)

## Окружение

LAMP/WAMP (php v7.1 или выше, MySQL v.5.7 или выше)

## Инструкции для запуска

### 1. Работа с файлами

Нет особых требований.

### 2. ООП

Дамп рабочей таблицы необходимо импортировать из файла books.sql
Праметры подключения к базе данных находятся [config.php](https://github.com/di207/belenkiy-confirm-jun/tree/master/2_class_work_book/config.php) в корне папки `2_class_work_book`
```php
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'database_name');
    define('DB_USER', 'root');
    define('DB_PASS', '');
```

### 3. Функции и тесты

Запуск PHPUnit:

Находясь в папке `3_function_valid` выполнить 
```composer log
/path/to/php7/php composer.phar install
/path/to/php7/php ./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/LuhnAlgorithmTest.php
```

