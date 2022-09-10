<?php include("../header.php");?>
<div id="content" class="main-container justify-content-center flex-wrap">
</div>
</body>
<script>
    function subscribe(user_id, news_id){
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = () =>{
            if(xhr.status==200){
                loadNews();
            }
        }
        const data = new FormData();
        data.append("user_id",user_id);
        data.append("news_id",news_id);
        xhr.open("POST", "http://localhost/web/logic/news/subscribeToNews.php");
        xhr.send(data);
    }

    function unsubscribe(user_id, news_id){
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = () =>{
            if(xhr.status==200){
                loadNews();
            }
        }
        const data = new FormData();
        data.append("user_id",user_id);
        data.append("news_id",news_id);
        xhr.open("POST", "http://localhost/web/logic/news/unsubscribeToNews.php");
        xhr.send(data);
    }

    function addEmailToNewsletter(){
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = () =>{
            if(xhr.status==200){
                loadNews();
            }
        }
        const data = new FormData(newsletter);
        xhr.open("POST", "http://localhost/web/logic/news/addEmailToNewsletter.php");
        xhr.send(data);
        return false;
    }

    function loadNews(){
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = () =>{
            if(xhr.status==200){
                document.getElementById("content").innerHTML = xhr.response;
            }
        }
        xhr.open("GET", "http://localhost/web/logic/news/loadNews.php");
        xhr.send();
    }
    loadNews();
</script>