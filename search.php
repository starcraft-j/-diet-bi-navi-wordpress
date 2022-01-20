<?php get_header();


if($_GET['option'] == '') {
  $s = $_GET['s'];
  $price = $_GET['price'];
  $jenre = $_GET['jenre'];
  $plan = $_GET['plan'];
  $ranking = $_GET['ranking'];
  $onedayprice = $_GET['onedayprice'];
  $jenre2 = $_GET['jenre2'];
  if(isset($_GET['rules'])){
    $rules = $_GET['rules'];
  }
} else {
  $s = $_GET['s'];
  $price = $_GET['price'];
  $regularly = $_GET['regularly'];
  $jenre = $_GET['njenre'];
  $plan = $_GET['plan'];
  $ranking = $_GET['ranking'];
  $osudo = $_GET['osusume'];
  $rulesN = $_GET['kodawari'];
}


$query = "?".$_SERVER['QUERY_STRING'];
$search = array('&f=index.php&','&f=index.php');
$query2 = str_replace($search, '', $query);


function number_unit($int){
 
  $unit = array('万','億','兆','京');
  krsort($unit);
 
  if(is_numeric($int)){
 
    $tmp = '';
    $count = strlen($int);
    foreach($unit as $k => $v){
      if($count > (4 * ($k + 1))){
        if($int!==0) $tmp .= number_format(floor( $int /pow(10000,$k+1))).$v;
        $int = $int % pow(10000,$k+1);
      }
    }
    if($int!==0) $tmp .= number_format($int % pow(10000,$k+1));
 
    return $tmp;
 
  }else{
 
    return false;
 
  }
}
 ?>


<?php //include("pickup.php"); ?>

<?php wp_reset_query();
if(!empty($_GET['metakey'])){
  $metakey = $_GET['metakey'];
}
elseif($_GET['option'] == 'new') {
  $metakey = "osusume";
}
else {
  $metakey = "ex";
}
if(empty($_GET['order'])){
  $order = "desc";
}

if($osudo == "1"){
    $metaquerysp[] = array(
    'key'=>'osusume',
    'value'=> "4",
    'compare'=>'>=',
    'type'=>'NUMERIC'
    );
} elseif($osudo == "2"){
    $metaquerysp[] = array(
      array(
        'key'=>'osusume',
        'value'=> "3.0",
        'compare'=>'>=',
        'type'=>'NUMERIC'),
      array(
        'key'=>'osusume',
        'value'=> "3.9",
        'compare'=>'<=',
        'type'=>'NUMERIC'),
    );
}elseif($osudo == "3"){
    $metaquerysp[] = array(
      array(
        'key'=>'osusume',
        'value'=> "2",
        'compare'=>'>=',
        'type'=>'NUMERIC'),
      array(
        'key'=>'osusume',
        'value'=> "2.9",
        'compare'=>'<=',
        'type'=>'NUMERIC'),
    );
}

if($_GET['price'] == "3000"){
    $metaquerysp[] = array(
    'key'=>'price',
    'value'=>'3000',
    'compare'=>'<=',
    'type'=>'NUMERIC'
    );
}elseif($_GET['price'] == "6000"){
    $metaquerysp[] = array(
    'key'=>'price',
    'value'=>'6000',
    'compare'=>'<=',
    'type'=>'NUMERIC'
    );
}elseif($_GET['price'] == "10000"){
    $metaquerysp[] = array(
    'key'=>'price',
    'value'=>'10000',
    'compare'=>'<=',
    'type'=>'NUMERIC'
    );
}

if($_GET['regularly'] == "3000"){
  $metaquerysp[] = array(
  'key'=>'regularly',
  'value'=>'3000',
  'compare'=>'<=',
  'type'=>'NUMERIC'
  );
}elseif($_GET['regularly'] == "6000"){
  $metaquerysp[] = array(
  'key'=>'regularly',
  'value'=>'6000',
  'compare'=>'<=',
  'type'=>'NUMERIC'
  );
}elseif($_GET['regularly'] == "10000"){
  $metaquerysp[] = array(
  'key'=>'regularly',
  'value'=>'10000',
  'compare'=>'<=',
  'type'=>'NUMERIC'
  );
}

if($plan){
    $metaquerysp[] = array(
    'key'=>'plan',
    'value'=>$plan,
    'compare'=>'LIKE',
    );
}

