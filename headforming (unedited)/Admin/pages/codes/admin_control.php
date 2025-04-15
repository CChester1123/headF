<?php
	date_default_timezone_set('Asia/Manila');
	$date=date("Y-m-d H:i:s");
	require_once'function.php';

	$insertdata=new admin_creation();
	$approved_by = $_SESSION['name'];

 	$pick=urldecode($_POST['pick']);
 	// $pick = "9";

	if($pick == 0 ||$pick == "0" ||$pick=='0' ){
		$name = htmlentities(htmlspecialchars(urldecode($_POST['name']))) ;
		$sql=$insertdata->logout($name);
		if($sql) {
			echo "1";
		} else {
			echo "0";
		}
	
	} else if($pick == 1 ||$pick == "1" ||$pick=='1' ) {	//Login
	    $emp_id = htmlentities(htmlspecialchars(urldecode($_POST['uname'])));
	    $password = htmlentities(htmlspecialchars(urldecode($_POST['upass'])));
		$login = $insertdata->check_login($emp_id, $password, $account);

	    if ($login) {
	        header('location:../dashboard');
	    } else {
	        echo '0';
	    }

	} else if($pick == 2 ||$pick == "2" ||$pick=='2' ){
		$oldpassword = htmlentities(htmlspecialchars(urldecode($_POST['oldPass'])));
	    $newpassword = htmlentities(htmlspecialchars(urldecode($_POST['newPass'])));
	    $employID = htmlentities(htmlspecialchars(urldecode($_POST['employID'])));
		$sql = $insertdata->updatePassword($oldpassword, $newpassword, $employID);
		if($sql) {
			echo $sql;
		} else {
			echo "0";
		}

	}  else if($pick == 3 ||$pick == "3" ||$pick=='3' ){
		$emp_id = htmlentities(htmlspecialchars(urldecode($_POST['emp_id'])));
	    $name = htmlentities(htmlspecialchars(urldecode($_POST['name'])));
	    $account = htmlentities(htmlspecialchars(urldecode($_POST['account'])));
	    	    $password = "Texwipe2024!";
		echo $sql = $insertdata->createAdminAccount($emp_id, $name, $account,$password);
	} 


	else if($pick == 6 ||$pick == "6" ||$pick=='6' ){


		$product = htmlentities(htmlspecialchars(urldecode($_POST['product'])));
		$productDesc = htmlentities(htmlspecialchars(urldecode($_POST['productDesc'])));
		$handle = htmlentities(htmlspecialchars(urldecode($_POST['handle'])));
		$subtrate = htmlentities(htmlspecialchars(urldecode($_POST['subtrate'])));
		$status = htmlentities(htmlspecialchars(urldecode($_POST['status'])));		

		$arrcuttingforce = htmlentities(htmlspecialchars(urldecode($_POST['arrcuttingforce'])));
		$arrsealingtime = htmlentities(htmlspecialchars(urldecode($_POST['arrsealingtime'])));
		$arrcuttingspeed = htmlentities(htmlspecialchars(urldecode($_POST['arrcuttingspeed'])));
		$arrapproachingposition = htmlentities(htmlspecialchars(urldecode($_POST['arrapproachingposition'])));
		$arrsealingpositionspeed = htmlentities(htmlspecialchars(urldecode($_POST['arrsealingpositionspeed'])));
		$arrsealingposition = htmlentities(htmlspecialchars(urldecode($_POST['arrsealingposition'])));
		$arrCheckbox = htmlentities(htmlspecialchars(urldecode($_POST['arrCheckbox'])));
		$moldopenspeed = htmlentities(htmlspecialchars(urldecode($_POST['moldopenspeed'])));
		$arrwatertemp = htmlentities(htmlspecialchars(urldecode($_POST['arrwatertemp'])));
		$arrairpressure = htmlentities(htmlspecialchars(urldecode($_POST['arrairpressure'])));
		$arrupperheatertemp = htmlentities(htmlspecialchars(urldecode($_POST['arrupperheatertemp'])));
		$arrlowerheatertemp = htmlentities(htmlspecialchars(urldecode($_POST['arrlowerheatertemp'])));
		$arruppermoldtemp = htmlentities(htmlspecialchars(urldecode($_POST['arruppermoldtemp'])));
		$arrlowermoldtemp = htmlentities(htmlspecialchars(urldecode($_POST['arrlowermoldtemp'])));		

		$arrtotalLength = htmlentities(htmlspecialchars(urldecode($_POST['arrtotalLength'])));
		$arrswabheadlength = htmlentities(htmlspecialchars(urldecode($_POST['arrswabheadlength'])));
		$arrswabheadwidth = htmlentities(htmlspecialchars(urldecode($_POST['arrswabheadwidth'])));
		$arrswabheadthickness = htmlentities(htmlspecialchars(urldecode($_POST['arrswabheadthickness'])));
		$arrswabhandlewidth = htmlentities(htmlspecialchars(urldecode($_POST['arrswabhandlewidth'])));
		$arrswabhandlethickness = htmlentities(htmlspecialchars(urldecode($_POST['arrswabhandlethickness'])));
		$arrswabhandlediameter = htmlentities(htmlspecialchars(urldecode($_POST['arrswabhandlediameter'])));		

		$noHandleperHT = htmlentities(htmlspecialchars(urldecode($_POST['noHandleperHT'])));
		$arrpulltest = htmlentities(htmlspecialchars(urldecode($_POST['arrpulltest'])));
		$arrswabheadpulling = htmlentities(htmlspecialchars(urldecode($_POST['arrswabheadpulling'])));
		$arrswabheadpopping = htmlentities(htmlspecialchars(urldecode($_POST['arrswabheadpopping'])));

		$pulltestdesc = htmlentities(htmlspecialchars(urldecode($_POST['pulltestdesc'])));

		$substrateDimensionforce = htmlentities(htmlspecialchars(urldecode($_POST['substrateDimensionforce'])));
		$pullSeatTestforce = htmlentities(htmlspecialchars(urldecode($_POST['pullSeatTestforce'])));


		$handleColor = htmlentities(htmlspecialchars(urldecode($_POST['handleColor'])));
		$substrateLotNum = htmlentities(htmlspecialchars(urldecode($_POST['substrateLotNum'])));
		$handleTreeMaterialNum = htmlentities(htmlspecialchars(urldecode($_POST['handleTreeMaterialNum'])));
		$machineTreeMatType = htmlentities(htmlspecialchars(urldecode($_POST['machineTreeMatType'])));
		$substrateType = htmlentities(htmlspecialchars(urldecode($_POST['substrateType'])));

		$cuttingforces = explode(",", $arrcuttingforce);
		$sealingtime = explode(",", $arrsealingtime);	
		$cuttingspeed = explode(",", $arrcuttingspeed);
		$approachingposition = explode(",", $arrapproachingposition);	
		$sealingpositionspeed = explode(",", $arrsealingpositionspeed);
		$sealingposition = explode(",", $arrsealingposition);	
		$arrmoldopenspeed = explode(",", $moldopenspeed);	
		$watertemp = explode(",", $arrwatertemp);
		$airpressure = explode(",", $arrairpressure);	
		$upperheatertemp = explode(",", $arrupperheatertemp);
		$lowerheatertemp = explode(",", $arrlowerheatertemp);	
	
			echo $sql = $insertdata->createProduct($product,$productDesc,$handle,$subtrate,$status,$arrcuttingforce,$arrsealingtime,$arrcuttingspeed,$arrapproachingposition,$arrsealingpositionspeed,$arrsealingposition,$arrCheckbox,$moldopenspeed,$arrwatertemp,$arrairpressure,$arrupperheatertemp,$arrlowerheatertemp,$arruppermoldtemp,$arrlowermoldtemp,$arrtotalLength,$arrswabheadlength,$arrswabheadwidth,$arrswabheadthickness,$arrswabhandlewidth,$arrswabhandlethickness,$arrswabhandlediameter,$noHandleperHT,$arrpulltest,$arrswabheadpulling,$arrswabheadpopping,$pulltestdesc,$substrateDimensionforce,$pullSeatTestforce,$handleColor,$substrateLotNum,$handleTreeMaterialNum,$machineTreeMatType,$substrateType);
	
	} 
	else if($pick == 7 ||$pick == "7" ||$pick=='7' ){
		$prod_id = htmlentities(htmlspecialchars(urldecode($_POST['prod_id'])));
		$product = htmlentities(htmlspecialchars(urldecode($_POST['product'])));
		$productDesc = htmlentities(htmlspecialchars(urldecode($_POST['productDesc'])));
		$handle = htmlentities(htmlspecialchars(urldecode($_POST['handle'])));
		$subtrate = htmlentities(htmlspecialchars(urldecode($_POST['subtrate'])));
		$status = htmlentities(htmlspecialchars(urldecode($_POST['status'])));		

		$arrcuttingforce = htmlentities(htmlspecialchars(urldecode($_POST['arrcuttingforce'])));
		$arrsealingtime = htmlentities(htmlspecialchars(urldecode($_POST['arrsealingtime'])));
		$arrcuttingspeed = htmlentities(htmlspecialchars(urldecode($_POST['arrcuttingspeed'])));
		$arrapproachingposition = htmlentities(htmlspecialchars(urldecode($_POST['arrapproachingposition'])));
		$arrsealingpositionspeed = htmlentities(htmlspecialchars(urldecode($_POST['arrsealingpositionspeed'])));
		$arrsealingposition = htmlentities(htmlspecialchars(urldecode($_POST['arrsealingposition'])));
		$arrCheckbox = htmlentities(htmlspecialchars(urldecode($_POST['arrCheckbox'])));
		$moldopenspeed = htmlentities(htmlspecialchars(urldecode($_POST['moldopenspeed'])));
		$arrwatertemp = htmlentities(htmlspecialchars(urldecode($_POST['arrwatertemp'])));
		$arrairpressure = htmlentities(htmlspecialchars(urldecode($_POST['arrairpressure'])));
		$arrupperheatertemp = htmlentities(htmlspecialchars(urldecode($_POST['arrupperheatertemp'])));
		$arrlowerheatertemp = htmlentities(htmlspecialchars(urldecode($_POST['arrlowerheatertemp'])));
		$arruppermoldtemp = htmlentities(htmlspecialchars(urldecode($_POST['arruppermoldtemp'])));
		$arrlowermoldtemp = htmlentities(htmlspecialchars(urldecode($_POST['arrlowermoldtemp'])));		

		$arrtotalLength = htmlentities(htmlspecialchars(urldecode($_POST['arrtotalLength'])));
		$arrswabheadlength = htmlentities(htmlspecialchars(urldecode($_POST['arrswabheadlength'])));
		$arrswabheadwidth = htmlentities(htmlspecialchars(urldecode($_POST['arrswabheadwidth'])));
		$arrswabheadthickness = htmlentities(htmlspecialchars(urldecode($_POST['arrswabheadthickness'])));
		$arrswabhandlewidth = htmlentities(htmlspecialchars(urldecode($_POST['arrswabhandlewidth'])));
		$arrswabhandlethickness = htmlentities(htmlspecialchars(urldecode($_POST['arrswabhandlethickness'])));
		$arrswabhandlediameter = htmlentities(htmlspecialchars(urldecode($_POST['arrswabhandlediameter'])));		

		$noHandleperHT = htmlentities(htmlspecialchars(urldecode($_POST['noHandleperHT'])));
		$arrpulltest = htmlentities(htmlspecialchars(urldecode($_POST['arrpulltest'])));
		$arrswabheadpulling = htmlentities(htmlspecialchars(urldecode($_POST['arrswabheadpulling'])));
		$arrswabheadpopping = htmlentities(htmlspecialchars(urldecode($_POST['arrswabheadpopping'])));

		$pulltestdesc = htmlentities(htmlspecialchars(urldecode($_POST['pulltestdesc'])));



		$substrateDimensionforce = htmlentities(htmlspecialchars(urldecode($_POST['substrateDimensionforce'])));
		$pullSeatTestforce = htmlentities(htmlspecialchars(urldecode($_POST['pullSeatTestforce'])));



		$handleColor = htmlentities(htmlspecialchars(urldecode($_POST['handleColor'])));
		$substrateLotNum = htmlentities(htmlspecialchars(urldecode($_POST['substrateLotNum'])));
		$handleTreeMaterialNum = htmlentities(htmlspecialchars(urldecode($_POST['handleTreeMaterialNum'])));
		$machineTreeMatType = htmlentities(htmlspecialchars(urldecode($_POST['machineTreeMatType'])));
		$substrateType = htmlentities(htmlspecialchars(urldecode($_POST['substrateType'])));

		echo $sql = $insertdata->editProduct($prod_id,$product,$productDesc,$handle,$subtrate,$status,$arrcuttingforce,$arrsealingtime,$arrcuttingspeed,$arrapproachingposition,$arrsealingpositionspeed,$arrsealingposition,$arrCheckbox,$moldopenspeed,$arrwatertemp,$arrairpressure,$arrupperheatertemp,$arrlowerheatertemp,$arruppermoldtemp,$arrlowermoldtemp,$arrtotalLength,$arrswabheadlength,$arrswabheadwidth,$arrswabheadthickness,$arrswabhandlewidth,$arrswabhandlethickness,$arrswabhandlediameter,$noHandleperHT,$arrpulltest,$arrswabheadpulling,$arrswabheadpopping,$pulltestdesc,$substrateDimensionforce,$pullSeatTestforce,$handleColor ,$substrateLotNum ,$handleTreeMaterialNum,$machineTreeMatType,$substrateType);
	} 
	else if($pick == 8 ||$pick == "8" ||$pick=='8' ){
		$partNo = htmlentities(htmlspecialchars(urldecode($_POST['partNo'])));
		$sql=$insertdata->selectPartNumber($partNo);
		echo json_encode(array(	'fgDesc'=>$sql['0'],  	'HandleParNo'=>$sql['1'],  	'subtratePartNo'=>$sql['2'], 	'minUpperHeater'=>$sql['3'], 	'maxUpperHeater'=>$sql['4'], 	'minLowerHeater'=>$sql['5'], 	'maxLowerHeater'=>$sql['6'],'minHeatingTime'=>$sql['7'],'maxHeatingTime'=>$sql['8'],'minTimeLag'=>$sql['9'],'maxTimeLag'=>$sql['10'],'minTimeClosing'=>$sql['11'],'maxTimeClosing'=>$sql['12'],'minCuttingForce'=>$sql['13'],'maxCuttingForce'=>$sql['14'],'minSealingForce'=>$sql['15'],'maxSealingForce'=>$sql['16'],'minSealingTime'=>$sql['17'],'maxSealingTime'=>$sql['18'],'minCuttingSpeed'=>$sql['19'],'maxCuttingSpeed'=>$sql['20'],'minApproachingPosition'=>$sql['21'],'maxApproachingPosition'=>$sql['22'],'minSealingPositionSpeed'=>$sql['23'],'maxSealingPositionSpeed'=>$sql['24'],'mode'=>$sql['25'],'minSealingForceMode'=>$sql['26'],'maxSealingForceMode'=>$sql['27'],'minSealingPosition'=>$sql['28'],'maxSealingPosition'=>$sql['29'],'minSealingTimeMode'=>$sql['30'],'maxSealingTimeMode'=>$sql['31'],'minCuttingSpeedMode'=>$sql['32'],'maxCuttingSpeedMode'=>$sql['33'],'minApproachingPositionMode'=>$sql['34'],'maxApproachingPositionMode'=>$sql['35'],'minSealingPositionSpeedMode'=>$sql['36'],'maxSealingPositionSpeedMode'=>$sql['37'],'moldOpenSpeed'=>$sql['38'],'minWaterTemp'=>$sql['39'],'maxWaterTemp'=>$sql['40'],'minAirPressure'=>$sql['41'],'maxAirPressure'=>$sql['42'],'minHeadformingUpperHeaterTemp'=>$sql['43'],'maxHeadformingUpperHeaterTemp'=>$sql['44'],'minHeadformingLowerHeaterTemp'=>$sql['45'],'maxHeadformingLowerHeaterTemp'=>$sql['46'],'minHeadformingUpperMoldTemp'=>$sql['47'],'maxHeadformingUpperMoldTemp'=>$sql['48'],'minHeadformingLowerMoldTemp'=>$sql['49'],'maxHeadformingLowerMoldTemp'=>$sql['50'],'machineRunning'=>$sql['51'],'minHeatingOil'=>$sql['52'],'maxHeatingOil'=>$sql['53'],'minHeatingTank'=>$sql['54'],'maxHeatingTank'=>$sql['55'],'minCoolingWater'=>$sql['56'],'maxCoolingWater'=>$sql['57'],'minTotalLength'=>$sql['58'],'maxTotalLength'=>$sql['59'],'minSwabHeadLength'=>$sql['60'],'maxSwabHeadLength'=>$sql['61'],'minSwabHeadWidth'=>$sql['62'],'maxSwabHeadWidth'=>$sql['63'],'minSwabHeadThickness'=>$sql['64'],'maxSwabHeadThickness'=>$sql['65'],'minSwabHeadWidth2'=>$sql['66'],'maxSwabHeadWidth2'=>$sql['67'],'minSwabHeadThickness2'=>$sql['68'],'maxSwabHeadThickness2'=>$sql['69'],'minSwabHeadDiameter'=>$sql['70'],'maxSwabHeadDiameter'=>$sql['71'],'noHandleperHT'=>$sql['72'],'minPullTest'=>$sql['73'],'maxPullTest'=>$sql['74']
							  ));
	} 
	else if($pick ==9 ||$pick == "9" ||$pick=='9' ){

		$workorder  = htmlentities(htmlspecialchars(urldecode($_POST['workorder'])));
		$date  = htmlentities(htmlspecialchars(urldecode($_POST['date'])));
		$productDesc  = htmlentities(htmlspecialchars(urldecode($_POST['productDesc'])));
		$machineNo  = htmlentities(htmlspecialchars(urldecode($_POST['machineNo'])));
		$product  = htmlentities(htmlspecialchars(urldecode($_POST['product'])));
		$type  = htmlentities(htmlspecialchars(urldecode($_POST['type'])));
		$handle  = htmlentities(htmlspecialchars(urldecode($_POST['handle'])));
		$machinetobeused  = htmlentities(htmlspecialchars(urldecode($_POST['machinetobeused'])));
		$substrate  = htmlentities(htmlspecialchars(urldecode($_POST['substrate'])));
		$operation  = htmlentities(htmlspecialchars(urldecode($_POST['operation'])));
		$maintenance  = htmlentities(htmlspecialchars(urldecode($_POST['maintenance'])));
		$preinstallremarks  = htmlentities(htmlspecialchars(urldecode($_POST['preinstallremarks'])));
		$arrcuttingforce  = htmlentities(htmlspecialchars(urldecode($_POST['arrcuttingforce'])));
		$arrsealingtime  = htmlentities(htmlspecialchars(urldecode($_POST['arrsealingtime'])));
		$arrcuttingspeed  = htmlentities(htmlspecialchars(urldecode($_POST['arrcuttingspeed'])));
		$arrapproachingposition  = htmlentities(htmlspecialchars(urldecode($_POST['arrapproachingposition'])));
		$arrsealingpositionspeed  = htmlentities(htmlspecialchars(urldecode($_POST['arrsealingpositionspeed'])));
		$arrsealingposition  = htmlentities(htmlspecialchars(urldecode($_POST['arrsealingposition'])));
		$arrMode  = htmlentities(htmlspecialchars(urldecode($_POST['arrMode'])));
		$arrmoldopenspeed  = htmlentities(htmlspecialchars(urldecode($_POST['arrmoldopenspeed'])));
		$arrwatertemp  = htmlentities(htmlspecialchars(urldecode($_POST['arrwatertemp'])));
		$arrairpressure  = htmlentities(htmlspecialchars(urldecode($_POST['arrairpressure'])));
		$arrupperheatertemp  = htmlentities(htmlspecialchars(urldecode($_POST['arrupperheatertemp'])));
		$arrlowerheatertemp  = htmlentities(htmlspecialchars(urldecode($_POST['arrlowerheatertemp'])));
		$arruppermoldtemp  = htmlentities(htmlspecialchars(urldecode($_POST['arruppermoldtemp'])));
		$arrlowermoldtemp  = htmlentities(htmlspecialchars(urldecode($_POST['arrlowermoldtemp'])));
		$arrtotalLength  = htmlentities(htmlspecialchars(urldecode($_POST['arrtotalLength'])));
		$arrswabheadlength  = htmlentities(htmlspecialchars(urldecode($_POST['arrswabheadlength'])));
		$arrswabheadwidth  = htmlentities(htmlspecialchars(urldecode($_POST['arrswabheadwidth'])));
		$arrswabheadthickness  = htmlentities(htmlspecialchars(urldecode($_POST['arrswabheadthickness'])));
		$arrswabhandlewidth  = htmlentities(htmlspecialchars(urldecode($_POST['arrswabhandlewidth'])));
		$arrswabhandlethickness  = htmlentities(htmlspecialchars(urldecode($_POST['arrswabhandlethickness'])));
		$arrswabhandlediameter  = htmlentities(htmlspecialchars(urldecode($_POST['arrswabhandlediameter'])));
		$arrpulltest  = htmlentities(htmlspecialchars(urldecode($_POST['arrpulltest'])));
		$noHandleperHT  = htmlentities(htmlspecialchars(urldecode($_POST['noHandleperHT'])));
		$visualInpection  = htmlentities(htmlspecialchars(urldecode($_POST['visualInpection'])));
		$arractualDataLoop  = htmlentities(htmlspecialchars(urldecode($_POST['arractualDataLoop'])));
		$selectedoption= htmlentities(htmlspecialchars(urldecode($_POST['selectedoption'])));
		$shotproductionremarks  = htmlentities(htmlspecialchars(urldecode($_POST['shotproductionremarks'])));
		$InspectedBY  = htmlentities(htmlspecialchars(urldecode($_POST['InspectedBY'])));
		$acknowledge  = htmlentities(htmlspecialchars(urldecode($_POST['acknowledge'])));
		$maintenancecheced   = htmlentities(htmlspecialchars(urldecode($_POST['maintenancecheced'])));
		$status  = htmlentities(htmlspecialchars(urldecode($_POST['status'])));
		$setUpNUmber  = htmlentities(htmlspecialchars(urldecode($_POST['setUpNUmber'])));

		$template  = htmlentities(htmlspecialchars(urldecode($_POST['template'])));
		$trans_num  = htmlentities(htmlspecialchars(urldecode($_POST['trans_num'])));

		$handleColor  = htmlentities(htmlspecialchars(urldecode($_POST['handleColor'])));
		$handleTreeMaterialNum  = htmlentities(htmlspecialchars(urldecode($_POST['handleTreeMaterialNum'])));
		$machineTreeMatType  = htmlentities(htmlspecialchars(urldecode($_POST['machineTreeMatType'])));
		$substrateType  = htmlentities(htmlspecialchars(urldecode($_POST['substrateType'])));
		$substrateDimensionforce  = htmlentities(htmlspecialchars(urldecode($_POST['substrateDimensionforce'])));

		$visualInspection = htmlentities(htmlspecialchars(urldecode($_POST['visualInspectionLoop'])));


		$pullSeatTestforce = htmlentities(htmlspecialchars(urldecode($_POST['pullSeatTestforce'])));

		$substrateLotNum = htmlentities(htmlspecialchars(urldecode($_POST['substrateLotNum'])));


		$pulltestdesc = htmlentities(htmlspecialchars(urldecode($_POST['pulltestdesc'])));
	

	 	echo $sql = $insertdata->createCheckList($workorder ,$date ,$productDesc ,$machineNo ,$product ,$type ,$handle ,$machinetobeused ,$substrate ,$operation ,$maintenance ,$preinstallremarks ,$arrcuttingforce ,$arrsealingtime ,$arrcuttingspeed ,$arrapproachingposition ,$arrsealingpositionspeed ,$arrsealingposition ,$arrMode ,$arrmoldopenspeed ,$arrwatertemp ,$arrairpressure ,$arrupperheatertemp ,$arrlowerheatertemp ,$arruppermoldtemp ,$arrlowermoldtemp ,$arrtotalLength,$arrswabheadlength ,$arrswabheadwidth,$arrswabheadthickness ,$arrswabhandlewidth,$arrswabhandlethickness,$arrswabhandlediameter,$noHandleperHT,$visualInpection,$arractualDataLoop,$selectedoption,$shotproductionremarks,$InspectedBY ,$acknowledge,$maintenancecheced,$status,$arrpulltest,$setUpNUmber,$template, $trans_num, $handleColor,$handleTreeMaterialNum ,$machineTreeMatType ,$substrateType ,$substrateDimensionforce ,$visualInspection,$shotRemarks,$pullSeatTestforce,$substrateLotNum,$pulltestdesc);
	} 
	else if($pick ==10 ||$pick == "10" ||$pick=='10' ){

            $prod_id = htmlentities(htmlspecialchars(urldecode($_POST['prod_id'])));
            $accountType = htmlentities(htmlspecialchars(urldecode($_POST['accountType'])));
            $fullname = htmlentities(htmlspecialchars(urldecode($_POST['fullname'])));
            $status = htmlentities(htmlspecialchars(urldecode($_POST['status'])));	
            $changed = strtotime($date);
			echo $sql = $insertdata->changeStatusCheckList($prod_id,$accountType,$fullname,$status,$changed);

	}

	else if($pick ==11 ||$pick == "11" ||$pick=='11' ){
 		$id = base64_decode(htmlentities(htmlspecialchars(urldecode($_POST['id'])))) ;
        $password = htmlentities(htmlspecialchars(urldecode($_POST['password'])));
		echo $sql = $insertdata->resetPassword($id,$password);
	}
	else if($pick ==12 ||$pick == "12" ||$pick=='12' ){
		$id = base64_decode(htmlentities(htmlspecialchars(urldecode($_POST['id'])))) ;
        $status = htmlentities(htmlspecialchars(urldecode($_POST['status'])));
		echo $sql = $insertdata->accountStatus($id,$status);
	}
	else if($pick == 13 ||$pick == "13" || $pick == '13' ){
		$checklist_id = htmlentities(htmlspecialchars(urldecode($_POST['checklist_id']))) ;
		$emp_id = htmlentities(htmlspecialchars(urldecode($_POST['emp_id']))) ;
		$status = htmlentities(htmlspecialchars(urldecode($_POST['status']))) ;
		$count = htmlentities(htmlspecialchars(urldecode($_POST['count']))) ;
		echo $sql = $insertdata->checklistchangestatus($checklist_id,$emp_id,$status,$count);

	}
	else if($pick == 14 ||$pick == "14" || $pick == '14' ){
		$checklistId  = htmlentities(htmlspecialchars(urldecode($_POST['checklist_id'])));	
		$workorder  = htmlentities(htmlspecialchars(urldecode($_POST['workorder'])));
		$date  = htmlentities(htmlspecialchars(urldecode($_POST['date'])));
		$productDesc  = htmlentities(htmlspecialchars(urldecode($_POST['productDesc'])));
		$machineNo  = htmlentities(htmlspecialchars(urldecode($_POST['machineNo'])));
		$product  = htmlentities(htmlspecialchars(urldecode($_POST['product'])));
		$type  = htmlentities(htmlspecialchars(urldecode($_POST['type'])));
		$handle  = htmlentities(htmlspecialchars(urldecode($_POST['handle'])));
		$machinetobeused  = htmlentities(htmlspecialchars(urldecode($_POST['machinetobeused'])));
		$substrate  = htmlentities(htmlspecialchars(urldecode($_POST['substrate'])));
		$operation  = htmlentities(htmlspecialchars(urldecode($_POST['operation'])));
		$maintenance  = htmlentities(htmlspecialchars(urldecode($_POST['maintenance'])));
		$preinstallremarks  = htmlentities(htmlspecialchars(urldecode($_POST['preinstallremarks'])));
		$arrcuttingforce  = htmlentities(htmlspecialchars(urldecode($_POST['arrcuttingforce'])));
		$arrsealingtime  = htmlentities(htmlspecialchars(urldecode($_POST['arrsealingtime'])));
		$arrcuttingspeed  = htmlentities(htmlspecialchars(urldecode($_POST['arrcuttingspeed'])));
		$arrapproachingposition  = htmlentities(htmlspecialchars(urldecode($_POST['arrapproachingposition'])));
		$arrsealingpositionspeed  = htmlentities(htmlspecialchars(urldecode($_POST['arrsealingpositionspeed'])));
		$arrsealingposition  = htmlentities(htmlspecialchars(urldecode($_POST['arrsealingposition'])));
		$arrMode  = htmlentities(htmlspecialchars(urldecode($_POST['arrMode'])));
		$arrmoldopenspeed  = htmlentities(htmlspecialchars(urldecode($_POST['arrmoldopenspeed'])));
		$arrwatertemp  = htmlentities(htmlspecialchars(urldecode($_POST['arrwatertemp'])));
		$arrairpressure  = htmlentities(htmlspecialchars(urldecode($_POST['arrairpressure'])));
		$arrupperheatertemp  = htmlentities(htmlspecialchars(urldecode($_POST['arrupperheatertemp'])));
		$arrlowerheatertemp  = htmlentities(htmlspecialchars(urldecode($_POST['arrlowerheatertemp'])));
		$arruppermoldtemp  = htmlentities(htmlspecialchars(urldecode($_POST['arruppermoldtemp'])));
		$arrlowermoldtemp  = htmlentities(htmlspecialchars(urldecode($_POST['arrlowermoldtemp'])));
		$arrtotalLength  = htmlentities(htmlspecialchars(urldecode($_POST['arrtotalLength'])));
		$arrswabheadlength  = htmlentities(htmlspecialchars(urldecode($_POST['arrswabheadlength'])));
		$arrswabheadwidth  = htmlentities(htmlspecialchars(urldecode($_POST['arrswabheadwidth'])));
		$arrswabheadthickness  = htmlentities(htmlspecialchars(urldecode($_POST['arrswabheadthickness'])));
		$arrswabhandlewidth  = htmlentities(htmlspecialchars(urldecode($_POST['arrswabhandlewidth'])));
		$arrswabhandlethickness  = htmlentities(htmlspecialchars(urldecode($_POST['arrswabhandlethickness'])));
		$arrswabhandlediameter  = htmlentities(htmlspecialchars(urldecode($_POST['arrswabhandlediameter'])));
		$arrpulltest  = htmlentities(htmlspecialchars(urldecode($_POST['arrpulltest'])));
		$noHandleperHT  = htmlentities(htmlspecialchars(urldecode($_POST['noHandleperHT'])));
		$visualInpection  = htmlentities(htmlspecialchars(urldecode($_POST['visualInpection'])));
		$arractualDataLoop  = htmlentities(htmlspecialchars(urldecode($_POST['arractualDataLoop'])));
		$selectedoption= htmlentities(htmlspecialchars(urldecode($_POST['selectedoption'])));
		$shotproductionremarks  = htmlentities(htmlspecialchars(urldecode($_POST['shotproductionremarks'])));
		$InspectedBY  = htmlentities(htmlspecialchars(urldecode($_POST['InspectedBY'])));
		$acknowledge  = htmlentities(htmlspecialchars(urldecode($_POST['acknowledge'])));
		$maintenancecheced   = htmlentities(htmlspecialchars(urldecode($_POST['maintenancecheced'])));
		$status  = htmlentities(htmlspecialchars(urldecode($_POST['status'])));
		$setUpNUmber  = htmlentities(htmlspecialchars(urldecode($_POST['setUpNUmber'])));
		$template  = htmlentities(htmlspecialchars(urldecode($_POST['template'])));
		$trans_num  = htmlentities(htmlspecialchars(urldecode($_POST['trans_num'])));
		$handleColor  = htmlentities(htmlspecialchars(urldecode($_POST['handleColor'])));
		$handleTreeMaterialNum  = htmlentities(htmlspecialchars(urldecode($_POST['handleTreeMaterialNum'])));
		$machineTreeMatType  = htmlentities(htmlspecialchars(urldecode($_POST['machineTreeMatType'])));
		$substrateType  = htmlentities(htmlspecialchars(urldecode($_POST['substrateType'])));
		$substrateDimensionforce  = htmlentities(htmlspecialchars(urldecode($_POST['substrateDimensionforce'])));
		$pullSeatTestforce  = htmlentities(htmlspecialchars(urldecode($_POST['pullSeatTestforce'])));
		$visualInspection = htmlentities(htmlspecialchars(urldecode($_POST['visualInspectionLoop'])));
		$shotRemarks = htmlentities(htmlspecialchars(urldecode($_POST['shotRemarks'])));
		$substrateLotNum = htmlentities(htmlspecialchars(urldecode($_POST['substrateLotNum'])));

		$pulltestdesc = htmlentities(htmlspecialchars(urldecode($_POST['pulltestdesc'])));


		echo $sql = $insertdata->updateCheckList($workorder ,$date ,$productDesc ,$machineNo ,$product ,$type ,$handle ,$machinetobeused ,$substrate ,$operation ,$maintenance ,$preinstallremarks ,$arrcuttingforce ,$arrsealingtime ,$arrcuttingspeed ,$arrapproachingposition ,$arrsealingpositionspeed ,$arrsealingposition ,$arrMode ,$arrmoldopenspeed ,$arrwatertemp ,$arrairpressure ,$arrupperheatertemp ,$arrlowerheatertemp ,$arruppermoldtemp ,$arrlowermoldtemp ,$arrtotalLength,$arrswabheadlength ,$arrswabheadwidth,$arrswabheadthickness ,$arrswabhandlewidth,$arrswabhandlethickness,$arrswabhandlediameter,$noHandleperHT,$visualInpection,$arractualDataLoop,$selectedoption,$shotproductionremarks,$InspectedBY ,$acknowledge,$maintenancecheced,$status,$arrpulltest,$checklistId,$setUpNUmber,$template,$trans_num, $handleColor,$handleTreeMaterialNum ,$machineTreeMatType ,$substrateType ,$substrateDimensionforce ,$visualInspection,$shotRemarks ,$pullSeatTestforce,$substrateLotNum,$pulltestdesc);
	 }

	 else if($pick == 15 ||$pick == "15" || $pick == '15' ){

	 	$id  = htmlentities(htmlspecialchars(urldecode($_POST['id'])));
	 	$transID = base64_decode($id);

	 	echo $sql = $insertdata->DuplicateCheckList($transID);

	 }


	 else if($pick == 16 ||$pick == "16" || $pick == '16' ){

	 	$id  = htmlentities(htmlspecialchars(urldecode($_POST['id'])));
	 	$transID = base64_decode($id);

	 	echo $sql = $insertdata->DeleteCheckList($transID);


	 }

?>	