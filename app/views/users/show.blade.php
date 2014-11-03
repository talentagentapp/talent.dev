@extends('layouts.master')

@section('title', 'User Show')

@section('content')
<div class='container' style="border: 2px solid white;">
	<div class='row'>

		<div class='col-md-8'>
			<h1>{{{ $user->first . ' ' . $user->last }}}</h1>
			<img src="{{ $user->img }}" class='img-thumbnail img-responsive'>
			<h4><a href="mailto:{{{ $user->email }}}">{{{ $user->email }}}</a></h4>
			<p>{{{ $user->bio }}}</p>
		</div>

		<div class='col-md-4'>
			<h3>Additional Profile Information</h3>
			<hr>
			<p>{{-- $user->talent->skills --}}</p>
			<p>I have {{{ $user->experience }}} years of experience.</p>
			<p>{{{ $user->gender_str }}}</p>
		</div>
	</div>

    <!-- COMMENTS BELOW -->
    <div class="row">
        <div class='col-md-12'>
            <h3>Comments</h3>
            <div id="disqus_thread"></div>
            <script type="text/javascript">
            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
            var disqus_shortname = 'talentapp'; // required: replace example with your forum shortname
            var disqus_identifier = '{{ 'user_' . $user->id }}';

            /* * * DON'T EDIT BELOW THIS LINE * * */
            (function() {
                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        </div>
    </div>
</div>
@stop