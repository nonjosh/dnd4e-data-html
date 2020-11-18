CUR_DIR = $(CURDIR)

build:
	docker build . -t nonjosh/dnd4e-data-html:1.0.0a

run:
	docker run -d --name dnd4e-data-html -p 1080:80 --restart always nonjosh/dnd4e-data-html:1.0.0a

start:
	docker build . -t nonjosh/dnd4e-data-html:1.0.0a
	kubectl apply -f k8s-deployment.yaml
	kubectl apply -f k8s-svc.yaml

rm:	
	kubectl delete -f k8s-deployment.yaml
	kubectl delete -f k8s-svc.yaml
	docker image rm nonjosh/dnd4e-data-html:1.0.0a

test:
	docker build . -t nonjosh/dnd4e-data-html:1.0.0a
	docker run --rm -v $(CUR_DIR):/var/www/html -p 1081:80 nonjosh/dnd4e-data-html:1.0.0a
