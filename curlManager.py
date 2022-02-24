import requests
import json

token = "youGithubToken"
userName = "'+userName+'"

headers = {
    'User-Agent': "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36",
    'Authorization': 'token '+token,

}


def createRepository(repoName, description, auto_init, Isprivate) -> bool:
    url = "https://api.github.com/user/repos"
    data = json.dumps({
        "name": repoName,
        "description": description,
        "auto_init": auto_init,
        "private": Isprivate
    })
    ch = requests.post(url,data=data,headers=headers)
    if json.loads(ch.content).get("documentation_url") == None:
        return True
    else:
        return False
def deleteRepository(repoName) -> bool:
    url = 'https://api.github.com/repos/'+userName+'/' + repoName
    ch = requests.delete(url,headers=headers)
    return True

def repositoryExist(repoName):
    url = 'https://api.github.com/repos/'+userName+'/' + repoName
    ch = requests.get(url)
    result = json.loads(ch.content)
    if result.get("documentation_url") == None:
        return True
    else:
        return False
