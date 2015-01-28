<?php


class CommentsController extends Controller {

    protected $comment;

    public function __construct(Comment $comment) {
        $this->comment = $comment;
    }


    public function create() {
        $return = Input::get('return');
        if (empty($return))
            return Redirect::to('/');

        try {
            $commentable = Input::get('commentable');
            if (empty($commentable))
                throw new Exception();

            $commentable = Crypt::decrypt($commentable);
            if (strpos($commentable, '.') == false)
                throw new Exception();

            list($commentableType, $commentableId) = explode('.', $commentable);
            if (!class_exists($commentableType))
                throw new Exception();

            $data = array(
                'commentable_type' => $commentableType,
                'commentable_id' => $commentableId,
                'comment' => Input::get('comment'),
                'user_id' => Auth::user()->id,
            );

            $rules = $this->comment->getRules($commentableType);
            $validator = Validator::make($data, $rules);
            if ($validator->fails())
                return Redirect::to($return)->withErrors($validator);

            $this->comment->fill($data);
            $this->comment->save();
            $newCommentId = $this->comment->id;

            return Redirect::to($return . '#comment-' . $newCommentId);
        } catch (Exception $e) {
            return Redirect::to($return . '#comments')
                ->with('error', 'Something unexpected happened');
        }
    }
}