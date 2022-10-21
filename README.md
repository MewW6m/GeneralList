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

| Field      | Type         | Null | Key | Default | 
| ---------- | ------------ | ---- | --- | ------- | 
| id         | bigint(20)   | NO   | PRI | NULL    | 
| status     | varchar(255) | YES  |     | NULL    | 
| itemCode   | varchar(255) | YES  |     | NULL    | 
| registUser | varchar(255) | YES  |     | NULL    | 
| updateUser | varchar(255) | YES  |     | NULL    | 
| enable     | tinyint(1)   | YES  |     | NULL    | 
| created_at | datetime(6)  | NO   |     | NULL    | 
| updated_at | datetime(6)  | NO   |     | NULL    | 

- departmentMasters(departmentCode, departmentName, enable)

| Field      | Type         | Null | Key | Default | 
| ---------- | ------------ | ---- | --- | ------- | 
| id         | bigint(20)   | NO   | PRI | NULL    | 
| name       | varchar(255) | YES  |     | NULL    | 
| enable     | tinyint(1)   | YES  |     | NULL    | 
| created_at | datetime(6)  | NO   |     | NULL    | 
| updated_at | datetime(6)  | NO   |     | NULL    | 

- users(id, userName, departmentCode, enable)

| Field                  | Type         | Null | Key | Default | 
| ---------------------- | ------------ | ---- | --- | ------- | 
| id                     | bigint(20)   | NO   | PRI | NULL    | 
| departmentId           | bigint(20)   | NO   | UNI |         | 
| email                  | varchar(255) | NO   | UNI |         | 
| encrypted_password     | varchar(255) | NO   |     |         | 
| reset_password_token   | varchar(255) | YES  | UNI | NULL    | 
| reset_password_sent_at | datetime(6)  | YES  |     | NULL    | 
| remember_created_at    | datetime(6)  | YES  |     | NULL    | 
| created_at             | datetime(6)  | NO   |     | NULL    | 
| updated_at             | datetime(6)  | NO   |     | NULL    | 

- itemMasters(id, itemCode, itemName, enable)

| Field      | Type         | Null | Key | Default | 
| ---------- | ------------ | ---- | --- | ------- | 
| id         | bigint(20)   | NO   | PRI | NULL    | 
| code       | varchar(255) | YES  |     | NULL    | 
| name       | varchar(255) | YES  |     | NULL    | 
| enable     | tinyint(1)   | YES  |     | NULL    | 
| created_at | datetime(6)  | NO   |     | NULL    | 
| updated_at | datetime(6)  | NO   |     | NULL    | 

### Other
#### Architecture
- データ取得のタイミングはページ描画時
    - 検索、ソート、ページングはフロントで処理
    - 静的ページを想定

## Demo
- http://157.7.201.187/users/sign_in

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
