import os
from pathlib import Path

def InitialiseGit(repoName,commit):
    Path('./cmd/gitModif.cmd').write_text(
        Path('./cmd/gitNotModif.cmd').read_text().replace("{repo}",repoName).replace("{commit}",commit),
        encoding='utf-8'
    )

def executeShell():
    os.system("T:\\transfer\cmd\gitModif.cmd")