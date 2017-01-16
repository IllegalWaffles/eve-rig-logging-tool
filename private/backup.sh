#!/bin/bash

#save teh original path or something
savedpath=$(pwd)

#dis where i wanna save
cd /vagrant_data/eve/private/

#make teh file naem
v=\"$(date +%D-%T).sql\"

#DUMP LOL xD
mysqldump -u root -p eve > $v

#feedback. it's important.
echo Script completed. Database backed up to:
echo $(pwd)/$v

#go back to the original path or something
cd $savedpath