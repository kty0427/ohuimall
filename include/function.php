<?
	// 상품정보 (idx)
	function OM_GetGoodsInfo($idx)
	{
		global $_gl;
		global $my_db;

		$query 		= "SELECT * FROM ".$_gl['goods_info_table']." WHERE idx='".$idx."'";
		$result 	= mysqli_query($my_db, $query);
		$info		= mysqli_fetch_array($result);

		return $info;
	}

	// 구매자 정보 입력
	function InsertBuyerInfo($idx)
	{
		global $_gl;
		global $my_db;

		$query 		= "INSERT INTO ".$_gl['buyer_info_table']."(buyer_ipaddr,buyer_goods,buyer_date) values ('".$_SERVER['REMOTE_ADDR']."','".$idx."',now())";
		$result 	= mysqli_query($my_db, $query);

		return $result;
	}

	// 유입매체 정보 입력
	function OM_InsertTrackingInfo($media, $gubun)
	{
		global $_gl;
		global $my_db;

		$query		= "INSERT INTO ".$_gl['tracking_info_table']."(tracking_media, tracking_ipaddr, tracking_date, tracking_gubun) values('".$media."','".$_SERVER['REMOTE_ADDR']."',now(),'".$gubun."')";
		$result		= mysqli_query($my_db, $query);
	}

	// 오늘 당첨 인원 
	function OM_TodayBuyCnt()
	{
		global $_gl;
		global $my_db;

		$query 		= "SELECT * FROM ".$_gl['buyer_info_table']." WHERE buyer_date like '%".date('Y-m-d')."%'";
		$result 	= mysqli_query($my_db, $query);
		$info		= mysqli_num_rows($result);

		return $info;
	}

	function OM_TodayWinnerYN()
	{
		global $_gl;
		global $my_db;

		$query 		= "SELECT * FROM ".$_gl['winner_info_table']." WHERE winner_date like '%".date('Y-m-d')."%'";
		$result 	= mysqli_query($my_db, $query);
		$info		= mysqli_num_rows($result);

	}

	// 당첨자 체크 로직
	function OM_WinCheck($idx)
	{
		global $_gl;
		global $my_db;

		$chkwin = "N";
		// 하루에 10명 당첨

		// 당일 당첨자 수 조회
		$today_cnt = OM_TodayBuyCnt();
		$winner_array = array(1,10,35,80,112,145,175,200,230,280);

		foreach ($winner_array as $key => $val)
		{
			if ($today_cnt == $val)
			{
				$chkwin = "Y";
			}
		}

		$winner_add_array = array(320,350,380,410,440,470,500,530,560,590,620,650,680);
		if ($today_cnt > 280)
		{
			$today_winner = OM_TodayWinnerYN();
			if ($today_winner < 10)
			{
				foreach ($winner_add_array as $key2 => $val2)
				{
					if ($today_cnt == $val2)
					{
						$chkwin = "Y";
					}
				}
			}
		}

		return $chkwin;

	}

?>