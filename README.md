# DnD4e data (html and PHP)

![Docker Image CI](https://github.com/nonjosh/dnd4e-data-html/workflows/Docker%20Image%20CI/badge.svg)

## How to use

build and create GUI container for searching

```sh
# build and run the docker image
docker build . -t nonjosh/dnd4e-data-html:1.0.0a
docker run -d --name dnd4e-data-html -p 1080:80 --restart always nonjosh/dnd4e-data-html:1.0.0a


# or if you use Docker Compose
docker-compose up -d

# or if you use Kubernetes
docker build . -t nonjosh/dnd4e-data-html:1.0.0a
kubectl apply -f app-deployment.yaml
kubectl apply -f app-svc.yaml
```

stop and remove container

```sh
# remove container and image
docker rm -f dnd4e-data-html
docker image rm nonjosh/dnd4e-data-html:1.0.0a

# or if you use Docker Compose
docker-compose down

# or if you use Kubernetes
kubectl delete -f k8s-deployment.yaml
kubectl delete -f k8s-svc.yaml
docker image rm nonjosh/dnd4e-data-html:1.0.0a
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

- [http://funin.space/]
