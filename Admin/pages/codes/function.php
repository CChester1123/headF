<?php
date_default_timezone_set('Asia/Manila');
error_reporting(E_ALL);
ini_set('display_errors', 0);
header('Access-Control-Allow-Origin: *');
session_start();

define('DB_SERVER', '192.168.11.183');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'headforming');

class admin_creation
{
	// database conncections
	public function __construct()
	{
		$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		$this->dbh = $con;
		// Check connection
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
	}

	// starting the session
	public function get_session()
	{
		return $_SESSION['login'];
	}

	// end session
	public function user_logout()
	{
		$_SESSION['login'] = FALSE;
		session_destroy();
	}

	// user login
	public function check_login($emp_id, $password)
	{
		$encryted_password = base64_encode(urldecode($password));

		$result = mysqli_query($this->dbh, "SELECT * from tbl_users WHERE employeeID='$emp_id' and password='$encryted_password' AND status = 'Active'");
		$user_data = mysqli_fetch_array($result);
		$count_row = $result->num_rows;

		if ($count_row == 1) {
			$_SESSION['login'] = true;
			$_SESSION['emp_id'] = $user_data['employeeID'];
			$_SESSION['name'] = $user_data['fullName'];
			$_SESSION['account_type'] = $user_data['position'];

			return 1;
		} else {
			return 0;
		}
	}

	public function updatePassword($oldpassword, $newpassword, $employID)
	{
		$encryted_password = base64_encode(urldecode($oldpassword));
		$encryted_newpassword = base64_encode(urldecode($newpassword));
		$result = mysqli_query($this->dbh, "SELECT * from headforming.tbl_users WHERE employeeID='$employID' and password='$encryted_password'");
		$count_row = $result->num_rows;
		if ($count_row == 1) {
			mysqli_query($this->dbh, "UPDATE headforming.tbl_users SET password = '$encryted_newpassword' WHERE employeeID='$employID'");
			return 1;
		} else {
			return 0;
		}
	}

	public function resetPassword($id, $password)
	{
		$encryted_password = base64_encode(urldecode($password));
		$result = mysqli_query($this->dbh, "UPDATE headforming.tbl_users SET password = '$encryted_password' WHERE id='$id'");
		return $result;
	}

	public function accountStatus($id, $status)
	{
		$result = mysqli_query($this->dbh, "UPDATE headforming.tbl_users SET status = '$status' WHERE id='$id'");
		return $result;
	}

	public function createAdminAccount($emp_id, $name, $account, $password)
	{
		$encryted_password = base64_encode(urldecode($password));
		$result = mysqli_query($this->dbh, "SELECT * from headforming.tbl_users WHERE employeeID='$emp_id' ");
		$count_row = $result->num_rows;
		if ($count_row == 1) {
			return 0;
		} else {
			mysqli_query($this->dbh, "INSERT INTO headforming.tbl_users (employeeID,fullName,position,password,status) VALUES ('$emp_id','$name','$account','$encryted_password','Active') ");
			return 1;
		}
	}


	public function getAdminAccount()
	{
		$result = mysqli_query($this->dbh, "SELECT * FROM headforming.tbl_users WHERE status = 'Active' ORDER BY id DESC ");
		return $result;
	}

	public function selectTeamlead()
	{
		$result = mysqli_query($this->dbh, "SELECT employeeID,fullName FROM headforming.tbl_users WHERE position = 'TeamLeader' AND status = 'Active'");
		return $result;
	}

	public function  selectMaintenance()
	{
		$result = mysqli_query($this->dbh, "SELECT employeeID,fullName FROM headforming.tbl_users WHERE position = 'Maintenance' AND status = 'Active'");
		return $result;
	}

	public function getName($empid)
	{
		$result = mysqli_query($this->dbh, "SELECT fullName FROM headforming.tbl_users WHERE employeeID = '$empid'");
		$user_data = mysqli_fetch_array($result);
		return $user_data['fullName'];
	}

	public function getNames($data)
	{
		$pieces = explode(",", $data);
		$datas = implode("','", $pieces);
		$result = mysqli_query($this->dbh, "SELECT fullName FROM headforming.tbl_users WHERE employeeID IN ('$datas');");

		return $result;
	}

	public function createProduct($product, $productDesc, $handle, $subtrate, $status, $arrcuttingforce, $arrsealingtime, $arrcuttingspeed, $arrapproachingposition, $arrsealingpositionspeed, $arrsealingposition, $arrCheckbox, $moldopenspeed, $arrwatertemp, $arrairpressure, $arrupperheatertemp, $arrlowerheatertemp, $arruppermoldtemp, $arrlowermoldtemp, $arrtotalLength, $arrswabheadlength, $arrswabheadwidth, $arrswabheadthickness, $arrswabhandlewidth, $arrswabhandlethickness, $arrswabhandlediameter, $noHandleperHT, $arrpulltest, $arrswabheadpulling, $arrswabheadpopping, $pulltestdesc, $substrateDimensionforce, $pullSeatTestforce, $handleColor, $substrateLotNum, $handleTreeMaterialNum, $machineTreeMatType, $substrateType, $department)
	{

		$confirm = mysqli_query($this->dbh, "SELECT * FROM headforming.tbl_products2 WHERE productname = '$product' AND department = '$department'");
		$count_row = $confirm->num_rows;

		if ($count_row >= 1) {
			return "Product Code Already Exist";
		} else {

			$result = mysqli_query($this->dbh, "INSERT INTO tbl_products2 (productname,productDesc,handle, substrate, status, cuttingforceRange,sealingtimeRange,cuttingspeedRange,approachingpositionRange,sealingpositionspeedRange,sealingpositionRange,mode,moldopenspeedRange,watertempRange,airpressureRange,upperheattempRange,lowerheattempRange,uppermoldtempRange,lowermoldtempRange,totallengthRange,swabheadlengthRange,swabheadwidthRange,swabheadthicknessRange,swabhandlewidthRange,swabhandlethicknessRange,swabheaddiameterRange,noofsample,pullTest,swabheadpullingRange,swabheadpoppingRange,pulltestdesc,substrateDimention,pullSeatTest,handleColor,substrateLotNum,handleTreeMaterialNum,machineTreeMatType,substrateType,department) VALUES ('$product','$productDesc','$handle','$subtrate','$status','$arrcuttingforce','$arrsealingtime','$arrcuttingspeed','$arrapproachingposition','$arrsealingpositionspeed','$arrsealingposition','$arrCheckbox','$moldopenspeed','$arrwatertemp','$arrairpressure','$arrupperheatertemp','$arrlowerheatertemp','$arruppermoldtemp','$arrlowermoldtemp','$arrtotalLength','$arrswabheadlength','$arrswabheadwidth','$arrswabheadthickness','$arrswabhandlewidth','$arrswabhandlethickness','$arrswabhandlediameter','$noHandleperHT','$arrpulltest','$arrswabheadpulling','$arrswabheadpopping','$pulltestdesc','$substrateDimensionforce','$pullSeatTestforce','$handleColor','$substrateLotNum','$handleTreeMaterialNum','$machineTreeMatType','$substrateType','$department')");
			return $result;
		}
	}

