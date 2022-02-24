title {repo} - {commit}
cd T:\Pocketmine-MP\allPlugin\directory\{repo}
git init
git add .
git commit -m "{commit}"
git branch -M main
git remote add origin https://github.com/theohdg2/{repo}.git
git push -u origin main