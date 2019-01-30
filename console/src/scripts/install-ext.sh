#!/bin/bash
docker-php-ext-install -j$(nproc) bcmath sockets