?>
<?php 
if ($_GET['jenre2'] == "7") {
  $metaquerysp[] = array(
    'key'=>'jenre2',
    'value'=>'7',
    'compare'=>'<=',
    'type'=>'NUMERIC'
  );
} elseif ($_GET['jenre2'] == "14") {
  $metaquerysp[] = array(
    'key'=>'jenre2',
    'value'=>'14',
    'compare'=>'<=',
    'type'=>'NUMERIC'
  );
} elseif ($_GET['jenre2'] == "30") {
  $metaquerysp[] = array(
    'key'=>'jenre2',
    'value'=>'30',
    'compare'=>'<=',
    'type'=>'NUMERIC'
  );
}
if ($_GET['onedayprice'] == "150") {
  $metaquerysp[] = array(
    'key'=>'onedayprice',
    'value'=>'150',
    'compare'=>'<=',
    'type'=>'NUMERIC'
  );
} elseif ($_GET['onedayprice'] == "200") {
  $metaquerysp[] = array(
    'key'=>'onedayprice',
    'value'=>'200',
    'compare'=>'<=',
    'type'=>'NUMERIC'
  );
} elseif ($_GET['onedayprice'] == "250") {
  $metaquerysp[] = array(
    'key'=>'onedayprice',
    'value'=>'250',
    'compare'=>'<=',
    'type'=>'NUMERIC'
  );
} elseif ($_GET['onedayprice'] == "300") {
  $metaquerysp[] = array(
    'key'=>'onedayprice',
    'value'=>'300',
    'compare'=>'<=',
    'type'=>'NUMERIC'
  );
}
if($_GET['option'] == '') {
    if($jenre){
      $metaquerysp[] = array(
      'key'=>'jenre',
      'value'=> $jenre,
      'compare'=>'LIKE',
      'type'=>'CHAR'
      );
  }
  if (is_array($rules)) {
      foreach($rules as $val){
        $metaquerysp[] = array(
          'key'=>'rules',
          'value'=> $val,
          'compare'=>'LIKE',
        );
      }
  } else {
      $metaquerysp[] = array(
        'key'=>'rules',
        'value'=> $rules,
        'compare'=>'LIKE',
      );
  }
} else {
  if($jenre){
    $metaquerysp[] = array(
    'key'=>'njenre',
    'value'=> $jenre,
    'compare'=>'LIKE',
    'type'=>'CHAR'
    );
  }

  if(is_array($rulesN)) {
    foreach($rulesN as $val){
      $metaquerysp[] = array(
        'key'=>'kodawari',
        'value'=> $val,
        'compare'=>'LIKE',
        'type'=>'CHAR'
      );
    }
  } else {
    $metaquerysp[] = array(
        'key'=>'kodawari',
        'value'=> $rulesN,
        'compare'=>'LIKE',
        'type'=>'CHAR'
      );
  }
}
if ($ranking == "1") {
  $args = array(
      'meta_query' => array($metaquerysp),
      'posts_per_page' => 3,
      'post_status' => 'publish',
      'orderby' =>'meta_value_num',
      'order' => 'desc',
      'meta_key' => $metakey,
  );
} elseif($ranking == "2") {
  $args = array(
      'meta_query' => array($metaquerysp),
      'offset' => 3,
      'post_status' => 'publish',
      'orderby' =>'meta_value_num',
      'order' => 'desc',
      'meta_key' => $metakey,
  );
} elseif ($ranking == "") {
  if(!empty($order) || !empty($metakey)){
    $args = array(
        'meta_query' => array($metaquerysp),
        'post_status' => 'publish',
        'orderby' =>'meta_value_num',
        'order' => $order,
        'meta_key' => $metakey,
    );
} elseif ($_GET['option'] == "new") {
    $args = array(
        'meta_query' => array($metaquerysp),
        'post_status' => 'publish',
        'orderby' =>'menu_order',
        'order' => $order,
        'meta_key' => $metakey,
        's' => $s,
    );
}else{
    $args = array(
        'meta_query' => array($metaquerysp),
        'post_status' => 'publish',
        'orderby' =>'meta_value_num',
    );
  };
}


?>

<?php $metaquerysp['relation'] = 'AND'; ?>

<?php

//echo "<pre>";
//print_r($args);
//echo "</pre>";


$query = new WP_Query($args);
$get_num = $query->post_count;
?>

