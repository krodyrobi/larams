<div class="comments">

	<h3 class="comments--title">
		Comments
	</h3>

	@include ('partials.comments.list')

	{{-- If you are not using this file, add this anchor to your view --}}
	{{-- as this is the point that the controller redirect users back to --}}
	<h4 id="comments">
		Add a comment
	</h4>

	@if (Auth::check())
		@include ('partials.comments.form')
	@else

		<p class="comments--login--required">
			You must be logged in to add a comment.
			<a href="{{ action('UsersController@login') }}" class="btn">
				Login
			</a>
			<a href="{{ action('UsersController@create') }}" class="btn">
				Register
			</a>
		</p>

	@endif
</div>