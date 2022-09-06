function loadNavigation(){
    document.getElementById("icons").reload(true);
}

function enableById(elementId){
    document.getElementById(elementId).disabled = !document.getElementById(elementId).disabled;
}



function loadAddress(){
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () =>{
        if(xhr.status==200){
            if(xhr.response == "-1"){
                alert("You are not logged in!");
            }else if(xhr.response == "2"){
                document.getElementById("code").className="form-control is-invalid";
                document.getElementById("saveButton").disabled = true;
            }else{
                document.getElementById("code").className="form-control";
                document.getElementById("city").value = xhr.response;
                document.getElementById("saveButton").disabled = false;
            }
        }
    }
    const data = new FormData(userData);
    xhr.open("GET", "http://localhost/web/logic/account/getCityByPLZ.php/?" + new URLSearchParams(data).toString());
    xhr.send();
}
