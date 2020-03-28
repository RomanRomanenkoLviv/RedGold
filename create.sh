projectName=$1;

while [[ $projectName = "" ]]; do
    echo "Enter new project name"
    read projectName;
done

composer create-project laravel/laravel $projectName \
    --prefer-dist \
    --remove-vcs \
    --ignore-platform-reqs \
    --repository="{\"url\": \"git@gitlab.ideil.com:queens/laravel-project.git\", \"type\": \"vcs\"}"

cd $projectName