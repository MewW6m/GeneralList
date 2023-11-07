<div class="height100 uk-flex uk-flex-center uk-flex-middle uk-position-relative uk-card uk-card-default uk-box-shadow-small uk-border-rounded">
  <div class="margin100-20 search-border">
    <div class="uk-column-1-2@s uk-column-1-3@m padding15-10">
      <div class="uk-margin">
        <label class="uk-form-label uk-text-muted" for="form-stacked-text">在庫コード</label>
        <div class="uk-form-controls">
          <input class="uk-input" id="zaikoCodeInput" type="text" placeholder="" tabindex="1">
        </div>
      </div>
      <div class="uk-margin uk-visible@m">
        <label class="uk-form-label uk-text-muted" for="form-stacked-text">ステータス</label>
        <div class="uk-form-controls">
          <select class="uk-select" id="statusSelect" tabindex="3">
            <option></option>
            <option>入荷</option>
            <option>棚卸</option>
            <option>返却</option>
            <option>処分</option>
            <option>不明</option>
          </select>
        </div>
      </div>
      <div class="uk-margin uk-visible@s">
        <label class="uk-form-label uk-text-muted" for="form-stacked-text">物品コード</label>
        <div class="uk-form-controls">
          <input class="uk-input" id="itemCodeInput" type="text" placeholder="" tabindex="1">
        </div>
      </div>
      <div class="uk-margin uk-visible@m uk-invisible">
        <label class="uk-form-label uk-text-muted" for="form-stacked-text"></label>
        <div class="uk-form-controls">
          <input class="uk-input" id="" type="text" placeholder="" tabindex="1">
        </div>
      </div>
      <div class="uk-margin uk-visible@s">
        <label class="uk-form-label uk-text-muted" for="form-stacked-text">物品名</label>
        <div class="uk-form-controls">
          <input class="uk-input" id="itemNameInput" type="text" placeholder="" tabindex="2">
        </div>
      </div>
      <div class="uk-margin uk-flex uk-flex-right uk-flex-bottom height64">
        <button id="searchBtn" class="uk-button uk-button-primary uk-border-rounded" tabindex="6">検索</button>
      </div>
    </div>
  </div>
  <span class="search-text">検索条件</span>
</div>
