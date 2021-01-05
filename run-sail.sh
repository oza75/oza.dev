#!/usr/bin/env bash
echo "Stopping mysql,valet and redis"
sudo systemctl stop mysql redis
valet stop
echo "Stopping maildev"
fuser -k 1025/tcp
echo "Running sail"
sail up