	public function getProduct()
	{
		$result = mysqli_query($this->dbh, "SELECT id, productname, productDesc, status FROM headforming.tbl_products2 ORDER BY id DESC ");
		return $result;
	}

	public function ViewEditProduct($prod_id)
	{
		$result = mysqli_query($this->dbh, "SELECT * FROM headforming.tbl_products2 WHERE id = '$prod_id'");
		return $result;
	}



	public function ViewEditchecklist($id)
	{
		$result = mysqli_query($this->dbh, "SELECT * FROM headforming.tbl_checklist WHERE id = '$id'");
		return $result;
	}

	public function editProduct($prod_id, $product, $productDesc, $handle, $subtrate, $status, $arrcuttingforce, $arrsealingtime, $arrcuttingspeed, $arrapproachingposition, $arrsealingpositionspeed, $arrsealingposition, $arrCheckbox, $moldopenspeed, $arrwatertemp, $arrairpressure, $arrupperheatertemp, $arrlowerheatertemp, $arruppermoldtemp, $arrlowermoldtemp, $arrtotalLength, $arrswabheadlength, $arrswabheadwidth, $arrswabheadthickness, $arrswabhandlewidth, $arrswabhandlethickness, $arrswabhandlediameter, $noHandleperHT, $arrpulltest, $arrswabheadpulling, $arrswabheadpopping, $pulltestdesc, $substrateDimensionforce, $pullSeatTestforce, $handleColor, $substrateLotNum, $handleTreeMaterialNum, $machineTreeMatType, $substrateType)
	{

		$result = mysqli_query($this->dbh, "UPDATE tbl_products2 SET productname = '$product',  productDesc = '$productDesc',  handle = '$handle',  substrate = '$subtrate',  status = '$status',  cuttingforceRange = '$arrcuttingforce',  sealingtimeRange = '$arrsealingtime',  cuttingspeedRange = '$arrcuttingspeed',  approachingpositionRange = '$arrapproachingposition',  sealingpositionspeedRange = '$arrsealingpositionspeed',  sealingpositionRange = '$arrsealingposition',  mode = '$arrCheckbox',  moldopenspeedRange = '$moldopenspeed',  watertempRange = '$arrwatertemp',  airpressureRange = '$arrairpressure',  upperheattempRange = '$arrupperheatertemp',  lowerheattempRange = '$arrlowerheatertemp',  uppermoldtempRange = '$arruppermoldtemp',  lowermoldtempRange = '$arrlowermoldtemp',  totallengthRange = '$arrtotalLength',  swabheadlengthRange = '$arrswabheadlength',  swabheadwidthRange = '$arrswabheadwidth',  swabheadthicknessRange = '$arrswabheadthickness',  swabhandlewidthRange = '$arrswabhandlewidth',  swabhandlethicknessRange = '$arrswabhandlethickness',  swabheaddiameterRange = '$arrswabhandlediameter',  noofsample = '$noHandleperHT',  pullTest = '$arrpulltest',  swabheadpullingRange = '$arrswabheadpulling',  swabheadpoppingRange = '$arrswabheadpopping', pulltestdesc='$pulltestdesc',substrateDimention = '$substrateDimensionforce',pullSeatTest='$pullSeatTestforce', handleColor = '$handleColor' ,substrateLotNum='$substrateLotNum' ,handleTreeMaterialNum='$handleTreeMaterialNum',machineTreeMatType='$machineTreeMatType',substrateType='$substrateType' WHERE id = '$prod_id'");
		return $result;
	}

	public function	selectPartNo()
	{
		$result = mysqli_query($this->dbh, "SELECT id,productname, department FROM headforming.tbl_products2 WHERE status = 'Active'");
		return $result;
	}

