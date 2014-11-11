<?php
  	include_once "../config.php";
?>
<html>
  <head>
    <title>내일을부탁해 - 드림풀 매칭그랜트 캠페인</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0"/>
    <link href="../lib/owl/owl.carousel.css" rel="stylesheet">
    <link href="../lib/owl/owl.theme.css" rel="stylesheet">
    <script type='text/javascript' src='../js/jquery-1.11.0.min.js'></script>
    <script type="text/javascript" src="http://www.youtube.com/player_api"></script>
    <script src="../lib/owl/owl.carousel.js"></script>
  </head>
  <body>
    <div>
      <h3>마음을 파는 쇼핑몰</h3>
      <h1>오늘을 가장 어리게</h1>
      <h4>Introduce / Mall / FAQ</h4>
    </div>
    <h1>--------------------------------</h1>
    <div>
      <h4>어리게 산다는 것</h4>
      <div class="youtubebox">
        <iframe id="ytplayer" width="100%" src="<?=$_gl['youtube_url']?>" frameborder="0" allowfullscreen></iframe>
      </div>
      <div>
        <div class="customNavigation">
          <a class="btn prev" style="float:left; width:5%;"><img src="./images/btn_prev.png" style="width:100%; margin-top:100%;"></a>
        </div>
        <div id="owl-demo" class="owl-carousel" style="float:left">
<?php
$query 		= "SELECT * FROM ".$_gl['goods_info_table']." ";
$result 	= mysqli_query($my_db, $query);
while($data = mysqli_fetch_array($result))
{
?>
        <div class="item" onclick="javascript:location.href='goods_detail.php?goods_idx=<?=$data['idx']?>'" style="cursor:pointer"><img src="<?php echo $data['goods_imgurl']?>" alt="Owl Image"><p><?php echo $data['goods_name']?></p><p><?php echo $data['goods_detail']?></p></div>
<?php
}
?>
        </div>
        <div class="customNavigation">
          <a class="btn next" style="float:right; width:5%;"><img src="./images/btn_next.png" style="width:100%; margin-top:100%; align:right;"></a>
        <div>
      </div>
    </div>
  </body>
  </html>

    <style>
    #owl-demo .item{
        margin: 3px;
    }
    
    #owl-demo {
        width:90%;
    }
    #owl-demo .item img{
        display: block;
        width: 100%;
        height: auto;
    }
    </style>

    <script type='text/javascript'>
    // 이미지 슬라이드
    $(document).ready(function() {
      var owl = $("#owl-demo");
      
      $("#owl-demo").owlCarousel({
        autoPlay: 3000,
        items : 4,
        itemsDesktop : [1000,5], //5 items between 1000px and 901px
        itemsDesktopSmall : [900,3], // betweem 900px and 601px
        itemsTablet: [600,2], //2 items between 600 and 0
        itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
      });	
      
      $(".next").click(function(){
        owl.trigger('owl.next');
      })
      $(".prev").click(function(){
        owl.trigger('owl.prev');
      })
    });
  
  
    // 유튜브 반복 재생
    var controllable_player,start, 
    statechange = function(e){
    	if(e.data === 0){controllable_player.seekTo(0); controllable_player.playVideo()}

    };
    function onYouTubeIframeAPIReady() {
    controllable_player = new YT.Player('ytplayer', {events: {'onStateChange': statechange}}); 
    }

    if(window.opera){
    addEventListener('load', onYouTubeIframeAPIReady, false);
    }
    setTimeout(function(){
    	if (typeof(controllable_player) == 'undefined'){
    		onYouTubeIframeAPIReady();
    	}
    }, 3000)

    $(window).resize(function(){
    	var width = $(window).width();
    	//var height = $(window).height();

    	var youtube_height = (width / 16) * 9;
    	$("#ytplayer").height(youtube_height);
    });
    </script>