# ref: http://stackoverflow.com/questions/3740152/how-to-set-chmod-for-a-folder-and-all-of-its-subfolders-and-files-in-linux-ubunt

# Set owner of files
chown -R unipar:unipar /home/unipar/Trabalho/AulasUnipar2015

# Set chmod 777 for directories
find /home/unipar/Trabalho/AulasUnipar2015 -type d -exec chmod 777 {} \;

# Set chmod 666 for files
find /home/unipar/Trabalho/AulasUnipar2015 -type f -exec chmod 666 {} \;

# ==

rm -f /home/alisson/Trabalho/AulasUnipar2015

# Criar link simbolico
ln -s /home/unipar/Trabalho/AulasUnipar2015/ /home/alisson/Trabalho/AulasUnipar2015
