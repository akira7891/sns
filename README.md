

## 掲示板の作成プロジェクトです

## ドッカーを使用しています


## チームでドッカー開発する場合

１.ギットハブからコードを取得

2.以下のコードを作業するsns/で実行
sailのドッカー環境が構築されます

docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs

