@extends('layouts.master')

@section('title', 'Gigs Show')

@section('content')
<div class="container">
    <div class="row">
        <div class='col-md-12'>
            <h2>{{{ $gig->name }}}
                @if(Auth::id() == $gig->user_id)
                <small> <a href={{ action('GigsController@edit', $gig->id) }}>edit</a></small>
                @endif
            </h2>
            <p>by {{{ $gig->user->username }}}</p>
            <p>at: {{{ $gig->location }}}</p>
            <p>when: {{{ $gig->date }}}</p>
            <hr>

            <p>{{{ $gig->description }}}</p>
        </div>
    </div>

    <div class="row">
        <div class='col-md-12'>
            <h3>comments</h3>
            <div id="disqus_thread"></div>
            <script type="text/javascript">
            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
            var disqus_shortname = 'talentapp'; // required: replace example with your forum shortname
            var disqus_identifier = '{{ 'gig_' . $gig->id }}';

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