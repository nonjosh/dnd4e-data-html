CUR_DIR = $(CURDIR)

build:
	docker build . -t nonjosh/dnd4e-data-html
run:
	docker run -d --name dnd4e-data-html -p 1080:80 --restart always nonjosh/dnd4e-data-html
start:
	docker build . -t nonjosh/dnd4e-data-html
	kubectl apply -k k8s/base
rm:	
	kubectl delete -k k8s/base
	docker image rm nonjosh/dnd4e-data-html
test:
	docker build . -t nonjosh/dnd4e-data-html
	docker run --rm -v $(CUR_DIR):/var/www/html -p 1081:80 nonjosh/dnd4e-data-html
