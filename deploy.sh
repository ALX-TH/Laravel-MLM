#!/bin/bash

# Get script start time
begin=$(date +%s)

# Run main deployment script
app=$(pwd)
cd ${app}/core && bash deploy.sh
cd ${app}/frontend && bash deploy.sh

# Print script execution time
echo -e "Finished at:" $[$(date +%s)-$begin] "seconds"