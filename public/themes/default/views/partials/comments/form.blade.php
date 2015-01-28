{{ Form::open(array('action' => array('CommentsController@create'), 'class' => 'form-horizontal')) }}

	{{-- This is used to return the user back to this page --}}
	{{ Form::hidden('return', Request::url()) }}

	{{-- This is used to ensure the comment is added to the right commentable object --}}
	{{ Form::hidden('commentable', Crypt::encrypt(get_class($commentable) . '.' . $commentable->getKey())) }}

    <div class="control-group {{ Session::has('error') ? 'error' : '' }}">
      <label class="control-label" for="comments">Comment</label>
      <div class="controls">
        <textarea placeholder="Add your comments here..." class="form-control"
        		  name="comment" required="required">{{ Input::old('comment') }}</textarea>
        <span class="help-inline">{{ Session::get('error') }}</span>
      </div>
    </div>

    <button type="submit" class="btn btn-default" style="margin-top:10px">Submit comment</button>


{{ Form::close() }}