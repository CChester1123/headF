<script type="text/javascript">

function validateCutting() {
    var inputs = document.getElementsByClassName('cuttingforce-value');
    var cuttingforcevalidation = document.getElementById('cuttingforcevalidation');
    var val1 = inputs[0].value - 0.1;
    var val2 = inputs[1].value + 0.1;
    var val3 = inputs[2].value;

    if (val1 == "n/a" || val1 == "N/A") {
        cuttingforcevalidation.textContent = 'Within standards';
        cuttingforcevalidation.style.color = 'green';
        event.preventDefault();
    } else if (val3 > val1 && val3 < val2) {
        cuttingforcevalidation.textContent = 'Within standards';
        cuttingforcevalidation.style.color = 'green';
        event.preventDefault();
    } else {
        cuttingforcevalidation.textContent = 'Out of specs, create change notice';
        cuttingforcevalidation.style.color = 'red';
        event.preventDefault();
    }
}

function validatesealingtimer() {
    var inputs = document.getElementsByClassName('sealingtime-value');
    var sealingtimevalidation = document.getElementById('sealingtimevalidation');
    var val1 = inputs[0].value - 0.1;
    var val2 = inputs[1].value + 0.1;
    var val3 = inputs[2].value;

    if (val1 == "n/a" || val1 == "N/A") {
        sealingtimevalidation.textContent = 'Within standards';
        sealingtimevalidation.style.color = 'green';
        event.preventDefault();
    } else if (val3 > val1 && val3 < val2) {
        sealingtimevalidation.textContent = 'Within standards';
        sealingtimevalidation.style.color = 'green';
        event.preventDefault();
    } else {
        sealingtimevalidation.textContent = 'Out of specs, create change notice';
        sealingtimevalidation.style.color = 'red';
        event.preventDefault();
    }
}

function validatecuttingspeed() {
    var inputs = document.getElementsByClassName('cuttingspeed-value');
    var cuttingspeedvalidation = document.getElementById('cuttingspeedvalidation');
    var val1 = inputs[0].value - 0.1;
    var val2 = inputs[1].value + 0.1;
    var val3 = inputs[2].value;

    if (val1 == "n/a" || val1 == "N/A") {
        cuttingspeedvalidation.textContent = 'Within standards';
        cuttingspeedvalidation.style.color = 'green';
        event.preventDefault();
    } else if (val3 > val1 && val3 < val2) {
        cuttingspeedvalidation.textContent = 'Within standards';
        cuttingspeedvalidation.style.color = 'green';
        event.preventDefault();
    } else {
        cuttingspeedvalidation.textContent = 'Out of specs, create change notice';
        cuttingspeedvalidation.style.color = 'red';
        event.preventDefault();
    }
}

function validateapproachingposition() {
    var inputs = document.getElementsByClassName('approachingposition-value');
    var approachingpositionvalidation = document.getElementById('approachingpositionvalidation');
    var val1 = inputs[0].value - 0.1;
    var val2 = inputs[1].value + 0.1;
    var val3 = inputs[2].value;

    if (val1 == "n/a" || val1 == "N/A") {
        approachingpositionvalidation.textContent = 'Within standards';
        approachingpositionvalidation.style.color = 'green';
        event.preventDefault();
    } else if (val3 > val1 && val3 < val2) {
        approachingpositionvalidation.textContent = 'Within standards';
        approachingpositionvalidation.style.color = 'green';
        event.preventDefault();
    } else {
        approachingpositionvalidation.textContent = 'Out of specs, create change notice';
        approachingpositionvalidation.style.color = 'red';
        event.preventDefault();
    }
}

function validatesealingpositionspeed() {
    var inputs = document.getElementsByClassName('sealingpositionspeed-value');
    var sealingpositionspeedvalidation = document.getElementById('sealingpositionspeedvalidation');
    var val1 = inputs[0].value - 0.1;
    var val2 = inputs[1].value + 0.1;
    var val3 = inputs[2].value;

    if (val1 == "n/a" || val1 == "N/A") {
        sealingpositionspeedvalidation.textContent = 'Within standards';
        sealingpositionspeedvalidation.style.color = 'green';
        event.preventDefault();
    } else if (val3 > val1 && val3 < val2) {
        sealingpositionspeedvalidation.textContent = 'Within standards';
        sealingpositionspeedvalidation.style.color = 'green';
        event.preventDefault();
    } else {
        sealingpositionspeedvalidation.textContent = 'Out of specs, create change notice';
        sealingpositionspeedvalidation.style.color = 'red';
        event.preventDefault();
    }
}

