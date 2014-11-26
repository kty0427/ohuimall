<?
	$goods_idx	= $_REQUEST['goods_idx'];

	// 설정파일
	include_once "../config.php";
  	include_once "header.php";

	$goods_idx		= $_REQUEST['goods_idx'];
	$winner_phone	= $_REQUEST['phone'];
	$goods_info		= OM_GetGoodsInfo($goods_idx);
	$winner_info	= OM_GetWinnerInfo($winner_phone);
	$order_date		= substr($winner_info['winner_date'],0,10);
	$order_array	= explode("-",$order_date);
?>
    <div class="content buy_comp">
      <div class="title">
        <h2><img src="images/pop_title_ship.jpg" width="180"alt=""/></h2>
        <p class="sub">주문하신 어려지는 마음은<br>
        [<?=$goods_info['goods_name']?>] 입니다.</p>
      </div> 
      <div class="product_img">
        <img src="images/buy_comp_product_<?=$goods_idx?>.jpg" alt="" border="0"/> 
      </div>
      <div class="info_detail d1">
        <h3><img src="images/title_buy_comp_detail.jpg" width="94" /></h3>
        <ul>
          <li>주문일자 :  <?=$order_array[0]?>년 <?=$order_array[1]?>월 <?=$order_array[2]?>일</li>
          <li>유효기간 :  2015년 3월 1일</li>
          <li>가      격 :  0 원 </li>
        </ul>
      </div>
      <div class="info_detail d2">
        배송은 12월 20일 이후 일괄 발송되며 문의는<br>  
        ju.lee@minivertising.kr 또는 070-4888-3580로 해주세요!
      </div>
      <div class="btn_block">
        <a href="index.php"><img src="images/btn_go_main.jpg" width="115" alt=""/></a>
      </div>
    </div>
<?
	include_once "footer.php";
?>