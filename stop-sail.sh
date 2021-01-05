#!/usr/bin/env bash
sail down
sudo systemctl start mysql redis
valet start