function validatesealingposition() {
    var inputs = document.getElementsByClassName('sealingposition-value');
    var sealingpositionvalidation = document.getElementById('sealingpositionvalidation');
    var val1 = inputs[0].value - 0.1;
    var val2 = inputs[1].value + 0.1;
    var val3 = inputs[2].value;

    if (val1 == "n/a" || val1 == "N/A") {
        sealingpositionvalidation.textContent = 'Within standards';
        sealingpositionvalidation.style.color = 'green';
        event.preventDefault();
    } else if (val3 > val1 && val3 < val2) {
        sealingpositionvalidation.textContent = 'Within standards';
        sealingpositionvalidation.style.color = 'green';
        event.preventDefault();
    } else {
        sealingpositionvalidation.textContent = 'Out of specs, create change notice';
        sealingpositionvalidation.style.color = 'red';
        event.preventDefault();
    }
}

function validateuppermoldtemp() {
    var inputs = document.getElementsByClassName('uppermoldtemp-value');
    var uppermoldtempvalidation = document.getElementById('uppermoldtempvalidation');
    var val1 = inputs[0].value - 0.1;
    var val2 = inputs[1].value + 0.1;
    var val3 = inputs[2].value;

    if (val1 == "n/a" || val1 == "N/A") {
        uppermoldtempvalidation.textContent = 'Within standards';
        uppermoldtempvalidation.style.color = 'green';
        event.preventDefault();
    } else if (val3 > val1 && val3 < val2) {
        uppermoldtempvalidation.textContent = 'Within standards';
        uppermoldtempvalidation.style.color = 'green';
        event.preventDefault();
    } else {
        uppermoldtempvalidation.textContent = 'Out of specs, create change notice';
        uppermoldtempvalidation.style.color = 'red';
        event.preventDefault();
    }
}

function validatelowermoldtemp() {
    var inputs = document.getElementsByClassName('lowermoldtemp-value');
    var lowermoldtempvalidation = document.getElementById('lowermoldtempvalidation');
    var val1 = inputs[0].value - 0.1;
    var val2 = inputs[1].value + 0.1;
    var val3 = inputs[2].value;

    if (val1 == "n/a" || val1 == "N/A") {
        lowermoldtempvalidation.textContent = '';
        lowermoldtempvalidation.style.color = 'green';
        event.preventDefault();
    } else if (val3 > val1 && val3 < val2) {
        lowermoldtempvalidation.textContent = 'Within standards';
        lowermoldtempvalidation.style.color = 'green';
        event.preventDefault();
    } else {
        lowermoldtempvalidation.textContent = 'Out of specs, create change notice';
        lowermoldtempvalidation.style.color = 'red';
        event.preventDefault();
    }
}



function validatetotalLength() {
    var inputs = document.getElementsByClassName('totalLength-value');
    var totalLengthvalidation = document.getElementById('totalLengthvalidation');
    var val1 = inputs[0].value - 0.1;
    var val2 = inputs[1].value + 0.1;
    var val3 = inputs[2].value;
    var val4 = inputs[3].value;
    var val5 = inputs[4].value;
    var val6 = inputs[5].value;
    var val7 = inputs[6].value;

    if (val3 < val1 || val3 > val2 || val4 < val1 || val4 > val2 || val5 < val1 || val5 > val2 || val6 < val1 || val6 > val2 || val7 < val1 || val7 > val2) {
        totalLengthvalidation.textContent = 'Out of specs, create change notice';
        totalLengthvalidation.style.color = 'red';
    } else {
        totalLengthvalidation.textContent = 'Within standards';
        totalLengthvalidation.style.color = 'green';
    }
}

function validateswabheadlength() {
    var inputs = document.getElementsByClassName('swabheadlength-value');
    var swabheadlengthvalidation = document.getElementById('swabheadlengthvalidation');
    var val1 = inputs[0].value - 0.1;
    var val2 = inputs[1].value + 0.1;
    var val3 = inputs[2].value;
    var val4 = inputs[3].value;
    var val5 = inputs[4].value;
    var val6 = inputs[5].value;
    var val7 = inputs[6].value;

    if (val1 == "n/a" || val1 == "N/A") {
        swabheadlengthvalidation.textContent = '';
        swabheadlengthvalidation.style.color = 'green';
        event.preventDefault();
    } else if (val3 < val1 || val3 > val2 || val4 < val1 || val4 > val2 || val5 < val1 || val5 > val2 || val6 < val1 || val6 > val2 || val7 < val1 || val7 > val2) {
        swabheadlengthvalidation.textContent = 'Out of specs, create change notice';
        swabheadlengthvalidation.style.color = 'red';
    } else {
        swabheadlengthvalidation.textContent = 'Within standards';
        swabheadlengthvalidation.style.color = 'green';
    }
}