<div style="padding:10px 0 0;">
  <?php get_search_form(); ?>
</div>


<div class="resultvalue"> 検索結果：<span><?php echo $get_num - 9; ?></span>件
  <!-- <a href=""><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/researchbutton.png" width="282" class="middle"><span class="sp">再検索する</span></a> -->
</div>


<ul class="bread">
  <li><a
      href="https://bi-navi.com?logid=<?php echo $_GET['logid']; ?>&cam=<?php echo $_GET['cam']; ?>&gr_no=<?php echo $_GET['gr_no']; ?>&key=<?php echo $_GET['key']; ?>&ad_no=<?php echo $_GET['ad_no']; ?>&link_no=<?php echo $_GET['link_no']; ?>&pat=<?php echo $_GET['pat']; ?>&switch=<?php echo $_GET['switch']; ?>">TOP</a>
  </li>
  <?php if($_GET['option'] == "") : ?>
  <li>
    <?php if($price){ echo $price."・"; } ?><?php if($onedayprice){ echo $onedayprice."・"; } ?><?php if($contv){ echo number_unit($contv)."以上・"; } ?><?php if($jenre){ echo $jenre."・"; } ?><?php if($plan){ echo $plan."・"; } ?><?php if($ranking == "1"){ echo "1～3位・"; }elseif($ranking == "2"){ echo "4位以下・"; } ?>
    <?php 
      if(isset($_GET['rules'])){
        if(is_array($rules)){
            foreach($rules as $value){
            echo $value."/";
            } 
        }else{
        echo $rules."/";
        }
      } 
    ?>
  </li>
  <?php else : ?>
  <li>
    <?php if($price){ 
      if($price == 3000) {
        echo "<span>初回3000円以内</span>　"; 
      } elseif($price == 6000) {
        echo "<span>初回6000円以内</span>　"; 

      } elseif($price == 10000) {
        echo "<span>初回1万円以内</span>　"; 
      }
    }
    ?>
    <?php if($regularly){ 
      if($regularly == 3000) {
        echo "<span>定期3000円以内</span>　"; 
      } elseif($regularly == 6000) {
        echo "<span>定期6000円以内</span>　"; 

      } elseif($regularly == 10000) {
        echo "<span>定期1万円以内</span>　"; 
      }
      } 
      ?>
    <?php if($jenre){ echo "<span>".$jenre."</span> "; } ?>
    <?php if($plan){ echo "<span>".$plan."</span> "; } ?>
    <?php 
      if($osudo){ 
        if($osudo == 1) {
          echo "<span>オススメ度4.0以上</span>　"; 
        } elseif($osudo == 2) {
          echo "<span>オススメ度3.0~3.9</span>　"; 

        } elseif($osudo == 3) {
          echo "<span>オススメ度2.9以下</span>　"; 
        }
      }
    ?>
    <?php 
      if(isset($rulesN)){
        if(is_array($rulesN)){
            foreach($rulesN as $value){
            echo "<span>".$value."</span> ";
            } 
        }else{
        echo "<span>".$rulesN."</span> ";
        }
      } 
    ?>
  </li>
  <?php endif; ?>

</ul>


<!-- sort button -->

<form class="table" id="sort_form1" action="<?php echo home_url( '/' ); ?>" method="get">
  <?php 
    foreach ($_GET as $k => $v) {
      if($k != "order") {
      if($k != "metakey") {
        if(is_array($v)){ 
          foreach ($v as $n) { 
  ?>
            <input type="hidden" value="<?php echo $n; ?>" name="<?php echo $k; ?>[]">
  <?php } ?>
  <?php } else { ?>
  <input type="hidden" value="<?php echo $v; ?>" name="<?php echo $k; ?>">
  <?php 
        } 
      }
    }
  } ?>
  <input type="hidden" value="ex" name="metakey">
  <input type="hidden" value="<?php if($order == "desc"){ echo "asc"; }elseif($order == "asc"){ echo "desc"; } ?>" name="order">
</form>

