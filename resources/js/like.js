import axios from "axios";

const like = document.getElementById("like");

if(like){
    like.addEventListener('click', function(){
        const postId = like.getAttribute("data-postId");
        const flg = like.getAttribute("data-flg");
        const likeCount = document.getElementById("likeCount");
        if(!flg){
            axios.post("/posts/like", {
                post: postId,
            }).then((res) => {
                like.classList.add('liked');
                like.setAttribute("data-flg", 1);
                likeCount.innerText = Number(likeCount.innerText) + 1;
            }).catch((err) => {
                console.log('fail');
            });
        }else{
            axios.post('/posts/unlike', {
                post: postId,
            }).then((res) => {
                like.classList.remove('liked');
                like.setAttribute("data-flg", "");
                likeCount.innerText = Number(likeCount.innerText) - 1;
            }).catch((err) => {
                console.log("fail");
            });
        }
    });
}