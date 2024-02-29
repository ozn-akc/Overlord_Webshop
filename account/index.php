<?php include("../header.php");?>
<div id="content" class="main-container justify-content-center">
</div>
</body>
<script>
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
        xhr.open("GET", "/logic/account/loadUserData.php/");
        xhr.send();
    }
    loadUserData();

    function saveUserData(){
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = () =>{
            if(xhr.status==200){
                if(xhr.respone == "2"){
                    document.getElementById("email").className="form-control is-invalid"
                }else if(xhr.response == "1"){
                    window.location.reload();
                }
            }
        }
        xhr.open("POST", "/logic/account/saveUserData.php");
        const data = new FormData(userData);
        xhr.send(data);
        return false;
    }
</script>