	public function selectPartNumber($partNo)
	{
		$result = mysqli_query($this->dbh, "SELECT  * from tbl_products WHERE id = '$partNo'");
		$user_data = mysqli_fetch_array($result);
		$data[0] = $user_data['productDesc'];
		$data[1] = $user_data['handle'];
		$data[2] = $user_data['subtrate'];
		$data[3] = $user_data['minUpperHeater'];
		$data[4] = $user_data['maxUpperHeater'];
		$data[5] = $user_data['minLowerHeater'];
		$data[6] = $user_data['maxLowerHeater'];
		$data[7] = $user_data['minHeatingTime'];
		$data[8] = $user_data['maxHeatingTime'];
		$data[9] = $user_data['minTimeLag'];
		$data[10] = $user_data['maxTimeLag'];
		$data[11] = $user_data['minTimeClosing'];
		$data[12] = $user_data['maxTimeClosing'];
		$data[13] = $user_data['minCuttingForce'];
		$data[14] = $user_data['maxCuttingForce'];
		$data[15] = $user_data['minSealingForce'];
		$data[16] = $user_data['maxSealingForce'];
		$data[17] = $user_data['minSealingTime'];
		$data[18] = $user_data['maxSealingTime'];
		$data[19] = $user_data['minCuttingSpeed'];
		$data[20] = $user_data['maxCuttingSpeed'];
		$data[21] = $user_data['minApproachingPosition'];
		$data[22] = $user_data['maxApproachingPosition'];
		$data[23] = $user_data['minSealingPositionSpeed'];
		$data[24] = $user_data['maxSealingPositionSpeed'];
		$data[25] = $user_data['mode'];
		$data[26] = $user_data['minSealingForceMode'];
		$data[27] = $user_data['maxSealingForceMode'];
		$data[28] = $user_data['minSealingPosition'];
		$data[29] = $user_data['maxSealingPosition'];
		$data[30] = $user_data['minSealingTimeMode'];
		$data[31] = $user_data['maxSealingTimeMode'];
		$data[32] = $user_data['minCuttingSpeedMode'];
		$data[33] = $user_data['maxCuttingSpeedMode'];
		$data[34] = $user_data['minApproachingPositionMode'];
		$data[35] = $user_data['maxApproachingPositionMode'];
		$data[36] = $user_data['minSealingPositionSpeedMode'];
		$data[37] = $user_data['maxSealingPositionSpeedMode'];
		$data[38] = $user_data['moldOpenSpeed'];
		$data[39] = $user_data['minWaterTemp'];
		$data[40] = $user_data['maxWaterTemp'];
		$data[41] = $user_data['minAirPressure'];
		$data[42] = $user_data['maxAirPressure'];
		$data[43] = $user_data['minHeadformingUpperHeaterTemp'];
		$data[44] = $user_data['maxHeadformingUpperHeaterTemp'];
		$data[45] = $user_data['minHeadformingLowerHeaterTemp'];
		$data[46] = $user_data['maxHeadformingLowerHeaterTemp'];
		$data[47] = $user_data['minHeadformingUpperMoldTemp'];
		$data[48] = $user_data['maxHeadformingUpperMoldTemp'];
		$data[49] = $user_data['minHeadformingLowerMoldTemp'];
		$data[50] = $user_data['maxHeadformingLowerMoldTemp'];
		$data[51] = $user_data['machineRunning'];
		$data[52] = $user_data['minHeatingOil'];
		$data[53] = $user_data['maxHeatingOil'];
		$data[54] = $user_data['minHeatingTank'];
		$data[55] = $user_data['maxHeatingTank'];
		$data[56] = $user_data['minCoolingWater'];
		$data[57] = $user_data['maxCoolingWater'];

		$data[58] = $user_data['minTotalLength'];
		$data[59] = $user_data['maxTotalLength'];
		$data[60] = $user_data['minSwabHeadLength'];
		$data[61] = $user_data['maxSwabHeadLength'];
		$data[62] = $user_data['minSwabHeadWidth'];
		$data[63] = $user_data['maxSwabHeadWidth'];
		$data[64] = $user_data['minSwabHeadThickness'];
		$data[65] = $user_data['maxSwabHeadThickness'];
		$data[66] = $user_data['minSwabHeadWidth2'];
		$data[67] = $user_data['maxSwabHeadWidth2'];
		$data[68] = $user_data['minSwabHeadThickness2'];
		$data[69] = $user_data['maxSwabHeadThickness2'];
		$data[70] = $user_data['minSwabHeadDiameter'];
		$data[71] = $user_data['maxSwabHeadDiameter'];

		$data[72] = $user_data['noHandleperHT'];
		$data[73] = $user_data['minPullTest'];
		$data[74] = $user_data['maxPullTest'];

		return $data;
	}

	public function getpartdesc($Product_ID)
	{
		$result = mysqli_query($this->dbh, "SELECT product FROM headforming.tbl_products WHERE id = '$Product_ID'");
		$user_data = mysqli_fetch_array($result);
		return $user_data['product'];
	}

	public function createCheckList($workorder, $date, $productDesc, $machineNo, $product, $type, $handle, $machinetobeused, $substrate, $operation, $maintenance, $preinstallremarks, $arrcuttingforce, $arrsealingtime, $arrcuttingspeed, $arrapproachingposition, $arrsealingpositionspeed, $arrsealingposition, $arrMode, $arrmoldopenspeed, $arrwatertemp, $arrairpressure, $arrupperheatertemp, $arrlowerheatertemp, $arruppermoldtemp, $arrlowermoldtemp, $arrtotalLength, $arrswabheadlength, $arrswabheadwidth, $arrswabheadthickness, $arrswabhandlewidth, $arrswabhandlethickness, $arrswabhandlediameter, $noHandleperHT, $visualInpection, $arractualDataLoop, $selectedoption, $shotproductionremarks, $InspectedBY, $acknowledge, $maintenancecheced, $status, $arrpulltest, $setUpNUmber, $template, $trans_num, $handleColor, $handleTreeMaterialNum, $machineTreeMatType, $substrateType, $substrateDimensionforce, $visualInspection, $shotRemarks, $pullSeatTestforce, $substrateLotNum, $pulltestdesc)
	{
		$result = mysqli_query($this->dbh, "INSERT INTO tbl_checklist (workorder,date,productDesc,machineNo,product,type,handle,machinetobeused,substrate,operation,maintenance,preinstallremarks,arrcuttingforce,arrsealingtime,arrcuttingspeed,arrapproachingposition,arrsealingpositionspeed,arrsealingposition,arrMode,arrmoldopenspeed,arrwatertemp,arrairpressure,arrupperheatertemp,arrlowerheatertemp,arruppermoldtemp,arrlowermoldtemp,arrtotalLength,arrswabheadlength,arrswabheadwidth,arrswabheadthickness,arrswabhandlewidth,arrswabhandlethickness,arrswabhandlediameter,noHandleperHT,visualInpection,arractualDataLoop,selectedoption,shotproductionremarks,InspectedBY,acknowledge,maintenancecheced,status,pulltest,setUpNUmber,template,trans_num,handleColor,handleTreeMaterialNum,machineTreeMatType,substrateType,substrateDimention,visualInspection,shotRemarks,pullSeatTest,substrateLotNum) VALUES ('$workorder','$date','$productDesc','$machineNo','$product','$type','$handle','$machinetobeused','$substrate','$operation','$maintenance','$preinstallremarks','$arrcuttingforce','$arrsealingtime','$arrcuttingspeed','$arrapproachingposition','$arrsealingpositionspeed','$arrsealingposition','$arrMode','$arrmoldopenspeed','$arrwatertemp','$arrairpressure','$arrupperheatertemp','$arrlowerheatertemp','$arruppermoldtemp','$arrlowermoldtemp','$arrtotalLength','$arrswabheadlength','$arrswabheadwidth','$arrswabheadthickness','$arrswabhandlewidth','$arrswabhandlethickness','$arrswabhandlediameter','$noHandleperHT','$visualInpection','$arractualDataLoop','$selectedoption','$shotproductionremarks','$InspectedBY','$acknowledge','$maintenancecheced','$status','$pulltestdesc','$setUpNUmber','$template', '$trans_num', '$handleColor','$handleTreeMaterialNum' ,'$machineTreeMatType' ,'$substrateType' ,'$substrateDimensionforce','$visualInspection','$shotRemarks','$pullSeatTestforce','$substrateLotNum' ) ");
		return $result;
	}

