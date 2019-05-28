## Тестирование (confirmation junior, PHP)

## Окружение

LAMP/WAMP (php v7.1 или выше)

## Инструкции для запуска

### 1. Работа с файлами

Нет особых требований.

### 2. ООП

Дамп рабочей таблицы необходимо импортировать из файла books.sql
Праметры подключения к базе данных находятся [db.php](https://github.com/di207/belenkiy-confirm-jun/tree/master/2_class_work_book/DB.php) в корне папки `2_class_work_book`
```php
// specify your own database credentials
    private $host = "localhost";
    private $db_name = "junior";
    private $username = "root";
    private $password = "";
    public $conn;
```

### 3. Функции и тесты

Запуск PHPUnit:

Находясь в папке `3_function_valid` выполнить 
```composer log
/path/to/php7/php composer.phar install
/path/to/php7/php ./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/LuhnAlgorithmTest.php
```

