<?php
	include_once "../config.php";
	include_once "header.php";

	$goods_idx	= $_REQUEST['goods_idx'];

	$goods_info = OM_GetGoodsInfo($goods_idx);

?>
    <div class="content g_960">       
      <div class="product_buy_end">
        <img src="images/buy_end_product_img_1.jpg" width="959" height="493" alt=""/>
      </div>
      <div class="txt_ship">
        <p><img src="images/txt_shipping.jpg" width="303" height="33" alt=""/></p>
        <p>주문하신 어려지는 마음은<br>[처음 꽃을  선물받을 때 마음] 입니다.</p>
      </div>
      <div class="buy_detail">
        <div class="txt_data">
          <p><img src="images/title_buy_detail_info.jpg" width="166" height="28" alt=""/></p>
          <ul>
            <li>주문일자 : 2014년 12월 1일 </li>
            <li>유효기간 : 2015년 3월 1일  </li>
            <li>가격 : 0 원  </li>
          </ul>
        </div>
        <div class="txt_guide">* 배송은 12월 20일 이후 일괄 발송되며 문의는 ju.lee@minivertising.kr 또는 070-4888-3580로 해주세요!</div>
      </div>
    </div>
<?
	include_once "footer.php";
?>