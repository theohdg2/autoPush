from os.path import exists
import os

allRealName = []


def verifAll():
    scan = os.scandir("T:\Pocketmine-MP\\allPlugin\\phar")
    for entry in scan:
        e = entry.name.split("_")[0]
        if directoryExist(e):
            allRealName.append(e)
        else:
            print(e+" n'as pas été trouvé dans les dossier (T:\Pocketmine-MP\\allPlugin\directory)")

def directoryExist(fileName) -> bool:
    if exists("T:\Pocketmine-MP\\allPlugin\directory\\"+fileName):
        return True
    else:
        return False

def getAll():
    return allRealName
