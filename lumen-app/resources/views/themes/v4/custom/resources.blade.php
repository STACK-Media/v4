@extends('theme::layouts.two_column')

{!! Assets::queue('stylesheet', 'layout', 'resources', '/assets/css/custom/resources.css') !!}

@section('content')

    <div id="main_content" class="resources">
    	<section class="cat_header show">
    		<h1>STACK Resources</h1>
    	</section>
        <section class="vertical">
            <div class="fitness">
                <a href="http://www.stack.com/fitness/"></a>
                	<div class="vert_desc">
		                <h2><a href="http://www.stack.com/fitness/">STACK Fitness</a></h2>
		                <p>Everything you need to be the fittest you ever</p>
		            </div>
            </div>
            <div class="conditioning">
                <a href="http://conditioning.stack.com/"></a>
                <div class="vert_desc">
	                <h2><a href="http://conditioning.stack.com/">STACK Conditioning</a></h2>
	                <p>Sport-specific conditioning programs</p>
	            </div>
            </div>
            <div class="coaches_trainers">
                <a href="http://www.stack.com/coaches-and-trainers/"></a>
                	<div class="vert_desc">
		                <h2><a href="http://www.stack.com/coaches-and-trainers/">Coaches and Trainers</a></h2>
		                <p>Tips and advice for coaches and trainers</p>
		            </div>
            </div>
            <div class="magazine">
                <a href="http://www.stack.com/magazine/"></a>
	                <div class="vert_desc">
		                <h2><a href="http://www.stack.com/magazine/">Magazine</a></h2>
		                <p>Latest issues of STACK Magazine</p>
		            </div>
            </div>
            <div class="four_w">
                <a href="http://www.stack.com/4w/"></a>
                	<div class="vert_desc">
		                <h2><a href="http://www.stack.com/4w/">STACK 4W</a></h2>
		                <p>Women's sports workout, nutrition and lifestyle advice</p>
		            </div>
            </div>
            <div class="gamer">
                <a href="http://www.stack.com/gamer/"></a>
                	<div class="vert_desc">
		                <h2><a href="http://www.stack.com/gamer/">Gamer</a></h2>
		                <p>Gaming, entertainment and tech news</p>
		            </div>
            </div>
            <div class="basic_training">
                <a href="http://www.stack.com/basic-training/"></a>
                	<div class="vert_desc">
		                <h2><a href="http://www.stack.com/basic-training/">Basic Training</a></h2>
		                <p>Military-style training for athletes</p>
		            </div>
            </div>
            <!--<div class="varsity">
                <a href="http://www.stackvarsity.com/"></a>
                	<div class="vert_desc">
		                <h2><a href="http://www.stackvarsity.com/">Varsity</a></h2>
		                <p>High school sports community and content sharing</p>
		            </div>
            </div>-->
            <div class="news">
                <a href="http://www.stack.com/news/"></a>
                	<div class="vert_desc">
		                <h2><a href="http://www.stack.com/news/">News</a></h2>
		                <p>Find the latest news relevant to athletes</p>
		            </div>
            </div>
        </section> 
    </div>

@stop