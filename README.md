# GeneralList
物品のデータを一覧で表示するアプリを作る..

## Overview
- 物品在庫のデータを一覧表示できるアプリを作る
- 任意の値を入力し、検索ボタンを押すと一覧が更新される
- 一覧のヘッダを押すと、一覧が更新される
- ページングを押すと、一覧が更新される
- 一覧行を押すと詳細が表示される

### Purpose
- Ruby on Railsの習得のため

### Term
- 2022/10 ~ 2022/12
    - 本期間後サーバー削除

## Description

### Screen
- ログイン多面
- 物品一覧画面
- 物品詳細画面
- エラー画面

### Data
- stocks(id, status, itemCode, registUser, updateUser, enable)
- departmentMaster(departmentCode, departmentName, enable)
- UserMaster(id, userName, departmentCode, enable)
- itemMaster(id, itemCode, itemName, enable)

### Other
#### Architecture
- データ取得のタイミングはページ描画時
    - 検索、ソート、ページングはフロントで処理
    - 静的ページを想定

## Demo
- http://157.7.203.211/ 

## Requirement
- UIKit
- Ruby
- Ruby on Rails
- MySQL

## Usage
- ログインする
- 一覧を表示する
- 一覧行を選択し、詳細を表示する
- 検索を行い、表示行を絞る

## Licence
GNU General Public License v3.0

## Author
- MewW6m ([@MewW6m](https://github.com/MewW6m/))
