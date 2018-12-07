#!/bin/bash
apt-get update && apt-get install -y git zip
docker-php-ext-install -j$(nproc) bcmath sockets
