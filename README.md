### Hexlet tests and linter status:
[![Actions Status](https://github.com/IlyaChehov/php-project-45/actions/workflows/hexlet-check.yml/badge.svg)](https://github.com/IlyaChehov/php-project-45/actions)

[![Maintainability](https://api.codeclimate.com/v1/badges/31162ffc71846d220bda/maintainability)](https://codeclimate.com/github/IlyaChehov/php-project-45/maintainability)

# Brain Games

Набор из 5 консольных математических игр для тренировки логики и арифметики.

## Быстрый старт

### Установка

```bash
- git clone git@github.com:IlyaChehov/php-project-45.git
- cd php-project-45
- make install
```

### Запуск игр
``` bash
- make brain-even       # Чётное/нечётное
- make brain-calc       # Калькулятор
- make brain-gcd        # Наибольший делитель
- make brain-progression # Арифметическая прогрессия
- make brain-prime      # Простые числа
```

## Описание игр
1. **Brain Even**  
Правила: Определите, является ли число чётным
Пример:
``` bash
Question: 15
Your answer: no
Correct!
```

2. **Brain Calc**  
Правила: Вычислите результат выражения
Операции: +, -, *
Пример:

``` bash
Question: 5 + 3
Your answer: 8
Correct!
```

3. **Brain GCD**  
Правила: Найдите наибольший общий делитель
Пример:

``` bash
Question: 25 50
Your answer: 25
Correct!
```

4. **Brain Progression**  
Правила: Найдите пропущенное число в последовательности
Пример:

``` bash
Question: 5 .. 9 11 13
Your answer: 7
Correct!
```

5. **Brain Prime**  
Правила: Определите, является ли число простым
Пример:

``` bash
Question: 7
Your answer: yes
Correct!
```

## Структура проекта

```plaintext
.
├── bin/                              # Исполняемые файлы
├── src/                              # Исходный код
│   ├── Engine.php            # Ядро игры
│   └── Games/                  # Реализации игр
├── vendor/                        # Зависимости
├── Makefile                      # Управление командами
└── composer.json              # Конфигурация PHP
```

chmod +x bin/brain-even
composer dump-autoload