<form class="table" id="sort_form2" action="<?php echo home_url( '/' ); ?>" method="get">
  <?php 
    foreach ($_GET as $k => $v){
      if($k != "order") {
      if($k != "metakey") {
        if(is_array($v)){ 
          foreach ($v as $n) { 
  ?>
            <input type="hidden" value="<?php echo $n; ?>" name="<?php echo $k; ?>[]">
  <?php } ?>
  <?php } else { ?>
  <input type="hidden" value="<?php echo $v; ?>" name="<?php echo $k; ?>">
  <?php 
        } 
      }
    }
  } ?>
  <input type="hidden" value="price" name="metakey">
  <input type="hidden" value="<?php if($order == "desc"){ echo "asc"; }elseif($order == "asc"){ echo "desc"; } ?>" name="order">
</form>

<form class="table" id="sort_form3" action="<?php echo home_url( '/' ); ?>" method="get">
  <?php 
    foreach ($_GET as $k => $v){
      if($k != "order") {
      if($k != "metakey") {
        if(is_array($v)){ 
          foreach ($v as $n) { 
  ?>
            <input type="hidden" value="<?php echo $n; ?>" name="<?php echo $k; ?>[]">
  <?php } ?>
  <?php } else { ?>
  <input type="hidden" value="<?php echo $v; ?>" name="<?php echo $k; ?>">
  <?php 
        } 
      }
    }
  } ?>
  <input type="hidden" value="onedayprice" name="metakey">
  <input type="hidden" value="<?php if($order == "desc"){ echo "asc"; }elseif($order == "asc"){ echo "desc"; } ?>" name="order">
</form>

<form class="table" id="sort_form4" action="<?php echo home_url( '/' ); ?>" method="get">
  <?php 
    foreach ($_GET as $k => $v){
      if($k != "order") {
      if($k != "metakey") {
        if(is_array($v)){ 
          foreach ($v as $n) { 
  ?>
            <input type="hidden" value="<?php echo $n; ?>" name="<?php echo $k; ?>[]">
  <?php } ?>
  <?php } else { ?>
  <input type="hidden" value="<?php echo $v; ?>" name="<?php echo $k; ?>">
  <?php
        }
      }
    }
  } ?>
  <input type="hidden" value="jenre2" name="metakey">
  <input type="hidden" value="<?php if($order == "desc"){ echo "asc"; }elseif($order == "asc"){ echo "desc"; } ?>" name="order">
</form>

<form class="table" id="sort_form5" action="<?php echo home_url( '/' ); ?>" method="get">
  <?php 
    foreach ($_GET as $k => $v){
      if($k != "order") {
      if($k != "metakey") {
        if(is_array($v)){ 
          foreach ($v as $n) { 
  ?>
            <input type="hidden" value="<?php echo $n; ?>" name="<?php echo $k; ?>[]">
  <?php } ?>
  <?php } else { ?>
  <input type="hidden" value="<?php echo $v; ?>" name="<?php echo $k; ?>">
  <?php
        }
      }
    }
  } ?>
  <input type="hidden" value="jenre" name="metakey">
  <input type="hidden" value="<?php if($order == "desc"){ echo "asc"; }elseif($order == "asc"){ echo "desc"; } ?>" name="order">
</form>

<form class="table" id="sort_form6" action="<?php echo home_url( '/' ); ?>" method="get">
  <?php 
    foreach ($_GET as $k => $v){
      if($k != "order") {
      if($k != "metakey") {
        if(is_array($v)){ 
          foreach ($v as $n) { 
  ?>
            <input type="hidden" value="<?php echo $n; ?>" name="<?php echo $k; ?>[]">
  <?php } ?>
  <?php } else { ?>
  <input type="hidden" value="<?php echo $v; ?>" name="<?php echo $k; ?>">
  <?php
        }
      }
    }
  } ?>
  <input type="hidden" value="regularly" name="metakey">
  <input type="hidden" value="<?php if($order == "desc"){ echo "asc"; }elseif($order == "asc"){ echo "desc"; } ?>" name="order">
  
</form>


