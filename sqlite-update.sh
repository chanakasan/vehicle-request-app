#!/usr/bin/bash

# recreate database schema
app/console --env=test doctrine:database:drop --force
app/console --env=test doctrine:database:create
app/console --env=test doctrine:schema:update --force

# load data fixtures
app/console --env=test doctrine:fixtures:load
