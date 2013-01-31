#! /bin/sh
echo "SONAR HOME: "
echo $SONAR_RUNNER_HOME
currentUser=$(whoami)

sh cc

chmod +x app/console

app/console assetic:dump --env=prod

#echo "\n\n------------------------"
#echo "What next:"
#echo "1. [OPTIONALLY] Install fixtures I you want to run appliation (IMPORTANT: it removes all existing data from current database!): app/console doctrine:fixtures:load"
#echo "3. Check configuration using web/config.php"
#echo "4. Run build target"
#echo "------------------------\n\n"

