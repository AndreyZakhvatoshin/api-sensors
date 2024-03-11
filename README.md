## Api данных датчиков

Для подключения к БД переименовать файл .env.example в .env
Выполнить команду docker-compose up -d
Разрешить права на запись в storage

## `GET` api/sensor/temperature

Информация о температуре

### Параметры запроса

| Параметр              | Описание       |
|-----------------------|----------------|
| `(string)` date_start | Начало периода |
| `(string)` date_end   | Конец периода  |

### Пример ответа

```json
{
    "data": {
        "id": 2,
        "name": "defaultSensor",
        "unit": "celsius",
        "values": [
            {
                "id": 2,
                "sensor_id": 2,
                "value": "36.60",
                "created_at": "2024-03-11T12:40:14.000000Z",
                "updated_at": "2024-03-11T12:40:14.000000Z"
            }
        ]
    }
}
```

## `GET` api/sensor/pressure

Информация о давлении

### Параметры запроса

| Параметр              | Описание       |
|-----------------------|----------------|
| `(string)` date_start | Начало периода |
| `(string)` date_end   | Конец периода  |

### Пример ответа

```json
{
    "data": {
        "id": 2,
        "name": "defaultSensor",
        "unit": "MPa",
        "values": [
            {
                "id": 2,
                "sensor_id": 2,
                "value": "36.60",
                "created_at": "2024-03-11T12:40:14.000000Z",
                "updated_at": "2024-03-11T12:40:14.000000Z"
            }
        ]
    }
}
```

## `GET` api/sensor/revolutions

Информация о оборотах

### Параметры запроса

| Параметр              | Описание       |
|-----------------------|----------------|
| `(string)` date_start | Начало периода |
| `(string)` date_end   | Конец периода  |

### Пример ответа

```json
{
    "data": {
        "id": 2,
        "name": "defaultSensor",
        "unit": "rpm",
        "values": [
            {
                "id": 2,
                "sensor_id": 2,
                "value": "36.60",
                "created_at": "2024-03-11T12:40:14.000000Z",
                "updated_at": "2024-03-11T12:40:14.000000Z"
            }
        ]
    }
}
```

## Сбор данных с датчиков

App\Jobs\StoreSensorValueJob
Запускается каждую минуту

## DevOps

При деплое запускать тесты, при положительном прохождении тестов разрешать деплой.Makefile

## Запуск тестов

### Статический анализ
docker-compose exec php-fpm ./vendor/bin/phpstan analyse --memory-limit=2G

### Cs-fixer
docker-compose exec php-fpm composer php-cs-fixer fix

### Future тесты
docker-compose exec php-fpm php artisan test --stop-on-failure

