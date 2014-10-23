@extends('layouts.master')

@section('title', 'Gigs Show')

@section('content')
<div class="container">
    <div class="row">
        <div class='col-md-12'>
            <h2>{{{ $gig->name }}}</h2>
            <p>by [Agent Name Here]</p>
            <p>At: {{{ $gig->location }}}</p>
            <p>When: {{{ $gig->date }}}</p>
            <hr>

            <p>{{{ $gig->description }}}</p>
        </div>
    </div> 
    <div class="row">
        <div class='col-md-12'>
           <div id="disqus_thread"></div>
           <script type="text/javascript">
           /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'talentapp'; // required: replace example with your forum shortname
        var disqus_identifier = '{{ $gig->id }}';

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