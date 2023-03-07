window.addEventListener('load', () => {
    var postId = $('.postId').text();
    postId = parseInt(postId);
    if (!isNaN(postId)) {
        $.ajax({
            type: "POST",
            url: "/ajax/getAllCommentsOnePost",
            data: {
                postId: $('.postId').text()
            },
            success: (response) => {
                var comments = JSON.parse(response)
                console.dir(comments)

                var $commListCont = $('.comment-List-container');

                comments.forEach((item, index) => {
                    if (item.commentId == null) {                                                //коммент верхнего уровня
                        $commListCont.append(createOneComment(item, item.commentId, comments));
                    }
                });
            }
        })

        var createOneComment = (oneComm, parentId, allComments) => {
            var result = `<div class="media-block">
                                        <p class="d-none">${oneComm.Id}</p>
                                        <a class="media-left" href="#">
                                            <img class="img-circle img-sm" alt="Profile Picture" src="${oneComm.avatar}">
                                        </a>
                                        <div class="media-body">
                                            <div class="mar-btm">
                                                <a href="#" class="btn-link text-semibold media-heading box-inline">${oneComm.login}</a>
                                                <p class="text-muted text-sm"><i class="fa fa-globe fa-lg"></i>${oneComm.dateOfCreated}</p>
                                            </div>
                                            <p>${oneComm.comment}</p>
                                            <div class="pad-ver">
                                                <a class="btn btn-sm btn-default btn-hover-primary" href="#">Reply</a>
                                            </div>
                                            <hr>`;
                                            for (var i = 0; i < allComments.length; i++) {
                                                if(oneComm.Id == allComments[i].commentId){
                                                    result += createOneComment(allComments[i], oneComm.Id, allComments);
                                                }
                                            }
            result += `</div></div>`;
            return result;
        }


        var $leaveCommentForm = $('.leave-comment-form');
            $leaveCommentForm.find('.save-comment-button').on('click', ()=> {

                var comment = {
                    postId: $('.postId').text(),
                    login:$leaveCommentForm.find("input[name='login']").val(),
                    email:$leaveCommentForm.find("input[name='email']").val(),
                    comment:$leaveCommentForm.find("textarea[name='comment']").val(),
                    commentId:null
                }

                console.log(comment);

                $.ajax({
                    type: "POST",
                    url: "/ajax/SaveCommentFromPost",
                    data: comment
                }).done((msg)=>{
                    console.log(msg)
                })
            });


    } else {
        console.error("Не возможно иентифицировать пост")
        //показать ошибку при загрузке комментариев
    }
});