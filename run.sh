#!/bin/bash
. .env

docker run --name $DOCKER_CONTAINER_NAME -it --entrypoint=/bin/bash $DOCKER_IMAGE_NAME
docker rm $DOCKER_CONTAINER_NAME