function validatesswabheadwidth() {
    var inputs = document.getElementsByClassName('swabheadwidth-value');
    var swabheadwidthvalidation = document.getElementById('swabheadwidthvalidation');
    var val1 = inputs[0].value - 0.1;
    var val2 = inputs[1].value + 0.1;
    var val3 = inputs[2].value;
    var val4 = inputs[3].value;
    var val5 = inputs[4].value;
    var val6 = inputs[5].value;
    var val7 = inputs[6].value;

    if (val1 == "n/a" || val1 == "N/A") {
        swabheadwidthvalidation.textContent = '';
        swabheadwidthvalidation.style.color = 'green';
        event.preventDefault();
    } else if (val3 < val1 || val3 > val2 || val4 < val1 || val4 > val2 || val5 < val1 || val5 > val2 || val6 < val1 || val6 > val2 || val7 < val1 || val7 > val2) {
        swabheadwidthvalidation.textContent = 'Out of specs, create change notice';
        swabheadwidthvalidation.style.color = 'red';
    } else {
        swabheadwidthvalidation.textContent = 'Within standards';
        swabheadwidthvalidation.style.color = 'green';
    }
}

function validateswabheadthickness() {
    var inputs = document.getElementsByClassName('swabheadthickness-value');
    var swabheadthicknessvalidation = document.getElementById('swabheadthicknessvalidation');
    var val1 = inputs[0].value - 0.1;
    var val2 = inputs[1].value + 0.1;
    var val3 = inputs[2].value;
    var val4 = inputs[3].value;
    var val5 = inputs[4].value;
    var val6 = inputs[5].value;
    var val7 = inputs[6].value;

    if (val1 == "n/a" || val1 == "N/A") {
        swabheadthicknessvalidation.textContent = '';
        swabheadthicknessvalidation.style.color = 'green';
        event.preventDefault();
    } else if (val3 < val1 || val3 > val2 || val4 < val1 || val4 > val2 || val5 < val1 || val5 > val2 || val6 < val1 || val6 > val2 || val7 < val1 || val7 > val2) {
        swabheadthicknessvalidation.textContent = 'Out of specs, create change notice';
        swabheadthicknessvalidation.style.color = 'red';
    } else {
        swabheadthicknessvalidation.textContent = 'Within standards';
        swabheadthicknessvalidation.style.color = 'green';
    }
}

function validateswabhandlewidth() {
    var inputs = document.getElementsByClassName('swabhandlewidth-value');
    var swabhandlewidthvalidation = document.getElementById('swabhandlewidthvalidation');
    var val1 = inputs[0].value - 0.1;
    var val2 = inputs[1].value + 0.1;
    var val3 = inputs[2].value;
    var val4 = inputs[3].value;
    var val5 = inputs[4].value;
    var val6 = inputs[5].value;
    var val7 = inputs[6].value;

    if (val1 == "n/a" || val1 == "N/A") {
        swabhandlewidthvalidation.textContent = '';
        swabhandlewidthvalidation.style.color = 'green';
        event.preventDefault();
    } else if (val3 < val1 || val3 > val2 || val4 < val1 || val4 > val2 || val5 < val1 || val5 > val2 || val6 < val1 || val6 > val2 || val7 < val1 || val7 > val2) {
        swabhandlewidthvalidation.textContent = 'Out of specs, create change notice';
        swabhandlewidthvalidation.style.color = 'red';
    } else {
        swabhandlewidthvalidation.textContent = 'Within standards';
        swabhandlewidthvalidation.style.color = 'green';
    }
}

function validateswabhandlethickness() {
    var inputs = document.getElementsByClassName('swabhandlethickness-value');
    var swabhandlethicknesshvalidation = document.getElementById('swabhandlethicknesshvalidation');
    var val1 = inputs[0].value - 0.1;
    var val2 = inputs[1].value + 0.1;
    var val3 = inputs[2].value;
    var val4 = inputs[3].value;
    var val5 = inputs[4].value;
    var val6 = inputs[5].value;
    var val7 = inputs[6].value;

    if (val1 == "n/a" || val1 == "N/A") {
        swabhandlethicknesshvalidation.textContent = '';
        swabhandlethicknesshvalidation.style.color = 'green';
    } else if (val3 < val1 || val3 > val2 || val4 < val1 || val4 > val2 || val5 < val1 || val5 > val2 || val6 < val1 || val6 > val2 || val7 < val1 || val7 > val2) {
        swabhandlethicknesshvalidation.textContent = 'Out of specs, create change notice';
        swabhandlethicknesshvalidation.style.color = 'red';
    } else {
        swabhandlethicknesshvalidation.textContent = 'Within standards';
        swabhandlethicknesshvalidation.style.color = 'green';
    }
}

