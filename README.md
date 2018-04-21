# 特定ユーザのQiita記事のLIKE(contribution)数をjsonで取得

## Installation 

### build

```
docker build . -t qiita_contribution
```

### ship 

```
docker run -p 80:80 qiita_contribution
```

### usage

http://example.com/?users=user1,user2,user3


