<script>

    var count = 0;

    function inputValidation1() {
        var minUpperHeater = parseFloat(document.getElementById("minUpperHeater").value)-1;
        var maxUpperHeater = parseFloat(document.getElementById("maxUpperHeater").value)+1;
        var ActualUpperHeater = parseFloat(document.getElementById("ActualUpperHeater").value);

        if(minUpperHeater == "N/A" || maxUpperHeater >=  "n/a"){
            document.getElementById("remarks2").textContent = "Within standards";
            document.getElementById("remarks2").style.color = "green";
        } else if(ActualUpperHeater <= minUpperHeater || ActualUpperHeater >=  maxUpperHeater){
            document.getElementById("remarks1").textContent = "Out of specs, create change notice";
            document.getElementById("remarks1").style.color = "red";
            count++;
        } else {
            document.getElementById("remarks1").textContent = "Within standards";
            document.getElementById("remarks1").style.color = "green";
        }
    }

    function inputValidation2() {
        var minUpperHeater = parseFloat(document.getElementById("minLowerHeater").value)-1;
        var maxUpperHeater = parseFloat(document.getElementById("maxLowerHeater").value)+1;
        var ActualUpperHeater = parseFloat(document.getElementById("ActualLowerHeater").value);

        if(minUpperHeater == "N/A" || maxUpperHeater >=  "n/a"){
            document.getElementById("remarks2").textContent = "Within standards";
            document.getElementById("remarks2").style.color = "green";
        } else if(ActualUpperHeater <= minUpperHeater || ActualUpperHeater >=  maxUpperHeater){
            document.getElementById("remarks2").textContent = "Out of specs, create change notice";
            document.getElementById("remarks2").style.color = "red";
        } else {
            document.getElementById("remarks2").textContent = "Within standards";
            document.getElementById("remarks2").style.color = "green";
           
        }
    }

    function inputValidation3(){
        var minUpperHeater = parseFloat(document.getElementById("minHeatingTime").value)-1;
        var maxUpperHeater = parseFloat(document.getElementById("maxHeatingTime").value)+1;
        var ActualUpperHeater = parseFloat(document.getElementById("ActualHeatingTime").value);

        if(minUpperHeater == "N/A" || maxUpperHeater >=  "n/a"){
            document.getElementById("remarks3").textContent = "Within standards";
            document.getElementById("remarks3").style.color = "green";
        } else if(ActualUpperHeater <= minUpperHeater || ActualUpperHeater >=  maxUpperHeater){
            document.getElementById("remarks3").textContent = "Out of specs, create change notice";
            document.getElementById("remarks3").style.color = "red";
        } else {
            document.getElementById("remarks3").textContent = "Within standards";
            document.getElementById("remarks3").style.color = "green";
           
        }  
    }

    function inputValidation4(){
                var minUpperHeater = parseFloat(document.getElementById("minTimeLag").value)-1;
        var maxUpperHeater = parseFloat(document.getElementById("maxTimeLag").value)+1;
        var ActualUpperHeater = parseFloat(document.getElementById("ActualTimeLag").value);

        if(minUpperHeater == "N/A" || maxUpperHeater >=  "n/a"){
            document.getElementById("remarks4").textContent = "Within standards";
            document.getElementById("remarks4").style.color = "green";
        } else if(ActualUpperHeater <= minUpperHeater || ActualUpperHeater >=  maxUpperHeater){
            document.getElementById("remarks4").textContent = "Out of specs, create change notice";
            document.getElementById("remarks4").style.color = "red";
        } else {
            document.getElementById("remarks4").textContent = "Within standards";
            document.getElementById("remarks4").style.color = "green";
           
        } 
    }

    function inputValidation5(){
        var minUpperHeater = parseFloat(document.getElementById("minTimeClosing").value)-1;
        var maxUpperHeater = parseFloat(document.getElementById("maxTimeClosing").value)+1;
        var ActualUpperHeater = parseFloat(document.getElementById("ActualTimeClosing").value);

        if(minUpperHeater == "N/A" || maxUpperHeater >=  "n/a"){
            document.getElementById("remarks5").textContent = "Within standards";
            document.getElementById("remarks5").style.color = "green";
        } else if(ActualUpperHeater <= minUpperHeater || ActualUpperHeater >=  maxUpperHeater){
            document.getElementById("remarks5").textContent = "Out of specs, create change notice";
            document.getElementById("remarks5").style.color = "red";
        } else {
            document.getElementById("remarks5").textContent = "Within standards";
            document.getElementById("remarks5").style.color = "green";
        } 
    }

    function inputValidation6(){
        var minUpperHeater = parseFloat(document.getElementById("minCuttingForce").value)-1;
        var maxUpperHeater = parseFloat(document.getElementById("maxCuttingForce").value)+1;
        var ActualUpperHeater = parseFloat(document.getElementById("ActualCuttingForce").value);

        if(minUpperHeater == "N/A" || maxUpperHeater >=  "n/a"){
            document.getElementById("remarks6").textContent = "Within standards";
            document.getElementById("remarks6").style.color = "green";
        } else if(ActualUpperHeater <= minUpperHeater || ActualUpperHeater >=  maxUpperHeater){
            document.getElementById("remarks6").textContent = "Out of specs, create change notice";
            document.getElementById("remarks6").style.color = "red";
        } else {
            document.getElementById("remarks6").textContent = "Within standards";
            document.getElementById("remarks6").style.color = "green";
           
        } 
    }

    function inputValidation7(){
        var minUpperHeater = parseFloat(document.getElementById("minSealingForce").value)-1;
        var maxUpperHeater = parseFloat(document.getElementById("maxSealingForce").value)+1;
        var ActualUpperHeater = parseFloat(document.getElementById("ActualSealingForce").value);

        if(minUpperHeater == "N/A" || maxUpperHeater >=  "n/a"){
            document.getElementById("remarks7").textContent = "Within standards";
            document.getElementById("remarks7").style.color = "green";
        } else if(ActualUpperHeater <= minUpperHeater || ActualUpperHeater >=  maxUpperHeater){
            document.getElementById("remarks7").textContent = "Out of specs, create change notice";
            document.getElementById("remarks7").style.color = "red";
        } else {
            document.getElementById("remarks7").textContent = "Within standards";
            document.getElementById("remarks7").style.color = "green";
           
        } 
    }

    function inputValidation8(){
        var minUpperHeater = parseFloat(document.getElementById("minSealingTime").value)-1;
        var maxUpperHeater = parseFloat(document.getElementById("maxSealingTime").value)+1;
        var ActualUpperHeater = parseFloat(document.getElementById("ActualSealingTime").value);

        if(minUpperHeater == "N/A" || maxUpperHeater >=  "n/a"){
            document.getElementById("remarks8").textContent = "Within standards";
            document.getElementById("remarks8").style.color = "green";
        } else if(ActualUpperHeater <= minUpperHeater || ActualUpperHeater >=  maxUpperHeater){
            document.getElementById("remarks8").textContent = "Out of specs, create change notice";
            document.getElementById("remarks8").style.color = "red";
        } else {
            document.getElementById("remarks8").textContent = "Within standards";
            document.getElementById("remarks8").style.color = "green";
        } 
    }

    function inputValidation9(){
        var minUpperHeater = parseFloat(document.getElementById("minCuttingSpeed").value)-1;
        var maxUpperHeater = parseFloat(document.getElementById("maxCuttingSpeed").value)+1;
        var ActualUpperHeater = parseFloat(document.getElementById("ActualCuttingSpeed").value);

        if(minUpperHeater == "N/A" || maxUpperHeater >=  "n/a"){
            document.getElementById("remarks9").textContent = "Within standards";
            document.getElementById("remarks9").style.color = "green";
        } else if(ActualUpperHeater <= minUpperHeater || ActualUpperHeater >=  maxUpperHeater){
            document.getElementById("remarks9").textContent = "Out of specs, create change notice";
            document.getElementById("remarks9").style.color = "red";
        } else {
            document.getElementById("remarks9").textContent = "Within standards";
            document.getElementById("remarks9").style.color = "green";
        } 
    }

    function inputValidation10(){
        var minUpperHeater = parseFloat(document.getElementById("minApproachingPosition").value)-1;
        var maxUpperHeater = parseFloat(document.getElementById("maxApproachingPosition").value)+1;
        var ActualUpperHeater = parseFloat(document.getElementById("ActualApproachingPosition").value);

        if(minUpperHeater == "N/A" || maxUpperHeater >=  "n/a"){
            document.getElementById("remarks10").textContent = "Within standards";
            document.getElementById("remarks10").style.color = "green";
        } else if(ActualUpperHeater <= minUpperHeater || ActualUpperHeater >=  maxUpperHeater){
            document.getElementById("remarks10").textContent = "Out of specs, create change notice";
            document.getElementById("remarks10").style.color = "red";
        } else {
            document.getElementById("remarks10").textContent = "Within standards";
            document.getElementById("remarks10").style.color = "green";
        } 
    }

    function inputValidation11(){
        var minUpperHeater = parseFloat(document.getElementById("minSealingPositionSpeed").value)-1;
        var maxUpperHeater = parseFloat(document.getElementById("maxSealingPositionSpeed").value)+1;
        var ActualUpperHeater = parseFloat(document.getElementById("ActualSealingPositionSpeed").value);

        if(minUpperHeater == "N/A" || maxUpperHeater >=  "n/a"){
            document.getElementById("remarks11").textContent = "Within standards";
            document.getElementById("remarks11").style.color = "green";
        } else if(ActualUpperHeater <= minUpperHeater || ActualUpperHeater >=  maxUpperHeater){
            document.getElementById("remarks11").textContent = "Out of specs, create change notice";
            document.getElementById("remarks11").style.color = "red";
        } else {
            document.getElementById("remarks11").textContent = "Within standards";
            document.getElementById("remarks11").style.color = "green";
        } 
    }

    function inputValidation12(){
        var minUpperHeater = parseFloat(document.getElementById("minSealingPosition").value)-1;
        var maxUpperHeater = parseFloat(document.getElementById("maxSealingPosition").value)+1;
        var ActualUpperHeater = parseFloat(document.getElementById("ActualSealingPosition").value);

        if(minUpperHeater == "N/A" || maxUpperHeater >=  "n/a"){
            document.getElementById("remarks12").textContent = "Within standards";
            document.getElementById("remarks12").style.color = "green";
        } else if(ActualUpperHeater <= minUpperHeater || ActualUpperHeater >=  maxUpperHeater){
            document.getElementById("remarks12").textContent = "Out of specs, create change notice";
            document.getElementById("remarks12").style.color = "red";
        } else {
            document.getElementById("remarks12").textContent = "Within standards";
            document.getElementById("remarks12").style.color = "green";
        } 
    }

    var checkbox = document.getElementById("myCheckbox");

    checkbox.addEventListener("change", function() {
        var message = document.getElementById("message");
        if (checkbox.checked) {
            document.getElementById("remarkscheck").textContent = "Within standards";
            document.getElementById("remarkscheck").style.color = "green";
        } else {
            document.getElementById("remarkscheck").textContent = "Out of specs, create change notice";
            document.getElementById("remarkscheck").style.color = "red";
        }
    });

    function inputValidation13(){
        var minUpperHeater = parseFloat(document.getElementById("minSealingForceMode").value)-1;
        var maxUpperHeater = parseFloat(document.getElementById("maxSealingForceMode").value)+1;
        var ActualUpperHeater = parseFloat(document.getElementById("ActualSealingForceMode").value);

        if(minUpperHeater == "N/A" || maxUpperHeater >=  "n/a"){
            document.getElementById("remarks13").textContent = "Within standards";
            document.getElementById("remarks13").style.color = "green";
        } else if(ActualUpperHeater <= minUpperHeater || ActualUpperHeater >=  maxUpperHeater){
            document.getElementById("remarks13").textContent = "Out of specs, create change notice";
            document.getElementById("remarks13").style.color = "red";
        } else {
            document.getElementById("remarks13").textContent = "Within standards";
            document.getElementById("remarks13").style.color = "green";
        } 
    }

    function inputValidation14(){
        var minUpperHeater = parseFloat(document.getElementById("minSealingTimeMode").value)-1;
        var maxUpperHeater = parseFloat(document.getElementById("maxSealingTimeMode").value)+1;
        var ActualUpperHeater = parseFloat(document.getElementById("ActualSealingTimeMode").value);

        if(minUpperHeater == "N/A" || maxUpperHeater >=  "n/a"){
            document.getElementById("remarks14").textContent = "Within standards";
            document.getElementById("remarks14").style.color = "green";
        } else if(ActualUpperHeater <= minUpperHeater || ActualUpperHeater >=  maxUpperHeater){
            document.getElementById("remarks14").textContent = "Out of specs, create change notice";
            document.getElementById("remarks14").style.color = "red";
        } else {
            document.getElementById("remarks14").textContent = "Within standards";
            document.getElementById("remarks14").style.color = "green";
        } 
    }


    function inputValidation15(){
        var minUpperHeater = parseFloat(document.getElementById("minCuttingSpeedMode").value)-1;
        var maxUpperHeater = parseFloat(document.getElementById("maxCuttingSpeedMode").value)+1;
        var ActualUpperHeater = parseFloat(document.getElementById("ActualCuttingSpeedMode").value);

        if(minUpperHeater == "N/A" || maxUpperHeater >=  "n/a"){
            document.getElementById("remarks15").textContent = "Within standards";
            document.getElementById("remarks15").style.color = "green";
        } else if(ActualUpperHeater <= minUpperHeater || ActualUpperHeater >=  maxUpperHeater){
            document.getElementById("remarks15").textContent = "Out of specs, create change notice";
            document.getElementById("remarks15").style.color = "red";
        } else {
            document.getElementById("remarks15").textContent = "Within standards";
            document.getElementById("remarks15").style.color = "green";
        } 
    }

    function inputValidation16(){
        var minUpperHeater = parseFloat(document.getElementById("minApproachingPositionMode").value)-1;
        var maxUpperHeater = parseFloat(document.getElementById("maxApproachingPositionMode").value)+1;
        var ActualUpperHeater = parseFloat(document.getElementById("ActualApproachingPositionMode").value);

        if(minUpperHeater == "N/A" || maxUpperHeater >=  "n/a"){
            document.getElementById("remarks16").textContent = "Within standards";
            document.getElementById("remarks16").style.color = "green";
        } else if(ActualUpperHeater <= minUpperHeater || ActualUpperHeater >=  maxUpperHeater){
            document.getElementById("remarks16").textContent = "Out of specs, create change notice";
            document.getElementById("remarks16").style.color = "red";
        } else {
            document.getElementById("remarks16").textContent = "Within standards";
            document.getElementById("remarks16").style.color = "green";
        } 
    }

    function inputValidation17(){
        var minUpperHeater = parseFloat(document.getElementById("minSealingPositionSpeedMode").value)-1;
        var maxUpperHeater = parseFloat(document.getElementById("maxSealingPositionSpeedMode").value)+1;
        var ActualUpperHeater = parseFloat(document.getElementById("ActualSealingPositionSpeedMode").value);

        if(minUpperHeater == "N/A" || maxUpperHeater >=  "n/a"){
            document.getElementById("remarks17").textContent = "Within standards";
            document.getElementById("remarks17").style.color = "green";
        } else if(ActualUpperHeater <= minUpperHeater || ActualUpperHeater >=  maxUpperHeater){
            document.getElementById("remarks17").textContent = "Out of specs, create change notice";
            document.getElementById("remarks17").style.color = "red";
        } else {
            document.getElementById("remarks17").textContent = "Within standards";
            document.getElementById("remarks17").style.color = "green";
        } 
    }


    function inputValidationmold2(){
        var minUpperHeater = parseFloat(document.getElementById("moldOpenSpeed").value);
        var ActualUpperHeater = parseFloat(document.getElementById("actualmoldOpenSpeed").value);

        if(minUpperHeater == "N/A"){
            document.getElementById("moldRemarks").textContent = "Within standards";
            document.getElementById("moldRemarks").style.color = "green";
        } else if(ActualUpperHeater != minUpperHeater ){
            document.getElementById("moldRemarks").textContent = "Out of specs, create change notice";
            document.getElementById("moldRemarks").style.color = "red";
        } else {
            document.getElementById("moldRemarks").textContent = "Within standards";
            document.getElementById("moldRemarks").style.color = "green";
        } 
    }

    function inputValidation18(){
        var minUpperHeater = parseFloat(document.getElementById("minWaterTemp").value)-1;
        var maxUpperHeater = parseFloat(document.getElementById("maxWaterTemp").value)+1;
        var ActualUpperHeater = parseFloat(document.getElementById("ActualWaterTemp").value);

        if(minUpperHeater == "N/A" || maxUpperHeater >=  "n/a"){
            document.getElementById("remarks18").textContent = "Within standards";
            document.getElementById("remarks18").style.color = "green";
        } else if(ActualUpperHeater <= minUpperHeater || ActualUpperHeater >=  maxUpperHeater){
            document.getElementById("remarks18").textContent = "Out of specs, create change notice";
            document.getElementById("remarks18").style.color = "red";
        } else {
            document.getElementById("remarks18").textContent = "Within standards";
            document.getElementById("remarks18").style.color = "green";
        } 
    }

    function inputValidation19(){
        var minUpperHeater = parseFloat(document.getElementById("minAirPressure").value)-1;
        var maxUpperHeater = parseFloat(document.getElementById("maxAirPressure").value)+1;
        var ActualUpperHeater = parseFloat(document.getElementById("ActualAirPressure").value);

        if(minUpperHeater == "N/A" || maxUpperHeater >=  "n/a"){
            document.getElementById("remarks19").textContent = "Within standards";
            document.getElementById("remarks19").style.color = "green";
        } else if(ActualUpperHeater <= minUpperHeater || ActualUpperHeater >=  maxUpperHeater){
            document.getElementById("remarks19").textContent = "Out of specs, create change notice";
            document.getElementById("remarks19").style.color = "red";
        } else {
            document.getElementById("remarks19").textContent = "Within standards";
            document.getElementById("remarks19").style.color = "green";
        } 
    }

    function inputValidation20(){
        var minUpperHeater = parseFloat(document.getElementById("minHeadformingUpperHeaterTemp").value)-1;
        var maxUpperHeater = parseFloat(document.getElementById("maxHeadformingUpperHeaterTemp").value)+1;
        var ActualUpperHeater = parseFloat(document.getElementById("ActualHeadformingUpperHeaterTemp").value);

        if(minUpperHeater == "N/A" || maxUpperHeater >=  "n/a"){
            document.getElementById("remarks20").textContent = "Within standards";
            document.getElementById("remarks20").style.color = "green";
        } else if(ActualUpperHeater <= minUpperHeater || ActualUpperHeater >=  maxUpperHeater){
            document.getElementById("remarks20").textContent = "Out of specs, create change notice";
            document.getElementById("remarks20").style.color = "red";
        } else {
            document.getElementById("remarks20").textContent = "Within standards";
            document.getElementById("remarks20").style.color = "green";
        } 
    }

    function inputValidation21(){
         var minUpperHeater = parseFloat(document.getElementById("minHeadformingLowerHeaterTemp").value)-1;
        var maxUpperHeater = parseFloat(document.getElementById("maxHeadformingLowerHeaterTemp").value)+1;
        var ActualUpperHeater = parseFloat(document.getElementById("ActualHeadformingLowerHeaterTemp").value);

        if(minUpperHeater == "N/A" || maxUpperHeater >=  "n/a"){
            document.getElementById("remarks21").textContent = "Within standards";
            document.getElementById("remarks21").style.color = "green";
        } else if(ActualUpperHeater <= minUpperHeater || ActualUpperHeater >=  maxUpperHeater){
            document.getElementById("remarks21").textContent = "Out of specs, create change notice";
            document.getElementById("remarks21").style.color = "red";
        } else {
            document.getElementById("remarks21").textContent = "Within standards";
            document.getElementById("remarks21").style.color = "green";
        }        
    }

    function inputValidation22(){
        var minUpperHeater = parseFloat(document.getElementById("minHeadformingUpperMoldTemp").value)-1;
        var maxUpperHeater = parseFloat(document.getElementById("maxHeadformingUpperMoldTemp").value)+1;
        var ActualUpperHeater = parseFloat(document.getElementById("ActualHeadformingUpperMoldTemp").value);

        if(minUpperHeater == "N/A" || maxUpperHeater >=  "n/a"){
            document.getElementById("remarks22").textContent = "Within standards";
            document.getElementById("remarks22").style.color = "green";
        } else if(ActualUpperHeater <= minUpperHeater || ActualUpperHeater >=  maxUpperHeater){
            document.getElementById("remarks22").textContent = "Out of specs, create change notice";
            document.getElementById("remarks22").style.color = "red";
        } else {
            document.getElementById("remarks22").textContent = "Within standards";
            document.getElementById("remarks22").style.color = "green";
        }             
    }

    function inputValidation23(){
        var minUpperHeater = parseFloat(document.getElementById("minHeadformingLowerMoldTemp").value)-1;
        var maxUpperHeater = parseFloat(document.getElementById("maxHeadformingLowerMoldTemp").value)+1;
        var ActualUpperHeater = parseFloat(document.getElementById("ActualHeadformingLowerMoldTemp").value);

        if(minUpperHeater == "N/A" || maxUpperHeater >=  "n/a"){
            document.getElementById("remarks23").textContent = "Within standards";
            document.getElementById("remarks23").style.color = "green";
        } else if(ActualUpperHeater <= minUpperHeater || ActualUpperHeater >=  maxUpperHeater){
            document.getElementById("remarks23").textContent = "Out of specs, create change notice";
            document.getElementById("remarks23").style.color = "red";
        } else {
            document.getElementById("remarks23").textContent = "Within standards";
            document.getElementById("remarks23").style.color = "green";
        }             
    }

    function machineRunning(){
        var minUpperHeater = parseFloat(document.getElementById("machineRunning").value);
        var ActualUpperHeater = parseFloat(document.getElementById("actualmachineRunning").value);

        if(minUpperHeater == "N/A"){
            document.getElementById("macnineRunning").textContent = "Within standards";
            document.getElementById("macnineRunning").style.color = "green";
        } else if(ActualUpperHeater != minUpperHeater ){
            document.getElementById("macnineRunning").textContent = "Out of specs, create change notice";
            document.getElementById("macnineRunning").style.color = "red";
        } else {
            document.getElementById("macnineRunning").textContent = "Within standards";
            document.getElementById("macnineRunning").style.color = "green";
        } 
    }

    function inputValidation24(){
        var minUpperHeater = parseFloat(document.getElementById("minHeatingOil").value)-1;
        var maxUpperHeater = parseFloat(document.getElementById("maxHeatingOil").value)+1;
        var ActualUpperHeater = parseFloat(document.getElementById("ActualHeadformingLowerMoldTemp").value);

        if(minUpperHeater == "N/A" || maxUpperHeater >=  "n/a"){
            document.getElementById("remarks24").textContent = "Within standards";
            document.getElementById("remarks24").style.color = "green";
        } else if(ActualUpperHeater <= minUpperHeater || ActualUpperHeater >=  maxUpperHeater){
            document.getElementById("remarks24").textContent = "Out of specs, create change notice";
            document.getElementById("remarks24").style.color = "red";
        } else {
            document.getElementById("remarks24").textContent = "Within standards";
            document.getElementById("remarks24").style.color = "green";
        }             
    }

    function inputValidation25(){
        var minUpperHeater = parseFloat(document.getElementById("minHeatingTank").value)-1;
        var maxUpperHeater = parseFloat(document.getElementById("maxHeatingTank").value)+1;
        var ActualUpperHeater = parseFloat(document.getElementById("ActualHeatingTank").value);

        if(minUpperHeater == "N/A" || maxUpperHeater >=  "n/a"){
            document.getElementById("remarks25").textContent = "Within standards";
            document.getElementById("remarks25").style.color = "green";
        } else if(ActualUpperHeater <= minUpperHeater || ActualUpperHeater >=  maxUpperHeater){
            document.getElementById("remarks25").textContent = "Out of specs, create change notice";
            document.getElementById("remarks25").style.color = "red";
        } else {
            document.getElementById("remarks25").textContent = "Within standards";
            document.getElementById("remarks25").style.color = "green";
        }             
    }

    function inputValidation26(){
        var minUpperHeater = parseFloat(document.getElementById("minCoolingWater").value)-1;
        var maxUpperHeater = parseFloat(document.getElementById("maxCoolingWater").value)+1;
        var ActualUpperHeater = parseFloat(document.getElementById("ActualCoolingWater").value);

        if(minUpperHeater == "N/A" || maxUpperHeater >=  "n/a"){
            document.getElementById("remarks26").textContent = "Within standards";
            document.getElementById("remarks26").style.color = "green";
        } else if(ActualUpperHeater <= minUpperHeater || ActualUpperHeater >=  maxUpperHeater){
            document.getElementById("remarks26").textContent = "Out of specs, create change notice";
            document.getElementById("remarks26").style.color = "red";
        } else {
            document.getElementById("remarks26").textContent = "Within standards";
            document.getElementById("remarks26").style.color = "green";
        }          
    }

    function inputValidation27(){
        var min = parseFloat(document.getElementById("minTotalLength").value)-1;
        var max = parseFloat(document.getElementById("maxTotalLength").value)+1;
        var Actual1 = parseFloat(document.getElementById("ActualTotalLength1").value);
        var Actual2 = parseFloat(document.getElementById("ActualTotalLength2").value);
        var Actual3 = parseFloat(document.getElementById("ActualTotalLength3").value);
        var Actual4 = parseFloat(document.getElementById("ActualTotalLength4").value);
        var Actual5 = parseFloat(document.getElementById("ActualTotalLength5").value);

        if(min == "N/A" || max >=  "n/a"){
            document.getElementById("remarks27").textContent = "Within standards";
            document.getElementById("remarks27").style.color = "green";
        } else if(Actual1 <= min || Actual1 >=  max){
            document.getElementById("remarks27").textContent = "Out of specs, create change notice";
            document.getElementById("remarks27").style.color = "red";
        } else if(Actual2 <= min || Actual2 >=  max){
            document.getElementById("remarks27").textContent = "Out of specs, create change notice";
            document.getElementById("remarks27").style.color = "red";
        } else if(Actual3 <= min || Actual3 >=  max){
            document.getElementById("remarks27").textContent = "Out of specs, create change notice";
            document.getElementById("remarks27").style.color = "red";
        } else if(Actual4 <= min || Actual4 >=  max){
            document.getElementById("remarks27").textContent = "Out of specs, create change notice";
            document.getElementById("remarks27").style.color = "red";
        } else if(Actual5 <= min || Actual5 >=  max){
            document.getElementById("remarks27").textContent = "Out of specs, create change notice";
            document.getElementById("remarks27").style.color = "red";
        } else {
            document.getElementById("remarks27").textContent = "Within standards";
            document.getElementById("remarks27").style.color = "green";
        }          
    }

    function inputValidation28(){
        var min = parseFloat(document.getElementById("minSwabHeadLength").value)-1;
        var max = parseFloat(document.getElementById("maxSwabHeadLength").value)+1;
        var Actual1 = parseFloat(document.getElementById("actualSwabHeadLength1").value);
        var Actual2 = parseFloat(document.getElementById("actualSwabHeadLength2").value);
        var Actual3 = parseFloat(document.getElementById("actualSwabHeadLength3").value);
        var Actual4 = parseFloat(document.getElementById("actualSwabHeadLength4").value);
        var Actual5 = parseFloat(document.getElementById("actualSwabHeadLength5").value);

        if(min == "N/A" || max >=  "n/a"){
            document.getElementById("remarks28").textContent = "Within standards";
            document.getElementById("remarks28").style.color = "green";
        } else if(Actual1 <= min || Actual1 >=  max){
            document.getElementById("remarks28").textContent = "Out of specs, create change notice";
            document.getElementById("remarks28").style.color = "red";
        } else if(Actual2 <= min || Actual2 >=  max){
            document.getElementById("remarks28").textContent = "Out of specs, create change notice";
            document.getElementById("remarks28").style.color = "red";
        } else if(Actual3 <= min || Actual3 >=  max){
            document.getElementById("remarks28").textContent = "Out of specs, create change notice";
            document.getElementById("remarks28").style.color = "red";
        } else if(Actual4 <= min || Actual4 >=  max){
            document.getElementById("remarks28").textContent = "Out of specs, create change notice";
            document.getElementById("remarks28").style.color = "red";
        } else if(Actual5 <= min || Actual5 >=  max){
            document.getElementById("remarks28").textContent = "Out of specs, create change notice";
            document.getElementById("remarks28").style.color = "red";
        } else {
            document.getElementById("remarks28").textContent = "Within standards";
            document.getElementById("remarks28").style.color = "green";
        }          
    }

    function inputValidation29(){
        var min = parseFloat(document.getElementById("minSwabHeadWidth").value)-1;
        var max = parseFloat(document.getElementById("maxSwabHeadWidth").value)+1;
        var Actual1 = parseFloat(document.getElementById("actualSwabHeadWidth1").value);
        var Actual2 = parseFloat(document.getElementById("actualSwabHeadWidth2").value);
        var Actual3 = parseFloat(document.getElementById("actualSwabHeadWidth3").value);
        var Actual4 = parseFloat(document.getElementById("actualSwabHeadWidth4").value);
        var Actual5 = parseFloat(document.getElementById("actualSwabHeadWidth5").value);

        if(min == "N/A" || max >=  "n/a"){
            document.getElementById("remarks29").textContent = "Within standards";
            document.getElementById("remarks29").style.color = "green";
        } else if(Actual1 <= min || Actual1 >=  max){
            document.getElementById("remarks29").textContent = "Out of specs, create change notice";
            document.getElementById("remarks29").style.color = "red";
        } else if(Actual2 <= min || Actual2 >=  max){
            document.getElementById("remarks29").textContent = "Out of specs, create change notice";
            document.getElementById("remarks29").style.color = "red";
        } else if(Actual3 <= min || Actual3 >=  max){
            document.getElementById("remarks29").textContent = "Out of specs, create change notice";
            document.getElementById("remarks29").style.color = "red";
        } else if(Actual4 <= min || Actual4 >=  max){
            document.getElementById("remarks29").textContent = "Out of specs, create change notice";
            document.getElementById("remarks29").style.color = "red";
        } else if(Actual5 <= min || Actual5 >=  max){
            document.getElementById("remarks29").textContent = "Out of specs, create change notice";
            document.getElementById("remarks29").style.color = "red";
        } else {
            document.getElementById("remarks29").textContent = "Within standards";
            document.getElementById("remarks29").style.color = "green";
        }          
    }

    function inputValidation30(){
        var min = parseFloat(document.getElementById("minSwabHeadThickness").value)-1;
        var max = parseFloat(document.getElementById("maxSwabHeadThickness").value)+1;
        var Actual1 = parseFloat(document.getElementById("actualSwabHeadThickness1").value);
        var Actual2 = parseFloat(document.getElementById("actualSwabHeadThickness2").value);
        var Actual3 = parseFloat(document.getElementById("actualSwabHeadThickness3").value);
        var Actual4 = parseFloat(document.getElementById("actualSwabHeadThickness4").value);
        var Actual5 = parseFloat(document.getElementById("actualSwabHeadThickness5").value);

        if(min == "N/A" || max >=  "n/a"){
            document.getElementById("remarks30").textContent = "Within standards";
            document.getElementById("remarks30").style.color = "green";
        } else if(Actual1 <= min || Actual1 >=  max){
            document.getElementById("remarks30").textContent = "Out of specs, create change notice";
            document.getElementById("remarks30").style.color = "red";
        } else if(Actual2 <= min || Actual2 >=  max){
            document.getElementById("remarks30").textContent = "Out of specs, create change notice";
            document.getElementById("remarks30").style.color = "red";
        } else if(Actual3 <= min || Actual3 >=  max){
            document.getElementById("remarks30").textContent = "Out of specs, create change notice";
            document.getElementById("remarks30").style.color = "red";
        } else if(Actual4 <= min || Actual4 >=  max){
            document.getElementById("remarks30").textContent = "Out of specs, create change notice";
            document.getElementById("remarks30").style.color = "red";
        } else if(Actual5 <= min || Actual5 >=  max){
            document.getElementById("remarks30").textContent = "Out of specs, create change notice";
            document.getElementById("remarks30").style.color = "red";
        } else {
            document.getElementById("remarks30").textContent = "Within standards";
            document.getElementById("remarks30").style.color = "green";
        }          
    }

    function inputValidation31(){
        var min = parseFloat(document.getElementById("minSwabHeadWidth2").value)-1;
        var max = parseFloat(document.getElementById("maxSwabHeadWidth2").value)+1;
        var Actual1 = parseFloat(document.getElementById("actualSwabHeadWidth21").value);
        var Actual2 = parseFloat(document.getElementById("actualSwabHeadWidth22").value);
        var Actual3 = parseFloat(document.getElementById("actualSwabHeadWidth23").value);
        var Actual4 = parseFloat(document.getElementById("actualSwabHeadWidth24").value);
        var Actual5 = parseFloat(document.getElementById("actualSwabHeadWidth25").value);

        if(min == "N/A" || max >=  "n/a"){
            document.getElementById("remarks31").textContent = "Within standards";
            document.getElementById("remarks31").style.color = "green";
        } else if(Actual1 <= min || Actual1 >=  max){
            document.getElementById("remarks31").textContent = "Out of specs, create change notice";
            document.getElementById("remarks31").style.color = "red";
        } else if(Actual2 <= min || Actual2 >=  max){
            document.getElementById("remarks31").textContent = "Out of specs, create change notice";
            document.getElementById("remarks31").style.color = "red";
        } else if(Actual3 <= min || Actual3 >=  max){
            document.getElementById("remarks31").textContent = "Out of specs, create change notice";
            document.getElementById("remarks31").style.color = "red";
        } else if(Actual4 <= min || Actual4 >=  max){
            document.getElementById("remarks31").textContent = "Out of specs, create change notice";
            document.getElementById("remarks31").style.color = "red";
        } else if(Actual5 <= min || Actual5 >=  max){
            document.getElementById("remarks31").textContent = "Out of specs, create change notice";
            document.getElementById("remarks31").style.color = "red";
        } else {
            document.getElementById("remarks31").textContent = "Within standards";
            document.getElementById("remarks31").style.color = "green";
        }          
    }

   function inputValidation32(){
        var min = parseFloat(document.getElementById("minSwabHeadThickness2").value)-1;
        var max = parseFloat(document.getElementById("maxSwabHeadThickness2").value)+1;
        var Actual1 = parseFloat(document.getElementById("actualSwabHeadThickness21").value);
        var Actual2 = parseFloat(document.getElementById("actualSwabHeadThickness22").value);
        var Actual3 = parseFloat(document.getElementById("actualSwabHeadThickness23").value);
        var Actual4 = parseFloat(document.getElementById("actualSwabHeadThickness24").value);
        var Actual5 = parseFloat(document.getElementById("actualSwabHeadThickness25").value);

        if(min == "N/A" || max >=  "n/a"){
            document.getElementById("remarks32").textContent = "Within standards";
            document.getElementById("remarks32").style.color = "green";
        } else if(Actual1 <= min || Actual1 >=  max){
            document.getElementById("remarks32").textContent = "Out of specs, create change notice";
            document.getElementById("remarks32").style.color = "red";
        } else if(Actual2 <= min || Actual2 >=  max){
            document.getElementById("remarks32").textContent = "Out of specs, create change notice";
            document.getElementById("remarks32").style.color = "red";
        } else if(Actual3 <= min || Actual3 >=  max){
            document.getElementById("remarks32").textContent = "Out of specs, create change notice";
            document.getElementById("remarks32").style.color = "red";
        } else if(Actual4 <= min || Actual4 >=  max){
            document.getElementById("remarks32").textContent = "Out of specs, create change notice";
            document.getElementById("remarks32").style.color = "red";
        } else if(Actual5 <= min || Actual5 >=  max){
            document.getElementById("remarks32").textContent = "Out of specs, create change notice";
            document.getElementById("remarks32").style.color = "red";
        } else {
            document.getElementById("remarks32").textContent = "Within standards";
            document.getElementById("remarks32").style.color = "green";
        }          
    }


   function inputValidation33(){
        var min = parseFloat(document.getElementById("minSwabHeadDiameter").value)-1;
        var max = parseFloat(document.getElementById("maxSwabHeadDiameter").value)+1;
        var Actual1 = parseFloat(document.getElementById("actualSwabHeadDiameter1").value);
        var Actual2 = parseFloat(document.getElementById("actualSwabHeadDiameter2").value);
        var Actual3 = parseFloat(document.getElementById("actualSwabHeadDiameter3").value);
        var Actual4 = parseFloat(document.getElementById("actualSwabHeadDiameter4").value);
        var Actual5 = parseFloat(document.getElementById("actualSwabHeadDiameter5").value);

        if(min == "N/A" || max >=  "n/a"){
            document.getElementById("remarks33").textContent = "Within standards";
            document.getElementById("remarks33").style.color = "green";
        } else if(Actual1 <= min || Actual1 >=  max){
            document.getElementById("remarks33").textContent = "Out of specs, create change notice";
            document.getElementById("remarks33").style.color = "red";
        } else if(Actual2 <= min || Actual2 >=  max){
            document.getElementById("remarks33").textContent = "Out of specs, create change notice";
            document.getElementById("remarks33").style.color = "red";
        } else if(Actual3 <= min || Actual3 >=  max){
            document.getElementById("remarks33").textContent = "Out of specs, create change notice";
            document.getElementById("remarks33").style.color = "red";
        } else if(Actual4 <= min || Actual4 >=  max){
            document.getElementById("remarks33").textContent = "Out of specs, create change notice";
            document.getElementById("remarks33").style.color = "red";
        } else if(Actual5 <= min || Actual5 >=  max){
            document.getElementById("remarks33").textContent = "Out of specs, create change notice";
            document.getElementById("remarks33").style.color = "red";
        } else {
            document.getElementById("remarks33").textContent = "Within standards";
            document.getElementById("remarks33").style.color = "green";
        }          
    }

























</script>







































