build:
	docker build . -t nonjosh/dnd4e-data-html:1.0.0

run:
	docker run -d --name dnd4e-data-html -p 1080:80 --restart always nonjosh/dnd4e-data-html:1.0.0

start:
	docker build . -t nonjosh/dnd4e-data-html:1.0.0
	docker run -d --name dnd4e-data-html -p 1080:80 --restart always nonjosh/dnd4e-data-html:1.0.0

rm:
	docker rm -f dnd4e-data-html
	docker image rm nonjosh/dnd4e-data-html:1.0.0

test:
	docker run --rm -v $PWD:/var/www/html -p 1081:80 nonjosh/dnd4e-data-html
