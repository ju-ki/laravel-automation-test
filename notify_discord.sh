#!/bin/sh

WEBHOOK_URL=""
# テスト結果のメッセージ
if [ $? -eq 0 ]; then
    MESSAGE="テストに成功しました。"
else
    MESSAGE="テストに失敗しました。"
fi

# Discordに通知
curl -H "Content-Type: application/json" -X POST -d "{\"content\":\"$MESSAGE\"}" $WEBHOOK_URL
