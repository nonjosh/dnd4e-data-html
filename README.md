# DnD4e data (html and PHP)

![Docker Image CI](https://github.com/nonjosh/dnd4e-data-html/workflows/Docker%20Image%20CI/badge.svg)

## How to use

build and create GUI container for searching

```sh
# run the bash script
bash start.sh

# or if you use Docker Compose
docker-compose up -d
```

stop and remove container

```sh
# run the bash script
bash rm.sh

# or if you use Docker Compose
docker-compose down
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

- [http://www.funin.space/]
