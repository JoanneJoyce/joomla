window.onload = function (){
    // debugger;
        document.getElementById("submitEditDelete").addEventListener("click", function(event){
            // event.preventDefault();
            editDeletePatient(event);
        });
    
        document.getElementById("search_patient").addEventListener("keyup", filter.filterPatients);
        document.getElementById("patient_id").addEventListener("change", function () { patientsList.selectPatient(this); });
        var eventLevel = document.getElementsByName("event");
        // Traverse through event level radio buttons
        for (var i = 0; i < eventLevel.length; i++) {
            eventSelector();
            eventLevel[i].addEventListener("change", function () { eventSelector() });
        }
        patientBorderOnLoad();
        filter.populatePatients();
    };
    
     // Formats event-level radio buttons
     var eventSelector = function () {
        var eventLevel = document.getElementsByName("event");
        // Traverse through event level radio buttons
        for (var i = 0; i < eventLevel.length; i++) {
            // Gets event level radio button's parent element's style
            var radioButtonStyle = eventLevel[i].parentElement.style;
            // If event level radio button is checked
            if (eventLevel[i].checked) {
                // If event level is for warning
                if (eventLevel[i].value == 0) {
                    radioButtonStyle.backgroundColor = "yellow";
                    // If event level is for refusal
                } else {
                    radioButtonStyle.backgroundColor = "red";
                    radioButtonStyle.color = "white";
                }
                // If event level radio button is not checked
            } else {
                radioButtonStyle.backgroundColor = "transparent";
                radioButtonStyle.color = "black";
            }
        }
    };
    
    
     // Contains functions for getting selected patient on click 
        // also formats the patients list select
        var patientsList = (function () {
            // Stores selected patient option's value(patient ID)
            var selectedPatientValue = "";
    
            // Gets selected patient option's value(patient ID) and formats patient list select
            var selectPatient = function (e) {
                // If selected patient's event level is for refusal
                if (e.options[e.selectedIndex].getAttribute("data-level") == 1) {
                    e.style.borderColor = "red";
                    // If selected patient's event level is for warning
                } else {
                    e.style.borderColor = "yellow";
                }
                e.style.borderWidth = "3px";
                // Stores the selected patient option's value(patient ID) into selectedPatientValue variable
                selectedPatientValue = e.options[e.selectedIndex].value;
            }
    
            // Getter function for selectedPatientValue
            var getSelectedPatientValue = function () {
                return selectedPatientValue;
            }
    
            // Setter function for selectedPatientValue
            var setSelectedPatientValue = function (val) {
                selectedPatientValue = val;
            }
    
            return {
                selectPatient: selectPatient,
                getSelectedPatientValue: getSelectedPatientValue,
                setSelectedPatientValue: setSelectedPatientValue
            };
        })();
    
        // Formats the patient list select border on page load
        var patientBorderOnLoad = function () {
            // Gets all patients
            var patientList = document.getElementById("patient_id");
            // Traverse all patients
            for (var i = 0; i < patientList.options.length; i++) {
                // If patient is selected
                if (patientList.options[i].hasAttribute("selected") && patientList.options[i].style.display == "") {
                    // If patient's event level is for refusal
                    if (patientList.options[i].getAttribute("data-level") == 1) {
                        patientList.style.borderColor = "red";
                        // If patient's event level is for warning
                    } else {
                        patientList.style.borderColor = "yellow";
                    }
                    patientList.style.borderWidth = "3px";
                    return;
                }
            }
        };
    
      // Contains function used for filtering patient list
      var filter = (function () {
        // Contains previous filter value
        var lastFilterValue = "";
    
        // Array of all patients
        var patients = [];
    
        // Initializes 'patients' array on page load
        var populatePatients = function () {
            patients = document.querySelectorAll("#patient_id option");
        };
    
        // Filters patient list
        var filterPatients = function () {
            var filterInput = document.getElementById('search_patient').value.toUpperCase();
            filterInput = filterInput.trim();
            // If filter input value didn't change
            if (filterInput === lastFilterValue) {
                return;
            }
            lastFilterValue = filterInput;
            var selectedPatientValue = patientsList.getSelectedPatientValue();
            var patientList = document.getElementById("patient_id");
            var filteredPatients = patientList.options;
            // Removes all patients in patient list select
            while (patientList.length != 0) {
                patientList.remove(0);
            }
            var isSelected = false;
            var patientCtr = -1;
            // Traverse all patients
            for (var i = 0; i < patients.length; i++) {
                // If patient contains filter input
                if (patients[i].innerHTML.toUpperCase().indexOf(filterInput) > -1) {
                    patientList.appendChild(patients[i]);
                    patientCtr++;
                    // If patient is the selected patient
                    if (patients[i].value == selectedPatientValue) {
                        isSelected = true;
                        patientsList.setSelectedPatientValue(patients[i].value);
                    }
                }
            }
            // If selected patient was not found
            if (!isSelected) {
                patientList.style.borderWidth = "1px";
                patientList.style.borderColor = "gray";
                patientList.selectedIndex = "-1";
                patientsList.setSelectedPatientValue("");
            }
        };
    
        return {
            filterPatients: filterPatients,
            populatePatients: populatePatients
        };
    })();

    function xoopsFormValidate_detail_troublesome_patient() {
        myform = window.document.detail_troublesome_patient;
    if ( myform.pid.value == "" ) { window.alert("患者ＩＤ を入力してください"); myform.pid.focus(); return false; }
    if ( myform.pname.value == "" ) { window.alert("患者氏名 を入力してください"); myform.pname.focus(); return false; }
    if ( myform.furigana.value == "" ) { window.alert("患者氏名（ふりがな）を入力してください"); myform.furigana.focus(); return false; }
    if ( myform.bday.value == "" ) { window.alert("患者誕生日 を入力してください"); myform.bday.focus(); return false; }
    if ( myform.occur_date.value == "" ) { window.alert("発生年月日 を入力してください"); myform.occur_date.focus(); return false; }
    if ( myform.contents.value == "" ) { window.alert("事例の内容 を入力してください"); myform.contents.focus(); return false; }
    return true;
    }