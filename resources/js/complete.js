    const completeSelect = document.getElementById('complete');
    
    if(completeSelect){
        const postsHTMLCollection = document.getElementsByClassName('post');
        const posts = [...postsHTMLCollection];
        completeSelect.addEventListener('change', (e) => {
            if(e.target.value === "complete"){
                posts.forEach((post) => {
                    if(!post.classList.contains("complete")){
                        post.classList.add('hidden');
                    }else{
                        post.classList.remove('hidden');
                    }
                })
            }else if(e.target.value === "uncomplete"){
                posts.forEach((post) => {
                    if(!post.classList.contains("uncomplete")){
                        post.classList.add('hidden');
                    }else{
                        post.classList.remove('hidden');
                    }
                })
            }else{
                posts.forEach((post) => {
                    post.classList.remove('hidden');
                })
            }
        })
    }