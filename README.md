# New Laravel Project

Create **new project** command:
```bash
bash <(curl -s https://gitlab.ideil.com/queens/laravel-project/raw/master/create.sh) projectName
```

## Alias (MacOS)
Create alias for command on MacOS

Add this line to your `.zshrc` file
```
alias create-project='bash <(curl -s https://gitlab.ideil.com/queens/laravel-project/raw/master/create.sh)'
```
Or run command:
```bash
echo "alias create-project='bash <(curl -s https://gitlab.ideil.com/queens/laravel-project/raw/master/create.sh)'" >> ~/.zshrc
```
Now you can reload your terminal and use command `create-project projectName` to create a new project

## Alias (Ubuntu)
Create alias for command on Linux(Ubuntu)

Create\Modify file, named `.bash_aliases`:
```
nano ~/.bash_aliases
```
Add alias to that file:
```
alias create-project='bash <(curl -s https://gitlab.ideil.com/queens/laravel-project/raw/master/create.sh)'
```
Or just run the command:
```
echo "alias create-project='bash <(curl -s https://gitlab.ideil.com/queens/laravel-project/raw/master/create.sh)'" >> ~/.bash_aliases
```
After that - activate alias by entering:
```
source ~/.bashrc
```