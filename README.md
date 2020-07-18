# DnD4e data (html and PHP)

## How to use

build and create GUI container for searching

```sh
./start.sh
```

stop and remove container

```sh
./rm.sh
```

## API

Example call: `http://localhost:1080/?search=avenger&folders[]=class&api=true`

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
      "/compendium/class/Invoker.html",
      "/compendium/class/Paladin.html",
      "/compendium/class/Hybrid-Wizard.html",
      "/compendium/class/Hybrid-Avenger.html",
      "/compendium/class/Hybrid-Monk.html",
      "/compendium/class/Hybrid-Shaman.html",
      "/compendium/class/Hybrid-Druid.html",
      "/compendium/class/Avenger.html"
    ]
  }
}
```

## Origin

- http://www.funin.space/
