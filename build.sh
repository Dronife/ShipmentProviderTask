#!/bin/bash
. .env

# Build the Docker image
docker build -t $DOCKER_IMAGE_NAME .
