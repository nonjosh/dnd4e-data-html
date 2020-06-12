# DnD4e data (html and PHP)

## How to use

create GUI container for searching

```sh
docker-compose up -d
```

stop and remove container

```sh
docker-compose down
```

## API

Example call: `http://vm1.nonjosh.info/?search=avenger&folders%5B%5D=class&api=true`

Response:

```json
{
  "request": {
    "search": "avenger",
    "folders": [
      "class"
    ],
    "api": "true"
  },
  "data": {
    "class": [
      "/var/www/html/compendium/class/Invoker.html",
      "/var/www/html/compendium/class/Paladin.html",
      "/var/www/html/compendium/class/Hybrid-Wizard.html",
      "/var/www/html/compendium/class/Hybrid-Avenger.html",
      "/var/www/html/compendium/class/Hybrid-Monk.html",
      "/var/www/html/compendium/class/Hybrid-Shaman.html",
      "/var/www/html/compendium/class/Hybrid-Druid.html",
      "/var/www/html/compendium/class/Avenger.html"
    ]
  }
}
```

## Origin

- http://www.funin.space/