<?php if($_GET['option'] == "new") : ?>
<style>
   
   .bread li span {
    display: inline-block;
    padding: 0 4px;
    font-size: 1rem;
    color: #46b4c5;
  }
  .flex-sort-box {
    display: flex;
    align-items: center;
    height: 60px;
    color: #fff;
    
  }
  @media (max-width: 768px) {
    .bread {
      margin: 10px 0;
    }
    .flex-sort-box {
      padding: 0 10px;
      display: flex;
      flex-wrap: wrap;
      height: auto;
      column-gap: 4px;
      row-gap: 4px;
    }
  }
  .sortbtn {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px 20px!important;
    box-sizing: border-box;
    height: 100%;
    width: 20%; 
    font-size: 0.9rem;
    font-weight: 900;
    position: relative;
    background: linear-gradient(90deg, #4fbfd0, #46b4c5);
  }
  @media (max-width: 768px) {
    .sortbtn {
      padding: 10px!important;
      width: 49.4%;
      border-radius: 4px;
    }
    .sortbtn.sorttitle, .sortbtn#sort6 {
      display: none;
    }
  }
  .sortbtn small {
    display: inline-block;
    padding: 0 3px;
    font-size: 0.6rem;
    margin-left: 2px;
  }
  .sortbtn.sortrate:after,
  .sortbtn.sortprice:after,
  .sortbtn.sortreguprice:after,
  .sortbtn.sortvolume:after{
    content: "";
    position: absolute;
    top: 50%;
    right: 8px;
    transform: translateY(-50%);
    background-image: url(https://bi-navi.com/w/wp-content/themes/nyusan/img/sort-icon.svg);
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
    width: 18px;
    height: 30px;
  }
  .flex-detail-box {
    -webkit-display: grid;
    display: grid;
    margin-bottom: 10px;
    padding: 16px 0;
    grid-template-columns: 1fr 5fr;
    border-bottom: 1px solid #eee;
  }
  @media (max-width: 768px) {
    .flex-detail-box {
      display: flex;
      flex-direction: column;
      border: 1px solid #eee;
      width: 95%;
    }
    .flex-detail-box:not(:first-child) {
      margin: 40px auto;
    }
  }
  .right-detail-box .right-flex {
    -webkit-display: grid;
    display: grid;
    height: 70px;
    grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
  }
  .right-detail-box .right-flex .center {
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
  @media (max-width: 768px) {
    .right-detail-box {
      display: none;
    }
  }
  .flex-detail-box div a img {
    width: 110px;
  }
  .detail-img {
    padding: 4px 8px;
  }
  .detail-img .img-link {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    color: #444;
    font-size: 15px;
  }
  .detail-img .img-link img {
    display: block;
    margin-bottom: 6px;
  }
  .detail-img .img-link a span {
    padding: 8px 0;
    font-weight: bold;
  }
  @media (max-width: 768px) {
    .flex-detail-box div a img {
      width: 150px;
    }
    .flex-detail-box .detail-title a {
      display: block;
      text-decoration: none;
      padding: 0 20px;
      color: tomato;
      line-height: 1.3;
    }
    .detail-img {
      padding: 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .detail-img .img-link {
      display: flex;
      flex-direction: column;
      font-size: 1.3rem;
      font-weight: bold;
      color: #f06d3d;
      text-decoration: none;
      row-gap: 10px;
    }
    .detail-img a img {
      order: 2;
    }
  }
  .detail-osusume img {
    width: 100px;
    min-width: 100px;
    max-width: 90%;
  }
  .detail-osusume p {
    margin-top: 10px;
    font-size: 1.2rem;
    font-weight: 700;
    color: #333;
  }
  .detail-njenre span {
    font-size: 13px;
    padding: 4px 8px;
  }
  .detail-link-btn a {
    font-size: 15px;
    font-weight: bold;
    display: block;
    padding: 8px;
    border:2px solid #397cb7;
    background: linear-gradient(180deg, #67abe7, #288ae1);
    color: white;
    border-radius: 8px;
    box-shadow: 0 5px 0 0 #0c5ea9;
  }
  .detail-comment {
    display: flex;
    flex-direction: column;
    margin-top: 20px;
  }
  .detail-comment p {
    color: #e71d1d;
    font-size: 1rem;
    padding: 8px 0 8px 30px;
  }
  @media (max-width: 768px) {
    .detail-comment { 
      margin-top: 10px;
    }
    .detail-comment p {
      padding: 8px;
    }
    .bottom-detail-box {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }
    .bottom-detail-box .center {
      width: 47%;
      padding: 2px;
      line-height: 1.2;
      text-align: center;
      border: 1px solid #eee;
    }
    .bottom-detail-box .detail-njenre {
      width: 96%;
    }
    .bottom-detail-box .center h3 {
      font-size: 1rem;
      padding: 8px 0;
      background-color: #eee;
    }
    .bottom-detail-box .center p, 
    .bottom-detail-box .center span {
      font-size: 0.9rem;
      padding: 8px 0;
    }
    .bottom-detail-box .center span {
      display: inline-block;
      margin-right: 4px;
    }
    .detail-link-btn {
      text-align: center;
      width: 80%;
      margin: 20px auto;
    }
    .detail-link-btn a {
      font-size: 20px;
      padding: 14px;
    }
  }


</style>
<div class="flex-sort-box">
  <div id="sort1" class="sortbtn sorttitle">商品名</div>
  <div id="sort2" class="sortbtn sortrate">おすすめ度</div>
  <div id="sort3" class="sortbtn sortprice">初回価格<small>(税込)</small></div>
  <div id="sort4" class="sortbtn sortreguprice">定期価格<small>(税込)</small></i></div>
  <div id="sort5" class="sortbtn sortvolume">サプリタイプ</div>
  <div id="sort6" class="sortbtn">公式サイト</div>
</div>

<?php else : ?>
<div class="sortbox">
  <div class="sortname pc">商品名</div>
  <div id="sort1" class="sortrate">おすすめ度<img
      src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/sortbutton.png" width="11" class="middle pc"><img
      src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/sortbutton2.png" width="11" class="middle sp">
  </div>
  <div id="sort2" class="sortprice">初回価格<br><span class="pc">(税込)</span> <img
      src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/sortbutton.png" width="11" class="middle pc"><img
      src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/sortbutton2.png" width="11" class="middle sp">
  </div>
  <div id="sort6" class="sortreguprice">定期価格<br><span class="pc">(税込)</span> <img
      src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/sortbutton.png" width="11" class="middle pc"><img
      src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/sortbutton2.png" width="11" class="middle sp">
  </div>
  <div id="sort3" class="sortspecialprice">1日あたりの<br>価格<span class="pc">(税込)</span> <img
      src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/sortbutton.png" width="11" class="middle pc"><img
      src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/sortbutton2.png" width="11" class="middle sp">
  </div>
  <p style="clear:both" class="pc"></p>
  <div id="sort4" class="sortonday">実感できるまで
    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/sortbutton.png" width="11" class="middle pc">
    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/sortbutton2.png" width="11" class="middle sp">
  </div>
  <div id="sort5" class="sortvolume pc">サプリタイプ<img
      src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/sortbutton.png" width="11" class="middle pc"><img
      src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/sortbutton2.png" width="11" class="middle sp">
  </div>
  <div style="clear:both" class="pc"></div>
</div>
<?php endif; ?>

<script>
  jQuery(".sortrate").on('click', function() {
    jQuery("#sort_form1").submit();
  })
  jQuery(".sortprice").click(function() {
    jQuery("#sort_form2").submit();
  })
  jQuery(".sortspecialprice").click(function() {
    jQuery("#sort_form3").submit();
  })
  jQuery(".sortreguprice").click(function() {
    jQuery("#sort_form6").submit();
  })
  jQuery(".sortonday").click(function() {
    jQuery("#sort_form4").submit();
  })
  jQuery(".sortvolume").click(function() {
    jQuery("#sort_form5").submit();
  })
</script>


<?php $i = 0;if($query->have_posts()): ?>
<?php while ($query->have_posts()) : $query->the_post(); $i++;
  $image_id = get_post_thumbnail_id ();
  $image_url = wp_get_attachment_image_src ($image_id, true);
  $price = number_format((int)get_field('price'));
  $regularly = number_format((int)get_field('regularly'));
  $onedayprice = number_format((int)get_field('onedayprice'));
  $contv = get_field('contv');
  $copy = get_field('copy');
  $jenre = get_field('jenre');
  $jenre2 = get_field('jenre2');
  $coolingoff = get_field('coolingoff');
  $url = get_field('url');
  $ex = get_field('ex');
  $rank = get_field('rank');
  $osusume = get_field('osusume');
  $kodawari = get_field('kodawari');
  $njenre = get_field('njenre');
?>

<?php if(strpos($url,"bouhu")) : ?>
  <?php continue; ?>
<?php elseif($post->ID == 369 || $post->ID == 1190 || $post->ID == 1287 || $post->ID == 1543 || $post->ID == 1553 || $post->ID == 1555 || $post->ID == 1059 || $post->ID == 1061 || $post->ID == 1391) : ?>
  <?php continue; ?>
<?php else : ?>
  <?php if($_GET['option'] == "new") : ?>
    <div class="flex-detail-box">
      <?php if(is_mobile()) : ?>
      <div class="detail-title">
      <a href="https://bi-navi.com<?php echo $url; ?><?php echo $query2; ?>" target="_blank">
        <h2><?php the_title(); ?></h2>
        </a>
      </div>
      <?php endif; ?>
      <div class="detail-img">
        <a class="img-link" href="https://bi-navi.com<?php echo $url; ?><?php echo $query2; ?>" target="_blank">
          <img src="<?php echo $image_url[0]; ?>" width="100%">
          <?php if(!is_mobile()) : ?>
          <span class="pc"><?php the_title(); ?></span>
          <?php endif; ?>
        </a>

        <?php if(is_mobile()) : ?>
          <div class="detail-osusume center">
            <?php 
              if($osusume >= 4.7) {
                echo "<img src='https://bi-navi.com/img/review_5.gif' />";
              } elseif($osusume <= 4.7 && $osusume >= 4.2) {
                echo "<img src='https://bi-navi.com/img/review_45.gif' />";
              } elseif($osusume <= 4.2 && $osusume >= 3.7) {
                echo "<img src='https://bi-navi.com/img/review_4.gif' />";
              } elseif($osusume <= 3.7 && $osusume >= 3.3) {
                echo "<img src='https://bi-navi.com/img/review_35.gif' />";
              } else {
                echo "<img src='https://bi-navi.com/img/review_3.gif' />";
              }
            ?>

            <p>
              <?php if($osusume == 4) {
                echo "(4.0 / 5.0)";
                } elseif($osusume == 3) {
                  echo "(3.0 / 5.0)";
                } else {
                  echo "(".round($osusume, 1)." / 5.0)";
                }
              ?></p>
          </div>
        <?php endif; ?>
      </div>

      <!-- PC -->
      <?php if(!is_mobile()) : ?>
      <div class="right-detail-box">
        <div class="right-flex">
          <div class="detail-osusume center">
            <?php 
              if($osusume >= 4.7) {
                echo "<img src='https://bi-navi.com/img/review_5.gif' />";
              } elseif($osusume <= 4.7 && $osusume >= 4.2) {
                echo "<img src='https://bi-navi.com/img/review_45.gif' />";
              } elseif($osusume <= 4.2 && $osusume >= 3.7) {
                echo "<img src='https://bi-navi.com/img/review_4.gif' />";
              } elseif($osusume <= 3.7 && $osusume >= 3.3) {
                echo "<img src='https://bi-navi.com/img/review_35.gif' />";
              } else {
                echo "<img src='https://bi-navi.com/img/review_3.gif' />";
              }
            ?>

            <p>
              <?php if($osusume == 4) {
                echo "(4.0 / 5.0)";
                } elseif($osusume == 3) {
                  echo "(3.0 / 5.0)";
                } else {
                  echo "(".round($osusume, 1)." / 5.0)";
                }
              ?></p>
          </div>
          <div class="detail-s-price center">
            <?php echo "￥".$price; ?>
          </div>
          <div class="detail-t-price center">
            <?php echo "￥".$regularly; ?>
          </div>
          <div class="detail-njenre center">
            <?php 
              if(is_array($njenre)) {
                foreach($njenre as $val) {
                  echo "<span>".$val."</span>";
                }
              } else {
                echo "<span>".$njenre."</span>";
              }
              ?>
          </div>
          <div class="detail-link-btn center">
            <a href="https://bi-navi.com<?php echo $url; ?><?php echo $query2; ?>"
              target="_blank">公式サイトを見る
            </a>
          </div>
        </div>
        <?php if(!empty($copy)) : ?>
        <div class="detail-comment">
          <p><?php echo $copy; ?></p>
        </div>
        <?php endif; ?>
      </div>

      <!-- SP -->
      <?php else : ?>
      <div class="bottom-detail-box sp">
        <div class="detail-s-price center">
          <h3>初回価格</h3>
          <p><?php echo "￥".$price; ?></p>
        </div>
        <div class="detail-t-price center">
          <h3>定期価格</h3>
          <p><?php echo "￥".$regularly; ?></p>
        </div>
        <div class="detail-njenre center">
          <h3>サプリタイプ</h3>
          <?php 
            if(is_array($njenre)) {
              foreach($njenre as $val) {
                echo "<span>".$val."</span>";
              }
            } else {
              echo "<span>".$njenre."</span>";
            }
            ?>
        </div>
      </div>

      <?php if(!empty($copy)) : ?>
      <div class="detail-comment">
        <p><?php echo $copy; ?></p>
      </div>
      <?php endif; ?>
      <div class="detail-link-btn center">
        <a href="https://bi-navi.com<?php echo $url; ?><?php echo $query2; ?>"
          target="_blank">公式サイトを見る
        </a>
      </div>
      <?php endif; ?>
      
    </div>
   
  <?php else : ?>
    <div class="detailbox">
      <div class="sp detailnamesp"><a href="https://bi-navi.com<?php echo $url; ?><?php echo $query2; ?>"
          target="_blank"><span><?php the_title(); ?></span></a></div>
      <div class="detailimg"><img src="<?php echo $image_url[0]; ?>" width="100%"><br class="pc"><a class="pc"
          target="_blank" href="https://bi-navi.com<?php echo $url; ?><?php echo $query2; ?>"><?php the_title(); ?></a>
      </div>
      <div class="sp detailnameex">
        <div class="detailrate">
          <!-- <p class="rankno<?php echo $rank; ?>"><span><?php echo $rank; ?></span>位</p> -->
          <p class="ratesp<?php echo $i; ?> marbo0"><span></span></p>
          <p style="color:#000;font-style:normal;font-weight:normal;">(<?php echo $ex; ?> / 5.0)</p>
        </div>
      </div>
      <div class="sp" style="clear:both"></div>
      <div class="detail">
        <div class="detailrate pc">
          <!-- <p class="rankno<?php echo $i; ?>"><span><?php echo $i; ?></span>位</p> -->
          <p class="ratesp<?php echo $i; ?>"><span></span></p>
          <p style="color:#000;font-style:normal;font-weight:normal;">(<?php echo $ex; ?> / 5.0)</p>
        </div>
      
        <div class="detailprice">
          <div class="sp dtitle2">初回価格</div>￥<?php echo $price; ?>
        </div>
        <div class="detailreguprice">
          <div class="sp dtitle2">定期価格</div>￥<?php echo $regularly; ?>
        </div>
        
        <div class="detailonedayprice">
          <div class="sp dtitle2">1日あたりの<br>価格(税込)</div>￥<?php echo $onedayprice; ?>
        </div>
        <div class="detailspecialprice">
          <div class="sp dtitle2">実感できるまで</div><?php if(is_array($jenre2)){
              foreach($jenre2 as $value){
              echo $value;
              } 
          }else{ 
          echo $jenre2;
          } ?>
        </div>
        <div class="detailvolume">
          <div class="sp dtitle2">サプリタイプ</div><?php if(is_array($jenre)){
              foreach($jenre as $value){
              echo $value.",";
              } 
          }else{ 
          echo $jenre;
          } ?>
        </div>
      
        <div class="detailurl pc"><a href="https://bi-navi.com<?php echo $url; ?><?php echo $query2; ?>"
            target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/searchlinkbutton.png"
              width="100%"></a></div>
        <p style="clear:both"></p>
        <div class="detailcomment">
          <p style="border-bottom:1px solid #ccc;padding:0 0 5px;margin:0 0 5px;"><?php echo $copy; ?></p>
          <?php the_content(); ?>
        </div>
        <div class="detailurl sp"><a href="https://bi-navi.com<?php echo $url; ?><?php echo $query2; ?>"
            target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/spsearchlinkbutton.png"
              width="100%"></a></div>
      </div>
      <!--detail-->

      <p style="clear:both"></p>
    </div>
<?php endif; ?>
<!--detailbox-->

<style>
.ratesp<?php echo $i;

?> {
  padding: 0 !important;
  width: 86px;
  height: 19px;
  margin: 0px auto 0;
  background: url(<?php print get_template_directory_uri();
  ?>/img/off.png) no-repeat;
  background-size: contain;
}

.ratesp<?php echo $i;

?>span {
  display: block;
  width: <?php echo $ex*20;
  ?>%;
  height: 19px;
  background: url(<?php print get_template_directory_uri();
  ?>/img/on.png) no-repeat;
}
</style>

<?php endif; ?>
<?php endwhile; endif; wp_reset_query(); ?>



<?php get_footer(); ?>