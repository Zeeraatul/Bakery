<?php


namespace MyApp;


class AjaxController extends Controller
{

    function index()
    {
        // TODO: Implement index() method.
    }

    public function getAllCommentsOnePost()
    {
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            if(isset($_POST['postId'])) {
                $postId = intval($_POST['postId']);
                $commM = new CommentsModel();
                $comments = $commM->getAllValidComments($postId);
                if(count($comments) > 0) {
                    echo json_encode($comments, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                }
            }
        }
        return  null;
    }

    public function SaveCommentFromPost() {
        varSuperDump($_POST);
    }
}

