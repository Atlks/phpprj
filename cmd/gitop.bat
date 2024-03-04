rem # 切换分支


cd site.group.admin.v1
git checkout mb_zhishu_online
git pull
git branch newBranch3
git checkout newBranch3
git push --set-upstream origin newBranch3


cd site.group.api.v1
git checkout mb_zhishu_online
git pull
git branch newBranch3
git checkout newBranch3
git push --set-upstream origin newBranch3

cd   site.group.quartz.v1
git checkout mb_zhishu_online
git pull
git branch newBranch3
git checkout newBranch3
git push --set-upstream origin newBranch3