	public function updateCheckList($workorder, $date, $productDesc, $machineNo, $product, $type, $handle, $machinetobeused, $substrate, $operation, $maintenance, $preinstallremarks, $arrcuttingforce, $arrsealingtime, $arrcuttingspeed, $arrapproachingposition, $arrsealingpositionspeed, $arrsealingposition, $arrMode, $arrmoldopenspeed, $arrwatertemp, $arrairpressure, $arrupperheatertemp, $arrlowerheatertemp, $arruppermoldtemp, $arrlowermoldtemp, $arrtotalLength, $arrswabheadlength, $arrswabheadwidth, $arrswabheadthickness, $arrswabhandlewidth, $arrswabhandlethickness, $arrswabhandlediameter, $noHandleperHT, $visualInpection, $arractualDataLoop, $selectedoption, $shotproductionremarks, $InspectedBY, $acknowledge, $maintenancecheced, $status, $arrpulltest, $checklistId, $setUpNUmber, $template, $trans_num, $handleColor, $handleTreeMaterialNum, $machineTreeMatType, $substrateType, $substrateDimensionforce, $visualInspection, $shotRemarks, $pullSeatTestforce, $substrateLotNum, $pulltestdesc)
	{
		$result = mysqli_query($this->dbh, "UPDATE tbl_checklist
SET
 workorder = '$workorder',
    date = '$date',
    productDesc = '$productDesc',
    machineNo = '$machineNo',
    product = '$product',
    type = '$type',
    handle = '$handle',
    machinetobeused = '$machinetobeused',
    substrate = '$substrate',
    operation = '$operation',
    maintenance = '$maintenance',
    preinstallremarks = '$preinstallremarks',
    arrcuttingforce = '$arrcuttingforce',
    arrsealingtime = '$arrsealingtime',
    arrcuttingspeed = '$arrcuttingspeed',
    arrapproachingposition = '$arrapproachingposition',
    arrsealingpositionspeed = '$arrsealingpositionspeed',
    arrsealingposition = '$arrsealingposition',
    arrMode = '$arrMode',
    arrmoldopenspeed = '$arrmoldopenspeed',
    arrwatertemp = '$arrwatertemp',
    arrairpressure = '$arrairpressure',
    arrupperheatertemp = '$arrupperheatertemp',
    arrlowerheatertemp = '$arrlowerheatertemp',
    arruppermoldtemp = '$arruppermoldtemp',
    arrlowermoldtemp = '$arrlowermoldtemp',
    arrtotalLength = '$arrtotalLength',
    arrswabheadlength = '$arrswabheadlength',
    arrswabheadwidth = '$arrswabheadwidth',
    arrswabheadthickness = '$arrswabheadthickness',
    arrswabhandlewidth = '$arrswabhandlewidth',
    arrswabhandlethickness = '$arrswabhandlethickness',
    arrswabhandlediameter = '$arrswabhandlediameter',
    noHandleperHT = '$noHandleperHT',
    visualInpection = '$visualInpection',
    arractualDataLoop = '$arractualDataLoop',
    selectedoption = '$selectedoption',
    shotproductionremarks = '$shotproductionremarks',
    InspectedBY = '$InspectedBY',
    acknowledge = '$acknowledge',
    maintenancecheced = '$maintenancecheced',
    status = '$status',
    pulltest = '$pulltestdesc',
    setUpNUmber ='$setUpNUmber',
    template = '$template',
    trans_num = '$trans_num', 
    handleColor = '$handleColor',
    handleTreeMaterialNum = '$handleTreeMaterialNum' ,
    machineTreeMatType = '$machineTreeMatType',
    substrateType = '$substrateType',
    substrateDimention = '$substrateDimensionforce' ,
    visualInspection = '$visualInspection',
    shotRemarks = '$shotRemarks',
     pullSeatTest ='$pullSeatTestforce',
    substrateLotNum ='$substrateLotNum'
WHERE id = '$checklistId';
    ");
		return $result;
	}

	public function GetCheckList()
	{
		$result = mysqli_query($this->dbh, "SELECT id, workorder,product, status, status_maintenance, status_TL ,type,InspectedBY,date FROM headforming.tbl_checklist WHERE status != '0' OR status is null ORDER BY id DESC");
		return $result;
	}

	public function ViewCheckList($Product_ID)
	{
		$result = mysqli_query($this->dbh, "SELECT * FROM headforming.tbl_checklist WHERE id = '$Product_ID'");
		return $result;
	}

	public function viewMinValue($min)
	{
		$data = explode(',', $min);
		return $data[0];
	}
	public function viewMaxValue($max)
	{
		$data = explode(',', $max);
		return $data[1];
	}

	public function checkValidation($min, $max, $actual)
	{
		if ($min == "na" && $max == "na") {
			return "<p style='color:green; text-align:center'>Within standards</p>";
		} else if ($actual >= $min && $actual <= $max) {
			return "<p style='color:green; text-align:center'>Within standards</p>";
		} else {
			return "<p style='color:red; text-align:center'>Out of specs, create change notice</p>";
		}
	}


	public function checkValidation2($value1, $value2, $value3, $value4, $value5, $value6, $value7)
	{

		if ($value1 == "N/A" && $value2 == "N/A") {
			return "<p style='color:green; text-align:center'>Within standards</p>";
		} else if ($value2 == "") {
			if ($value3 > $value1 && $value4 > $value1 && $value5 > $value1 && $value6 > $value1 && $value7) {
				return "<p style='color:green; text-align:center'>Within standards</p>";
			} else {
				return "<p style='color:red; text-align:center'>Out of specs, create change notice</p>";
			}
		} else if ($value3 >= $value1 && $value3 <= $value2) {
			return "<p style='color:green; text-align:center'>Within standards</p>";
		} else if ($value4 >= $value1 && $value4 <= $value2) {
			return "<p style='color:green; text-align:center'>Within standards</p>";
		} else if ($value5 >= $value1 && $value5 <= $value2) {
			return "<p style='color:green; text-align:center'>Within standards</p>";
		} else if ($value6 >= $value1 && $value6 <= $value2) {
			return "<p style='color:green; text-align:center'>Within standards</p>";
		} else if ($value7 >= $value1 && $value7 <= $value2) {
			return "<p style='color:green; text-align:center'>Within standards</p>";
		} else {
			return "<p style='color:red; text-align:center'>Out of specs, create change notice</p>";
		}
	}

	public function checkValidationCheck($min, $max, $actual)
	{
		if ($actual == $min || $actual == $actual) {
			return "<p style='color:green; text-align:center'>Within standards</p>";
		} else {
			return "<p style='color:red; text-align:center'>Out of specs, create change notice</p>";
		}
	}

	public function checkValidationcompare($max, $actual)
	{

		if ($actual <= $max) {
			return "<p style='color:green; text-align:center'>Within standards</p>";
		} else {
			return "<p style='color:red; text-align:center'>Out of specs, create change notice</p>";
		}
	}

	public function value1Actual($value1)
	{
		$data = explode(',', $value1);
		return $data[0];
	}

	public function value2Actual($value2)
	{
		$data = explode(',', $value2);
		return $data[1];
	}

	public function value3Actual($value3)
	{
		$data = explode(',', $value3);
		return $data[2];
	}

	public function value4Actual($value4)
	{
		$data = explode(',', $value4);
		return $data[3];
	}

	public function value5Actual($value4)
	{
		$data = explode(',', $value4);
		return $data[4];
	}

	public function value6Actual($value4)
	{
		$data = explode(',', $value4);
		return $data[5];
	}

	public function value7Actual($value4)
	{
		$data = explode(',', $value4);
		return $data[6];
	}


	public function value8Actual($value4)
	{
		$data = explode(',', $value4);
		return $data[7];
	}

	public function value9Actual($value4)
	{
		$data = explode(',', $value4);
		return $data[8];
	}

	public function value10Actual($value4)
	{
		$data = explode(',', $value4);
		return $data[9];
	}

	public function pullTest($value, $number)
	{
		$data = explode(',', $value);
		return $data[$number];
	}

	public function GetCheckListChecker($emp_id)
	{
		$result = mysqli_query($this->dbh, "SELECT id, workorder,productDesc, status, status_maintenance, status_TL,type,InspectedBY,date FROM headforming.tbl_checklist WHERE status != '0' OR status is null AND acknowledge like '%$emp_id%' OR maintenancecheced  like '%$emp_id%' ORDER BY id DESC");
		return $result;
	}

	public function changeStatusCheckList($prod_id, $accountType, $fullname, $status, $changed)
	{

		$data = $status . "," . $fullname . "," . $changed;

		if ($accountType == 'TeamLeader') {
			if ($status == 'Rejected') {
				$result = mysqli_query($this->dbh, "UPDATE headforming.tbl_checklist SET TeamLeadStatus = '$data' WHERE id = '$prod_id'; ");
			} else {
				$result = mysqli_query($this->dbh, "UPDATE headforming.tbl_checklist SET TeamLeadStatus = '$data' WHERE id = '$prod_id'; ");
			}
		}

		if ($accountType == 'Maintenance') {
			if ($status == 'Rejected') {
				$result = mysqli_query($this->dbh, "UPDATE headforming.tbl_checklist SET MaintenanceStatus = '$data' WHERE id = '$prod_id'; ");
			} else {
				$result = mysqli_query($this->dbh, "UPDATE headforming.tbl_checklist SET MaintenanceStatus = '$data' WHERE id = '$prod_id'; ");
			}
		}

		return $result;
	}

	public function getStatus($Status)
	{
		$data = explode(',', $Status);
		return $data[0];
	}

	public function checkdimension($diameterMin, $diameterMax, $diameter1, $diameter2, $diameter3, $diameter4, $diameter5)
	{
		if ($diameterMin >= $diameter1 || $diameterMax <= $diameter1) {
			echo "<p style='color: red' > Out of specs, create change notice </p>";
		} else if ($diameterMin >= $diameter2 || $diameterMax <= $diameter2) {
			echo "<p style='color: red' > Out of specs, create change notice </p>";
		} else if ($diameterMin >= $diameter3 || $diameterMax <= $diameter3) {
			echo "<p style='color: red' > Out of specs, create change notice </p>";
		} else if ($diameterMin >= $diameter4 || $diameterMax <= $diameter4) {
			echo "<p style='color: red' > Out of specs, create change notice </p>";
		} else if ($diameterMin >= $diameter5 || $diameterMax <= $diameter5) {
			echo "<p style='color: red' > Out of specs, create change notice </p>";
		} else {
			echo "<p style='color: green' > Within standards </p>";
		}
	}

	public function checklistchangestatus($checklist_id, $emp_id, $status, $count)
	{
		$result = mysqli_query($this->dbh, "SELECT acknowledge, maintenancecheced  FROM headforming.tbl_checklist WHERE id = '$checklist_id'");
		$user_data = mysqli_fetch_array($result);
		$id_tl = $user_data['acknowledge'];
		$id_maintenance = $user_data['maintenancecheced'];

		if ($id_tl == $emp_id) {
			$data = mysqli_query($this->dbh, "UPDATE headforming.tbl_checklist SET status_TL = '$status'  WHERE id = '$checklist_id'; ");
		} else if ($id_maintenance == $emp_id) {
			$data = mysqli_query($this->dbh, "UPDATE headforming.tbl_checklist SET status_maintenance = '$status' WHERE id = '$checklist_id'; ");
		} else {
			$data = mysqli_query($this->dbh, "UPDATE headforming.tbl_checklist SET status = '$status' ,count='$count' WHERE id = '$checklist_id'; ");
		}

		return $data;
	}

	public function fetchPendingChecklist()
	{
		$result = mysqli_query($this->dbh, "SELECT count(id) as countID FROM headforming.tbl_checklist WHERE status ='Pending'");
		$user_data = mysqli_fetch_array($result);
		return $user_data['countID'];
	}

	public function fetchApproveChecklist()
	{
		$result = mysqli_query($this->dbh, "SELECT count(id) as countID FROM headforming.tbl_checklist WHERE status ='Approve'");
		$user_data = mysqli_fetch_array($result);
		return $user_data['countID'];
	}

	public function fetchAllChecklist()
	{
		$result = mysqli_query($this->dbh, "SELECT count(id) as countID FROM headforming.tbl_checklist");
		$user_data = mysqli_fetch_array($result);
		return $user_data['countID'];
	}

	public function fetchTotalProduct()
	{
		$result = mysqli_query($this->dbh, "SELECT count(id) as countID FROM headforming.tbl_products2");
		$user_data = mysqli_fetch_array($result);
		return $user_data['countID'];
	}

	public function DuplicateCheckList($transID)
	{
		$result = mysqli_query($this->dbh, "INSERT INTO headforming.tbl_checklist (workorder, productDesc, machineNo,product,type,handle,machinetobeused,substrate,operation,maintenance,preinstallremarks,arrcuttingforce,arrsealingtime,arrcuttingspeed,arrapproachingposition,arrsealingpositionspeed,arrsealingposition,arrMode,arrmoldopenspeed,arrwatertemp,arrairpressure,arrupperheatertemp,arrlowerheatertemp,arruppermoldtemp,arrlowermoldtemp,arrtotalLength,arrswabheadlength,arrswabheadwidth,arrswabheadthickness,arrswabhandlewidth,arrswabhandlethickness,arrswabhandlediameter,noHandleperHT,visualInpection,arractualDataLoop,shotproductionremarks,InspectedBY,acknowledge,maintenancecheced,status_maintenance,status_TL,selectedoption,pulltest,setUpNUmber,template,trans_num)
 					
 					SELECT workorder, productDesc, machineNo,product,type,handle,machinetobeused,substrate,operation,maintenance,preinstallremarks,arrcuttingforce,arrsealingtime,arrcuttingspeed,arrapproachingposition,arrsealingpositionspeed,arrsealingposition,arrMode,arrmoldopenspeed,arrwatertemp,arrairpressure,arrupperheatertemp,arrlowerheatertemp,arruppermoldtemp,arrlowermoldtemp,arrtotalLength,arrswabheadlength,arrswabheadwidth,arrswabheadthickness,arrswabhandlewidth,arrswabhandlethickness,arrswabhandlediameter,noHandleperHT,visualInpection,arractualDataLoop,shotproductionremarks,InspectedBY,acknowledge,maintenancecheced,status_maintenance,status_TL,selectedoption,pulltest,setUpNUmber + 1,template,trans_num FROM headforming.tbl_checklist WHERE id = '$transID'");


		mysqli_query($this->dbh, "UPDATE headforming.tbl_checklist SET count = '1'  WHERE id = '$transID'");



		return $result;
	}


	public function DeleteCheckList($transID)
	{
		$result = mysqli_query($this->dbh, "UPDATE headforming.tbl_checklist SET status = '0' WHERE id = '$transID'");
		return $transID;
	}

	public function GetCheckListThermal()
	{
		$result = mysqli_query($this->dbh, "SELECT * FROM tbl_thermalbonding WHERE status != '0' OR status is null ORDER BY id DESC");
		return $result;
	}

	public function ViewEditchecklist2($id)
	{
		$result = mysqli_query($this->dbh, "SELECT * FROM headforming.tbl_thermalbonding WHERE id = '$id'");
		return $result;
	}
	public function DeleteCheckList2($transID)
	{
		$result = mysqli_query($this->dbh, "UPDATE headforming.tbl_thermalbonding SET status = '0' WHERE id = '$transID'");
		return $result;
	}
	public function createThermal($status, $workorder, $date, $time, $shift, $operatorName, $teamLead, $machineNo, $product, $type, $InspectedBY, $maintenancecheced, $handle, $substrate, $handleTreeColor, $substrateLotNum, $handleTreeMaterialNum, $texwipeLogo, $remarksInprocess, $arrTemp, $actTempUpnLow, $TempUpnLow, $arrHeat, $actHeatingTime, $HeatingTime, $arrSwab, $actSwabHandleFixture, $SwabHandleFixture, $arrFixture, $actFixtureClosingTime, $FixtureClosingTime, $productionStats, $remarksProduction, $visualInpection, $remarksVisual, $resistanceInpection, $remarksResistance)
	{
		$result = mysqli_query($this->dbh, "INSERT INTO `headforming`.`tbl_thermalbonding` ( `workorder`, `date`, `time`, `shift`, `operatorName`, `teamLead`, `machineNo`, `product`, `type`, `InspectedBY`, `maintenancecheced`, `handle`, `substrate`, `handleTreeColor`, `substrateLotNum`, `handleTreeMaterialNum`, `texwipeLogo`, `remarksInprocess`, `TempUpnLowRange`, `actTempUpnLow`, `TempUpnLow`, `HeatingTimeRange`, `actHeatingTime`, `HeatingTime`,  `SwabHandleFixtureRange`, `actSwabHandleFixture`, `SwabHandleFixture`, `FixtureClosingTimeRange`, `actFixtureClosingTime`, `FixtureClosingTime`, `productionStats`, `remarksProduction`, `visualInpection`, `remarksVisual`, `resistanceInpection`, `remarksResistance`, `status` ) VALUES ( '$workorder', '$date', '$time', '$shift', '$operatorName', '$teamLead', '$machineNo', '$product', '$type', '$InspectedBY', '$maintenancecheced', '$handle', '$substrate', '$handleTreeColor', '$substrateLotNum', '$handleTreeMaterialNum', '$texwipeLogo', '$remarksInprocess', '$arrTemp', '$actTempUpnLow', '$TempUpnLow', '$arrHeat', '$actHeatingTime', '$HeatingTime', '$arrSwab', '$actSwabHandleFixture', '$SwabHandleFixture', '$arrFixture', '$actFixtureClosingTime', '$FixtureClosingTime', '$productionStats', '$remarksProduction', '$visualInpection', '$remarksVisual', '$resistanceInpection', '$remarksResistance', '$status' )");

		return $result;
	}
	public function updateThermalList($prod_id, $status, $workorder, $date, $time, $shift, $operatorName, $teamLead, $machineNo, $product, $type, $InspectedBY, $maintenancecheced, $handle, $substrate, $handleTreeColor, $substrateLotNum, $handleTreeMaterialNum, $texwipeLogo, $remarksInprocess, $arrTemp, $actTempUpnLow, $TempUpnLow, $arrHeat, $actHeatingTime, $HeatingTime, $arrSwab, $actSwabHandleFixture, $SwabHandleFixture, $arrFixture, $actFixtureClosingTime, $FixtureClosingTime, $productionStats, $remarksProduction, $visualInpection, $remarksVisual, $resistanceInpection, $remarksResistance)
	{
		$result = mysqli_query($this->dbh, "UPDATE `headforming`.`tbl_thermalbonding` SET `workorder` = '$workorder', `date` = '$date', `time` = '$time', `shift` = '$shift', `operatorName` = '$operatorName', `teamLead` = '$teamLead', `machineNo` = '$machineNo', `product` = '$product', `type` = '$type', `InspectedBY` = '$InspectedBY', `maintenancecheced` = '$maintenancecheced', `handle` = '$handle', `substrate` = '$substrate', `handleTreeColor` = '$handleTreeColor', `substrateLotNum` = '$substrateLotNum', `handleTreeMaterialNum` = '$handleTreeMaterialNum', `texwipeLogo` = '$texwipeLogo', `remarksInprocess` = '$remarksInprocess', `TempUpnLowRange` = '$arrTemp', `actTempUpnLow` = '$actTempUpnLow', `TempUpnLow` = '$TempUpnLow', `HeatingTimeRange` = '$arrHeat', `actHeatingTime` = '$actHeatingTime', `HeatingTime` = '$HeatingTime', `SwabHandleFixtureRange` = '$arrSwab', `actSwabHandleFixture` = '$actSwabHandleFixture', `SwabHandleFixture` = '$SwabHandleFixture', `FixtureClosingTimeRange` = '$arrFixture', `actFixtureClosingTime` = '$actFixtureClosingTime', `FixtureClosingTime` = '$FixtureClosingTime', `productionStats` = '$productionStats', `remarksProduction` = '$remarksProduction', `visualInpection` = '$visualInpection', `remarksVisual` = '$remarksVisual', `resistanceInpection` = '$resistanceInpection', `remarksResistance` = '$remarksResistance', `status` = '$status' WHERE `id` = '$prod_id'");

		return $result;
	}
	public function DuplicateCheckList2($transID)
	{
		$result = mysqli_query($this->dbh, "INSERT INTO headforming.tbl_thermalbonding (workorder, date, time, shift, operatorName, teamLead, machineNo, product, type, InspectedBY, maintenancecheced, handle, substrate, handleTreeColor, substrateLotNum, handleTreeMaterialNum, texwipeLogo, remarksInprocess, TempUpnLowRange, actTempUpnLow, TempUpnLow, HeatingTimeRange, actHeatingTime, HeatingTime, SwabHandleFixtureRange, actSwabHandleFixture, SwabHandleFixture, FixtureClosingTimeRange, actFixtureClosingTime, FixtureClosingTime, productionStats, remarksProduction, visualInpection, remarksVisual, resistanceInpection, remarksResistance, status)
		
		SELECT workorder, date, time, shift, operatorName, teamLead, machineNo, product, type, InspectedBY, maintenancecheced, handle, substrate, handleTreeColor, substrateLotNum, handleTreeMaterialNum, texwipeLogo, remarksInprocess, TempUpnLowRange, actTempUpnLow, TempUpnLow, HeatingTimeRange, actHeatingTime, HeatingTime, SwabHandleFixtureRange, actSwabHandleFixture, SwabHandleFixture, FixtureClosingTimeRange, actFixtureClosingTime, FixtureClosingTime, productionStats, remarksProduction, visualInpection, remarksVisual, resistanceInpection, remarksResistance, status FROM headforming.tbl_thermalbonding WHERE id = '$transID'");

		return $result;
	}
	public function createSwab($status, $workorder, $date, $time, $shift, $operatorName, $teamLead, $machineNo, $product, $type, $InspectedBY, $maintenancecheced, $handle, $substrate, $handleTreeColor, $substrateLotNum, $handleTreeMaterialNum, $texwipeLogo, $remarksInprocess, $arrTemp, $actTempUpnLow, $TempUpnLow, $arrHeat, $actHeatingTime, $HeatingTime, $arrSwab, $actSwabHandleFixture, $SwabHandleFixture, $arrFixture, $actFixtureClosingTime, $FixtureClosingTime, $productionStats, $remarksProduction, $visualInpection, $remarksVisual, $manualHeadPulling, $remarksManualHeadPulling, $pulltestingMin, $arrSample, $remarksPullTesting, $enterNA)
	{
		$result = mysqli_query($this->dbh, "INSERT INTO `headforming`.`tbl_swabassembly` ( `workorder`, `date`, `time`, `shift`, `operatorName`, `teamLead`, `machineNo`, `product`, `type`, `InspectedBY`, `maintenancecheced`, `handle`, `substrate`, `handleTreeColor`, `substrateLotNum`, `handleTreeMaterialNum`, `texwipeLogo`, `remarksInprocess`, `visualInpection`, `remarksVisual`, `manualHeadPulling`, `remarksManualHeadPulling`, `pulltestingMin`, `pulltestingSample`, `remarksPullTesting`, `enterNA`, `productionStats`, `remarksProduction`, `status` ) VALUES ( '$workorder', '$date', '$time', '$shift', '$operatorName', '$teamLead', '$machineNo', '$product', '$type', '$InspectedBY', '$maintenancecheced', '$handle', '$substrate', '$handleTreeColor', '$substrateLotNum', '$handleTreeMaterialNum', '$texwipeLogo', '$remarksInprocess', '$visualInpection', '$remarksVisual', '$manualHeadPulling', '$remarksManualHeadPulling', '$pulltestingMin', '$arrSample', '$remarksPullTesting', '$enterNA', '$productionStats', '$remarksProduction', '$status')");

		return $result;
	}
	public function updateSwab($prod_id, $status, $workorder, $date, $time, $shift, $operatorName, $teamLead, $machineNo, $product, $type, $InspectedBY, $maintenancecheced, $handle, $substrate, $handleTreeColor, $substrateLotNum, $handleTreeMaterialNum, $texwipeLogo, $remarksInprocess, $arrTemp, $actTempUpnLow, $TempUpnLow, $arrHeat, $actHeatingTime, $HeatingTime, $arrSwab, $actSwabHandleFixture, $SwabHandleFixture, $arrFixture, $actFixtureClosingTime, $FixtureClosingTime, $productionStats, $remarksProduction, $visualInpection, $remarksVisual, $manualHeadPulling, $remarksManualHeadPulling, $pulltestingMin, $arrSample, $remarksPullTesting, $enterNA)
	{
		$result = mysqli_query($this->dbh, "UPDATE `headforming`.`tbl_swabassembly`
SET
    `workorder` = '$workorder',
	`date` = '$date',
    `time` = '$time',
    `shift` = '$shift',
    `operatorName` = '$operatorName',
    `teamLead` = '$teamLead',
    `machineNo` = '$machineNo',
    `product` = '$product',
    `type` = '$type',
    `InspectedBY` = '$InspectedBY',
    `maintenancecheced` = '$maintenancecheced',
    `handle` = '$handle',
    `substrate` = '$substrate',
    `handleTreeColor` = '$handleTreeColor',
    `substrateLotNum` = '$substrateLotNum',
    `handleTreeMaterialNum` = '$handleTreeMaterialNum',
    `texwipeLogo` = '$texwipeLogo',
    `remarksInprocess` = '$remarksInprocess',
    `visualInpection` = '$visualInpection',
    `remarksVisual` = '$remarksVisual',
    `manualHeadPulling` = '$manualHeadPulling',
    `remarksManualHeadPulling` = '$remarksManualHeadPulling',
    `pulltestingMin` = '$pulltestingMin',
    `pulltestingSample` = '$arrSample',
    `remarksPullTesting` = '$remarksPullTesting',
	`enterNA` = '$enterNA',
    `productionStats` = '$productionStats',
    `remarksProduction` = '$remarksProduction',
    `status` = '$status'
WHERE `id` = '$prod_id'");

		return $result;
	}
	public function DuplicateCheckList3($transID)
	{
		$result = mysqli_query($this->dbh, "INSERT INTO `headforming`.`tbl_swabassembly` ( `workorder`, `date`, `time`, `shift`, `operatorName`, `teamLead`, `machineNo`, `product`, `type`, `InspectedBY`, `maintenancecheced`, `handle`, `substrate`, `handleTreeColor`, `substrateLotNum`, `handleTreeMaterialNum`, `texwipeLogo`, `remarksInprocess`, `visualInpection`, `remarksVisual`, `manualHeadPulling`, `remarksManualHeadPulling`, `pulltestingMin`, `pulltestingSample`, `remarksPullTesting`, `enterNA`, `productionStats`, `remarksProduction`, `status` )
		
		SELECT workorder, date, time, shift, operatorName, teamLead, machineNo, product, type, InspectedBY, maintenancecheced, handle, substrate, handleTreeColor, substrateLotNum, handleTreeMaterialNum, texwipeLogo, remarksInprocess, visualInpection, remarksVisual, manualHeadPulling, remarksManualHeadPulling, pulltestingMin, pulltestingSample, remarksPullTesting, enterNA, productionStats, remarksProduction, status FROM headforming.tbl_swabassembly WHERE id = '$transID'");

		return $result;
	}
	public function DeleteCheckList3($transID)
	{
		$result = mysqli_query($this->dbh, "UPDATE headforming.tbl_swabassembly SET status = '0' WHERE id = '$transID'");
		return $result;
	}
	public function GetCheckListSwab()
	{
		$result = mysqli_query($this->dbh, "SELECT * FROM tbl_swabassembly WHERE status != '0' OR status is null ORDER BY id DESC");
		return $result;
	}
	public function ViewEditchecklist3($id)
	{
		$result = mysqli_query($this->dbh, "SELECT * FROM headforming.tbl_swabassembly WHERE id = '$id'");
		return $result;
	}
	public function	yearThermalList()
	{
		$result = mysqli_query($this->dbh, "SELECT id,product, workorder, date FROM headforming.tbl_thermalbonding");
		return $result;
	}
	public function	yearSwabList()
	{
		$result = mysqli_query($this->dbh, "SELECT id,product, workorder, date FROM headforming.tbl_swabassembly");
		return $result;
	}
}
