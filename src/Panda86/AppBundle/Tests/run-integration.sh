#!/bin/bash 

clear

alias gtp="cd ~/code/RequestVehicleApp"
gtp
app/console --env=test doctrine:database:drop --force

alias gtpu="cd ~/code/RequestVehicleApp/src/Panda86/AppBundle/Tests"
gtpu

phpunit Integration/
