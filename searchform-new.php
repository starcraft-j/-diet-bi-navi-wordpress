<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/form.css" />

<div id="search-container">
  <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <input type="hidden" name="post_type" value="test">
    <input type="text" placeholder="<?php if(!is_search()){ echo 'テストから探す';} ?>" value="<?php if(is_search()){ echo get_search_query();} ?>" class="test-searchbody" name="s">
    <div class="check-items">
      <label id="form-item-01">
        <input type="checkbox" name="rules-new[]" value="機能性表示食品"><span class="check-icon"></span><span>機能性表示食品</span>
      </label>
      <label id="form-item-02">
        <input type="checkbox" name="rules-new[]" value="初回限定価格あり"><span class="check-icon"></span><span>初回限定価格あり</span>
      </label>
      <label id="form-item-03">
        <input type="checkbox" name="rules-new[]" value="人気商品"><span class="check-icon"></span><span>人気商品</span>
      </label>
      <label id="form-item-04">
        <input type="checkbox" name="rules-new[]" value="脂肪を減らすのを助ける"><span
          class="check-icon"></span><span>脂肪を減らすのを<br>助ける</span>
      </label>
    </div>
    <div class="select-items">
      <select name="price">
        <option value="">初回価格</option>
        <option value="3000">3000円以内</option>
        <option value="6000">6000円以内</option>
        <option value="10000">10000円以内</option>
      </select>

      <select name="regularly">
        <option value="">定期価格</option>
        <option value="3000">3000円以内</option>
        <option value="6000">6000円以内</option>
        <option value="10000">10000円以内</option>
      </select>

      <select name="jenre">
        <option value="">サプリタイプ</option>
        <option value="脂肪対策サプリ">脂肪対策サプリ</option>
        <option value="糖質ケアサプリ">糖質ケアサプリ</option>
        <option value="体内フローラサポートサプリ">体内フローラサポートサプリ</option>
        <option value="血糖値ケアサプリ">血糖値ケアサプリ</option>
        <option value="酵素サプリ">酵素サプリ</option>
        <option value="酵素ドリンク">酵素ドリンク</option>
        <option value="スムージー">スムージー</option>
      </select>

      <select name="plan">
        <option value="">割引ブラン</option>
        <option value="初回限定価格あり">初回限定価格あり</option>
        <option value="定期コース割引あり">定期コース割引あり</option>
      </select>

      <select name="rank-osusume">
        <option value="">おすすめ度</option>
        <option value="1">4.0以上</option>
        <option value="2">3.0~3.9</option>
        <option value="3">2.9以下</option>
      </select>
    </div>

    <div class="searchbutton pc">
       <button type="submit"><img src="<?php print get_template_directory_uri(); ?>/img/searchbutton.png" width="100%"></button>
       </div>
     
     <div class="searchresult" style="display:none;">検索結果：<span>00</span>件</div>
  </form>
</div>