#! /bin/sh
sh cc

if [ -n "$(getent passwd apache)" ]; then
# user apache exists
setfacl -R -m u:apache:rwx  app/cache app/logs tmp src/LMS/ExerciseBundle/Resources/content web/public
setfacl -dR -m u:apache:rwx  app/cache app/logs tmp src/LMS/ExerciseBundle/Resources/content web/public
fi



#cp app/scripts/hooks/pre-commit .git/hooks/
#chmod +x .git/hooks/pre-commit
#cp app/scripts/hooks/prepare-commit-msg .git/hooks/
#chmod +x .git/hooks/prepare-commit-msg

#chmod +x dbupdate.sh
#chmod +x app/console
#chmod +x bin/vendors

echo "\n\n------------------------"
echo "What next:"
echo "- Run build target or init.sh"
echo "------------------------\n\n"

