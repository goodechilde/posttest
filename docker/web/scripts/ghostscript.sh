#!/bin/bash
echo "installing ghostscript"
apt-get update -qq && apt-get install -y \
  ghostscript \
  libgs-dev \
  imagemagick
