
from os.path import exists
import shutil

import curlManager
import gitManager

name = input("le nom du plugin à tranfere ")
createRepo = input("créer un repo ? ")
push = input("push sur github ? ")

base_path = "T:\Pocketmine-MP\Minage\plugin_data\DevTools\\"
dest = "T:\Pocketmine-MP\\allPlugin\phar"
path = base_path+name+"_v1.0.0.phar"
if exists(path):
    shutil.copy(path,dest)
    print("copy effectue")
    if curlManager.repositoryExist(name) == False:
        if createRepo == "oui":
            #TODO metre l'input description
            curlManager.createRepository(name,"description",False,False)
            print("le repo à été créer")
    if push == "oui":
        gitManager.InitialiseGit(name, "push")
        gitManager.executeShell()
        print("le repo à été push")

else:
    print("le nom du plugin founie n'est pas valid ! ("+path+")")

