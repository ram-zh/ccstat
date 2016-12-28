#!/bin/bash
if [ $USER == "root" ]; then
	OWNER=$SUDO_USER
else
	OWNER=$USER
fi;

sudo chown -R $OWNER:www-data .
sudo chmod -R g+w,g+r .