function validateswabhandlediameter() {
    var inputs = document.getElementsByClassName('swabhandlediameter-value');
    var swabhandlediameterhvalidation = document.getElementById('validateswabhandlediameter');
    var val1 = inputs[0].value - 0.1;
    var val2 = inputs[1].value + 0.1;
    var val3 = inputs[2].value;
    var val4 = inputs[3].value;
    var val5 = inputs[4].value;
    var val6 = inputs[5].value;
    var val7 = inputs[6].value;



    if (val1 == "n/a" || val1 == "N/A") {
        swabhandlethicknesshvalidation.textContent = '';
        swabhandlethicknesshvalidation.style.color = 'green';
    } else if (val3 < val1 || val3 > val2 || val4 < val1 || val4 > val2 || val5 < val1 || val5 > val2 || val6 < val1 || val6 > val2 || val7 < val1 || val7 > val2) {
        swabhandlediameterhvalidation.textContent = 'Out of specs, create change notice';
        swabhandlediameterhvalidation.style.color = 'red';
    } else {
        swabhandlediameterhvalidation.textContent = 'Within standards';
        swabhandlediameterhvalidation.style.color = 'green';
    }
}


function validatePullSeatTest() {
    var inputs = document.getElementsByClassName('pullSeatTest-value');
    var dataPullTest = document.getElementById('PullSeatTestvalidation');
    let val1 = inputs[0].value ;
    let val2 = inputs[1].value ;
    var val3 = inputs[2].value;
    var val4 = inputs[3].value;
    var val5 = inputs[4].value;
    var val6 = inputs[5].value;
    var val7 = inputs[6].value;


    
    if (val1 == "n/a" || val1 == "N/A") {
        dataPullTest.textContent = '';
        dataPullTest.style.color = 'green';
    } else if(val2 === null || val2 === ""){

         if(val3 > val1 && val4 > val1 && val5 > val1 && val6 > val1 && val7 > val1 ){
              
                 dataPullTest.textContent = 'Within standards';
       
                dataPullTest.style.color = 'green';
  
            } else {
                              dataPullTest.textContent = 'Out of specs, create change notice'; 
                               dataPullTest.style.color = 'red';
       
            }
     } else {
          if (val3 < val1 || val3 > val2 && val4 < val1 || val4 > val2 && val5 < val1 || val5 > val2 && val6 < val1 || val6 > val2 && val7 < val1 || val7 > val2) {
                dataPullTest.textContent = 'Out of specs, create change notice';
                dataPullTest.style.color = 'red';
            } else {
                dataPullTest.textContent = 'Within standards';
                dataPullTest.style.color = 'green';
               
            }
     }

    // if(val2 =="" || isNaN(val2)){
    //         
    // } else 
}



function validateSubstraateVal() {
    var inputs = document.getElementsByClassName('substrateDimention-value');
    var substrateDimentionvalidation = document.getElementById('substrateDimentionvalidation');
    let val1 = inputs[0].value - 0.1;
    let val2 = inputs[1].value + 0.1;
    var val3 = inputs[2].value;
    var val4 = inputs[3].value;
    var val5 = inputs[4].value;
    var val6 = inputs[5].value;
    var val7 = inputs[6].value;


    if (val1 == "n/a" || val1 == "N/A") {
        dataPullTest.textContent = '';
        dataPullTest.style.color = 'green';
    } else if(val2 === null || val2 === ""){

         if(val3 > val1 && val4 > val1 && val5 > val1 && val6 > val1 && val7 > val1 ){
              
                 dataPullTest.textContent = 'Within standards';
       
                dataPullTest.style.color = 'green';
  
            } else {
                              dataPullTest.textContent = 'Out of specs, create change notice'; 
                               dataPullTest.style.color = 'red';
       
            }
     } else {
          if (val3 < val1 || val3 > val2 && val4 < val1 || val4 > val2 && val5 < val1 || val5 > val2 && val6 < val1 || val6 > val2 && val7 < val1 || val7 > val2) {
                    substrateDimentionvalidation.textContent = 'Out of specs, create change notice';
                 substrateDimentionvalidation.style.color = 'red';
            } else {
                    substrateDimentionvalidation.textContent = 'Within standards';
                 substrateDimentionvalidation.style.color = 'green';
               
            }
     }
    // if (val3 < val1 || val3 > val2 || val4 < val1 || val4 > val2 || val5 < val1 || val5 > val2 || val6 < val1 || val6 > val2 || val7 < val1 || val7 > val2) {
    //     substrateDimentionvalidation.textContent = 'Out of specs, create change notice';
    //     substrateDimentionvalidation.style.color = 'red';
    // } else {
    //     substrateDimentionvalidation.textContent = 'Within standards';
    //     substrateDimentionvalidation.style.color = 'green';
    // }
}

</script>-value

