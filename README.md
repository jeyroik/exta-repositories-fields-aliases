![PHP Composer](https://github.com/jeyroik/extas-repositories-fields-aliases/workflows/PHP%20Composer/badge.svg?branch=master&event=push)
![codecov.io](https://codecov.io/gh/jeyroik/extas-repositories-fields-aliases/coverage.svg?branch=master)

# Описание

Пакет автоматически добавляет в качестве алиаса текущее имя сущности.

Для этого сущность должна реализовывать интерфейсы `extas\interfaces\IHasName` и `extas\interfaces\IHasAliases`.

# Использование

1. Добавляем в `extas.json`:

```json
{
    "plugins": [
        {
            "class": "extas\\components\\plugins\\repositories\\PluginFieldSelfAlias",
            "stage": "extas.<entity>.before.create"
        }
    ]
}
```

2. Устанавливаем

`# vendor/bin/extas i`