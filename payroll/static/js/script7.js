let eventSource = null;
let value = '';
var myDLInput1 = document.getElementById('emp');
var mySelect1 = document.getElementById("empname");
const dinput1 = document.getElementById('emp');

const data = document.currentScript.dataset;
const periodvalue = data.periodvalue;
const rowid = data.rowid;

dinput1.addEventListener('keydown', (e) => {
  eventSource = e.key ? 'input' : 'list';
});


dinput1.addEventListener('input', (e) => {
  value = e.target.value;
  if (eventSource === 'list') {
        document.getElementById("empname").value = value
        let selectedOptionID = mySelect1.options[mySelect1.selectedIndex].dataset.id;
        document.getElementById("empno").value = selectedOptionID
        empno = selectedOptionID
        checkattendance(empno)
       
  }
});



function submitForm() {
  if (document.getElementById("range").value == "SSS"){
    alert("Select a valid range.");
    return;
  }
  if(document.getElementById("range").value == "ALL"){
    if(document.getElementById("location").value == "SSS"){
      alert("Select a valid location.");
      return;
    }
  }
  if(document.getElementById("range").value == "SELECTED EMPMOYEE"){
    if(document.getElementById("empno").value == ""){
      alert("Select a employee.");
      return;
    }
  }
  if (document.getElementById("position").value == "DRIVER"){
    let form = document.getElementById("form_submit");
    form.submit();
  }
  if (document.getElementById("position").value == "HELPER"){
    document.getElementById("form_submit").action = "/generate_payroll_helper/" + rowid
    document.getElementById("form_submit").target = "_blank"
    let form = document.getElementById("form_submit");
    form.submit();
  }
  if (document.getElementById("position").value == "OFFICE STAFF" || document.getElementById("position").value == "MAINTENANCE"){
    document.getElementById("form_submit").action = "/generate_payroll_office/" + rowid
    document.getElementById("form_submit").target = "_blank"
    let form = document.getElementById("form_submit");
    form.submit();
  }
  
}

function getCookie(name) {
  var cookieValue = null;
  if (document.cookie && document.cookie !== '') {
      var cookies = document.cookie.split(';');
      for (var i = 0; i < cookies.length; i++) {
          var cookie = cookies[i].trim();
          // Does this cookie string begin with the name we want?
          if (cookie.substring(0, name.length + 1) === (name + '=')) {
              cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
              break;
          }
      }
  }
  return cookieValue;
}

function checkvtr(){ // check vtr if exist, sends command to views.py def testcall(request): to check
  var text = document.getElementById('vtrno').value;
        let form = document.getElementById("form_submit");
        var csrftoken = getCookie('csrftoken');

        $.ajax({
           type: "POST",
           url: 'testcall',
           data: { csrfmiddlewaretoken: csrftoken, text: text},
           success: function callback(response){
                       if(response == "YES"){
                        form.submit();
                       }
                        
                        
                    }
        });
}
function checkvtr1(){ // check vtr if exist, sends command to views.py def testcall(request): to check
  var text = document.getElementById('vtrno').value;
        let form = document.getElementById("form_submit");
        var csrftoken = getCookie('csrftoken');

        $.ajax({
           type: "POST",
           url: 'testcall',
           data: { csrfmiddlewaretoken: csrftoken, text: text},
           success: function callback(response){
                        form.submit();
                        
                    }
        });
}
function selection(){
    if (document.getElementById("range").value == "SELECTED EMPMOYEE"){
      document.getElementById("emp").style.display = "block"
      document.getElementById("location").style.display = "none"
    }
    else{
      document.getElementById("emp").style.display = "none"
      document.getElementById("location").style.display = "block"
    }
// document.getElementById("emp").style.display = "none"
  if (document.getElementById("range").value == "SSS"){
    document.getElementById("emp").style.display = "none"
      document.getElementById("location").style.display = "none"
  }
}
function checkattendance(empno){ 
  // data: {empno: empno, rowid: rowid, id: '2'},
  $.ajax({
    type: "POST",
    url: '../payroll/scripts/get_data.php',
    dataType: 'json',
    data: {empno: empno, rowid: rowid, id: '2'},
    success: function callback(response){
            var attendance = response.attendance
            if (attendance === undefined) {
              
            }else{
                alert("Employee already have an attendance.")
                document.getElementById("checkdelete").value = attendance[0]
                document.getElementById("regday").value = attendance[1]
                document.getElementById("regot").value = attendance[2]
                document.getElementById("reghday").value = attendance[3]
                document.getElementById("reghot").value = attendance[4]
                document.getElementById("specday").value = attendance[5]         
                document.getElementById("specot").value = attendance[6]
                document.getElementById("tardy").value = attendance[7] 
                    
                }
                 
                        
                    }
        });
        
}
function deleteatt(){
  if(document.getElementById("checkdelete").value != ""){
    var rowid1 = document.getElementById("checkdelete").value;
    let ans = "Do you want to delete attendance?";
    if (confirm(ans) == true){
        $.ajax({
            type: "POST",
            url: '../payroll/scripts/delete.php',
            dataType: 'json',
            data: {id: '2', rowid: rowid1},
            success: function callback(response){
                if (response.result == "YES"){
                    location.reload();}
                        // alert(response.result)
                    }
        });}
    // let text = "Do you want to delete attendance?";
    //                 if (confirm(text) == true) {
    //                   let form = document.getElementById("form_submit");
    //                   document.getElementById("form_submit").action = "/deleteattendance"
    //                   form.submit();
    //                 }
  }
}
function close1(){
  window.open("attendance.php","_self");
        // let form = document.getElementById("form_submit");
        // document.getElementById("checkdelete").value = "close"
        // document.getElementById("form_submit").action = "/closeattendance"
        // form.submit();
                    
  
}
function saveatt(){

  let form = document.getElementById("form_submit");
  if (document.getElementById("empno").value == ""){
    alert("No employee selected.")
  }else{
    form.submit();
  }
   

}