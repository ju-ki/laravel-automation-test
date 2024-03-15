#!/bin/sh

WEBHOOK_URL="https://discord.com/api/webhooks/1218196361191882852/3g2oqLGp1Ms4tBszO24Zhn9_nj8oSV98x3fpN2w2Xw_60An2pEXq3tdnrD8UWU08HNYG"
# テスト結果のメッセージ
if [ $? -eq 0 ]; then
    MESSAGE="テストに成功しました。"
else
    MESSAGE="テストに失敗しました。"
fi

# Discordに通知
curl -H "Content-Type: application/json" -X POST -d "{\"content\":\"$MESSAGE\"}" $WEBHOOK_URL