<?php
include ("../header.php");
?>
<body>
<?php
include("../navigation/navigation.php");
include ("../account/signing.php");
?>
<div id="content" class="custom-container d-flex justify-content-center flex-wrap">
</div>
</body>
</html>
<script>
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
                    document.getElementById("saveUserData").disabled = true;
                }else{
                    document.getElementById("code").className="form-control";
                    document.getElementById("city").value = xhr.response;
                    document.getElementById("saveUserData").disabled = false;
                }
            }
        }
        const data = new FormData(userData);
        xhr.open("GET", "http://localhost/web/logic/account/getCityByPLZ.php/?" + new URLSearchParams(data).toString());
        xhr.send();
    }

    function loadUserData(){
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = () =>{
            if(xhr.status==200){
                if(xhr.response == "-1"){
                }else{
                    document.getElementById("content").innerHTML = xhr.response;
                }
            }
        }
        xhr.open("GET", "http://localhost/web/logic/account/loadUserData.php/");
        xhr.send();
    }
    loadUserData();

    function saveUserData(){
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = () =>{
            if(xhr.status==200){
                if(xhr.respone == "2"){
                    document.getElementById("email").className="form-control is-invalid"
                }
            }
        }
        xhr.open("POST", "http://localhost/web/logic/account/saveUserData.php");
        const data = new FormData(userData);
        xhr.send(data);
        return false;
    }

</script>
<style>
</style>