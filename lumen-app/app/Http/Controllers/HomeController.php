<?php 
namespace App\Http\Controllers;

use App\Services\HomePage;

class HomeController extends PageController
{

    function index()
    {

        return $this->_test_cache_put();

    	$page_data = array();
    	
		$this->_set_page_object(new HomePage(array(
			'playlist_id'	=> '618442261001'
		)));

    	//$page_data['widgets'] = $this->_get_widgets('homepage');

    	return $this->_load_page_view('home', $page_data);
    }

    function _test_cache_put()
    {
        $hugestr = <<<EOT
a:3:{i:0;O:8:"stdClass":14:{s:2:"id";s:6:"218318";s:4:"name";s:49:"Basketball Shooting Tips for a More Accurate Shot";s:10:"post_title";s:49:"Basketball Shooting Tips for a More Accurate Shot";s:4:"slug";s:49:"basketball-shooting-tips-for-a-more-accurate-shot";s:9:"post_name";s:49:"basketball-shooting-tips-for-a-more-accurate-shot";s:11:"post_status";s:7:"publish";s:9:"post_date";s:19:"2015-09-19 12:00:53";s:12:"post_content";s:3846:"<p style="text-align: left;"><img class="aligncenter size-full wp-image-218344" title="4 Basketball Shooting Tips for a More Accurate Shot - STACK" src="http://blog.stack.com/wp-content/uploads/2015/09/4-Basketball-Shooting-Tips-for-a-More-Accurate-Shot-STACK.jpg" alt="4 Basketball Shooting Tips for a More Accurate Shot" width="0" height="0" /></p>
<p style="text-align: left;">At basketball shooting clinics that I host, the first question I ask my students is, "What's more important, the make or the mechanics?" Most coaches and athletes give me a puzzled look, but it isn't a trick question. Some say, "I don't care how it looks, as long as it goes in."</p>
Well, I care how it looks. The simpler, the better.

<em><strong>RELATED: </strong></em><strong></strong><a dir="ltr" href="http://www.stack.com/2015/02/02/basketball-floater/" target="_parent" data-cturl="https://www.google.com/url?q=http://www.stack.com/2015/02/02/basketball-floater/&amp;sa=U&amp;ved=0CAoQFjACahUKEwjZmqqCqYHIAhXBfpIKHci0AF8&amp;client=internal-uds-cse&amp;usg=AFQjCNHeUVzmFW4kKMnUcGEpVsRqyfi8yA" data-ctorig="http://www.stack.com/2015/02/02/basketball-floater/">Basketball Shooting Technique: How to Shoot a Floater</a>

So how do you clean up your shooting mechanics? Here are a few things to keep in mind.
<ul>
    <li>Your foundation is the key to your shot and balance. Position your feet shoulder-width apart with your toes pointing toward the rim. Your power comes from your legs, and this position ensures that your power is moving in the right direction. From this position, sit your glutes back and load your legs. The end result should look similar to a standard athletic stance.</li>
    <li>As you raise the ball up, keep your elbows in. This allows you to control the ball and lets you shoot the ball straight.</li>
    <li>Raise the ball so the bottom of the ball is just above eye level. This creates the perfect release point to put power into your shot in the optimal trajectory.</li>
    <li>When you shoot the ball, fully extend your elbows. Flip the wrist of your dominant hand down with your fingers pointing to the ground on the release. This motion creates the backspin on the ball that you want.</li>
</ul>
<div><img class="aligncenter size-full wp-image-218344" title="4 Basketball Shooting Tips for a More Accurate Shot - STACK" src="http://blog.stack.com/wp-content/uploads/2015/09/4-Basketball-Shooting-Tips-for-a-More-Accurate-Shot-STACK.jpg" alt="4 Basketball Shooting Tips for a More Accurate Shot" width="654" height="368" /></div>
<div></div>
A few more tips:
<ul>
    <li>Your shot should be one flowing motion with no hitches or hesitation. The verbal cue I give my athletes is "low to high," meaning catch the ball low and be prepared to shoot.</li>
    <li>When you work on your mechanics, shoot "game shots from game spots." Always warm up before beginning a shooting session.</li>
    <li>Becoming a better shooter won't happen overnight, but with a concentrated effort and proper mechanics, you will improve.</li>
</ul>
Take a look at my other articles on shooting drills. Remember, practice makes perfect only if what you are practicing has a proper foundation.

<em><strong>RELATED: </strong></em><strong></strong><a dir="ltr" href="http://www.stack.com/2013/09/04/teach-correct-shooting-with-these-youth-basketball-drills/" target="_parent" data-cturl="https://www.google.com/url?q=http://www.stack.com/2013/09/04/teach-correct-shooting-with-these-youth-basketball-drills/&amp;sa=U&amp;ved=0CBAQFjAEahUKEwjZmqqCqYHIAhXBfpIKHci0AF8&amp;client=internal-uds-cse&amp;usg=AFQjCNH9nToGvLXPlZfPtL3qyKCMy6bN3A" data-ctorig="http://www.stack.com/2013/09/04/teach-correct-shooting-with-these-youth-basketball-drills/">Teach Correct Shooting Form With These Youth Basketball Drills</a>

[cf]skyword_tracking_tag[/cf]";s:12:"post_excerpt";s:152:"What's More Important the Make or the Mechanics? All across the country in gyms everywhere there are basketball players shooting basketball trying to...";s:11:"author_user";s:11:"gawon-hyman";s:11:"author_name";s:11:"Gawon Hyman";s:10:"author_url";s:0:"";s:12:"author_email";s:25:"hymanprofitness@gmail.com";s:9:"author_id";s:3:"400";}i:1;O:8:"stdClass":14:{s:2:"id";s:6:"216805";s:4:"name";s:44:"Using Tempo to Improve Movement on the Field";s:10:"post_title";s:44:"Using Tempo to Improve Movement on the Field";s:4:"slug";s:44:"using-tempo-to-improve-movement-on-the-field";s:9:"post_name";s:44:"using-tempo-to-improve-movement-on-the-field";s:11:"post_status";s:7:"publish";s:9:"post_date";s:19:"2015-09-04 13:30:51";s:12:"post_content";s:7221:"<img class="aligncenter size-full wp-image-216961" title="Air Squat - STACK" src="http://blog.stack.com/wp-content/uploads/2015/09/Air-Squats-STACK.jpg" alt="Air Squat" width="0" height="0" />

"Sport-specific training" is a hot topic, but something that hasn't gotten enough attention is tempo training. Tempo training helps coaches really <em>teach</em> the correct movement patterns to avoid injury and improve performance in athletes across all sports. It helps them make sure their athletes are biomechanically proficient in their movement patterns before they become efficient.

<em><strong>RELATED: </strong></em><strong><a dir="ltr" href="http://www.stack.com/2011/06/12/boost-sport-specific-conditioning-with-interval-runs/" target="_parent" data-cturl="https://www.google.com/url?q=http://www.stack.com/2011/06/12/boost-sport-specific-conditioning-with-interval-runs/&amp;sa=U&amp;ved=0CAgQFjABahUKEwj93JXOutvHAhWKSJIKHc9IBXE&amp;client=internal-uds-cse&amp;usg=AFQjCNFKfeahACU97JyyTZ26nwEg4uo5qQ" data-ctorig="http://www.stack.com/2011/06/12/boost-sport-specific-conditioning-with-interval-runs/">Boost <strong>Sport</strong>-<strong>Specific</strong> Conditioning With Interval <strong>Training</strong></a></strong>

My colleagues at Athletes Warehouse and I always ask new athletes we're working with to complete a <a href="www.stack.com/exercise/2565/Bodyweight-Squat/">Bodyweight Squat</a>. From that Squat, and eventually the Overhead Squat, strength and conditioning specialists can see:
<ul>
    <li>Mobility issues that may exist at the ankle, knee, hip, back, and shoulder joints</li>
    <li>Inefficiencies of every major muscle from the calf to the trap</li>
    <li>Potential movement dysfunction that may have existed from a previous injury or trauma</li>
    <li>Strength deficiencies</li>
    <li>Body awareness and control.</li>
</ul>
Once we pinpoint exactly what a particular athlete needs to work on, we can then begin to teach and coach so he or she can become more biomechanically efficient.

<em><strong>RELATED: </strong></em><strong><a dir="ltr" href="http://www.stack.com/video/969688324001/tempo-squats-with-the-ball-state-volleyball-team/" target="_parent" data-cturl="https://www.google.com/url?q=http://www.stack.com/video/969688324001/tempo-squats-with-the-ball-state-volleyball-team/&amp;sa=U&amp;ved=0CAgQFjABahUKEwjU0d3yutvHAhUTf5IKHXBvBuY&amp;client=internal-uds-cse&amp;usg=AFQjCNHUkJpNSMx-uskZIksC5BhBthk4vQ" data-ctorig="http://www.stack.com/video/969688324001/tempo-squats-with-the-ball-state-volleyball-team/"><strong>Tempo</strong> Squats With the Ball State Volleyball Team</a></strong>

One great method for teaching our athletes is to incorporate the "tempo" scheme into our programs. The definition of tempo is the rate or speed of a motion or activity—i.e., the pace at which you do something. When teaching or reteaching our athletes certain movements, we use tempo to control the pace of their movements.

By controlling the movement rate of a Squat—for example, slowing down the pace—a coach can see exactly at what point there seems to be an issue. Even better, the athlete can begin to <em>feel</em> the issue. This slow and controlled movement can help athletes begin to know their bodies and the way their bodies move and thus increase their efficiency in these movements at a faster rate.

In his book <em style="background-color: initial;">The Talent Code,</em> Daniel Coyle found a clear systematic template to developing movement patterns and thus developing athletic talent. One of his most interesting findings was the importance of slowing a movement down. When Coyle walked into a tennis facility where the best youth players in the world trained, he was expecting to see balls whizzing by at top speed. Instead, he witnessed each athlete moving as if he or she were underwater. They were going through each movement as slowly as possible and with extreme precision.

<strong><em>WATCH: </em><a dir="ltr" href="http://www.stack.com/video/1546350905/david-marsh-on-tempo-training/" target="_parent" data-cturl="https://www.google.com/url?q=http://www.stack.com/video/1546350905/david-marsh-on-tempo-training/&amp;sa=U&amp;ved=0CBsQFjAIahUKEwjU0d3yutvHAhUTf5IKHXBvBuY&amp;client=internal-uds-cse&amp;usg=AFQjCNGSQ7_rIWiJRcFvgkU-ZLcXa6mIRA" data-ctorig="http://www.stack.com/video/1546350905/david-marsh-on-tempo-training/">David Marsh on <strong>Tempo</strong> Training</a></strong>

These athletes were able to see exactly what part of their forehand, backhand or serve had a deficiency. More importantly, they were able to correct it immediately on their own.

In his book, Coyle sums up the importance of training slow and controlled: "Going slow allows you to attend more closely to errors, creating a higher degree of precision with each firing."

Then, once an athlete has learned a movement, he or she can progress to performing the exercise at a faster pace and eventually with an increase in load.

Here is sample from a training program we use for Squats and Push-Ups, with a young athlete learning both movements.
<h2>Air Squats</h2>
<p style="text-align: center;"><img class="aligncenter size-full wp-image-216961" title="Air Squats - STACK" src="http://blog.stack.com/wp-content/uploads/2015/09/Air-Squats-STACK.jpg" alt="Air Squats" width="654" height="368" /></p>
The idea here is to progress the athlete from a teaching model to a traditional rate for the Squat. Once the athlete understands positioning at each segment of the Squat, he or she can progress to fully understanding how to move from position to position. Once the athlete masters the movement at a slow rate, he or she can progress to a faster rater. Finally, he or she can increase volume and eventually add load.
<ul>
    <li><strong>Set 1:</strong> 10D 5H 10U x5 (meaning - 10 second descent to bottom of squat, 5 second hold in bottom of squat, 10 second ascent (up) from the bottom position)</li>
    <li><strong>Set 2:</strong> 5D 5H 5U x5</li>
    <li><strong>Set 3:</strong> 5D 3H 0U x5</li>
    <li><strong>Set 4:</strong> 0D 3H 0U x5</li>
    <li><strong>Sets 5 and 6:</strong> x8 traditional squats</li>
</ul>
<h2>Push-Ups</h2>
<p style="text-align: center;"><img class="aligncenter size-full wp-image-215359" title="Push-Ups - STACK" src="http://blog.stack.com/wp-content/uploads/2015/08/Push-Ups-STACK.jpg" alt="Push-Ups" width="654" height="368" /></p>

<ul>
    <li><strong>Set 1:</strong> 10H 5D 5U x5 (meaning - 10 second plank hold, 5 seconds down to the floor, 5 seconds up)</li>
</ul>
Progression here is similar to the Squat, increasing the rate of each set by decreasing the time as the coach sees fit. Even our elite athletes use the tempo option as a warm-up for their Olympic movements—for example, completing a 10-second Snatch with a PVC pipe to reinforce proper movement patterns, or our baseball and softball athletes completing 10-second swing prior to their hitting lessons.

<strong>References:</strong>
<ol>
    <li>Coyle, Daniel. (2009). <em>The Talent Code</em>. New York, NY.</li>
    <li>Magill, R.A. (2011). <em>Motor Learning and Control</em>. New York, NY</li>
</ol>
[cf]skyword_tracking_tag[/cf]";s:12:"post_excerpt";s:150:"The purpose of this article is to explain the importance of tempo training and how tempo manipulation can be used to teach athletes of all ages and...";s:11:"author_user";s:20:"cassie-reilly-boccia";s:11:"author_name";s:20:"Cassie Reilly-Boccia";s:10:"author_url";s:33:"http://www.athleteswarehouse.com/";s:12:"author_email";s:29:"CassieReilly-Boccia@stack.com";s:9:"author_id";s:3:"755";}i:2;O:8:"stdClass":14:{s:2:"id";s:6:"216691";s:4:"name";s:42:"6 Tips to Help Coach Athletes with Asthma ";s:10:"post_title";s:42:"6 Tips to Help Coach Athletes with Asthma ";s:4:"slug";s:41:"6-tips-to-help-coach-athletes-with-asthma";s:9:"post_name";s:41:"6-tips-to-help-coach-athletes-with-asthma";s:11:"post_status";s:7:"publish";s:9:"post_date";s:19:"2015-09-03 17:30:36";s:12:"post_content";s:6615:"<p dir="ltr"><img class="aligncenter size-full wp-image-216898" title="4. Know what can trigger an attack - STACK" src="http://blog.stack.com/wp-content/uploads/2015/09/4.-Know-what-can-trigger-an-attack-STACK.jpg" alt="4. Know what can trigger an attack" width="0" height="0" /></p>
<p dir="ltr">If you are a coach with athletes on your team who have asthma, you could have questions. How much do I condition them? What should I do if they have an asthma attack? Do they need different workouts? This list of tips will help you coach athletes with asthma.</p>

<h2>What Exactly is Asthma?</h2>
Some of your athletes may have asthma, and others could have exercise-induced asthma. According to the <a href="http://www.nhlbi.nih.gov/health/health-topics/topics/asthma" target="_blank">National Heart, Lung and Blood Institute</a>, when you have asthma your airways inflame and narrow, making it harder to breathe. Symptoms include wheezing, shortness of breath and chest tightness. This can happen because of allergies or be caused by other triggers.
<p dir="ltr">According to the <a href="http://www.aaaai.org/conditions-and-treatments/library/asthma-library/asthma-and-exercise.aspx">American Academy of Allergy Asthma &amp; Immunology</a>, people who have exercise-induced asthma, or an exercise-induced bronchospasm, have symptoms only while they exercise. Most people with asthma have exercise-induced asthma, but people with exercise-induced asthma may not have full-blown asthma.</p>

<h2>6 Tips To Follow</h2>
<h3><strong>1. Know which players have asthma</strong></h3>
<img class="aligncenter size-full wp-image-216895" title="Know which players have asthma - STACK" src="http://blog.stack.com/wp-content/uploads/2015/09/Know-which-players-have-asthma-STACK.jpg" alt="Know which players have asthma" width="654" height="368" />

Some athletes are afraid or embarrassed about having asthma, and they don't  speak up when they have symptoms. Make sure you know exactly who has asthma and watch out for symptoms of an attack.

If an athlete has symptoms of asthma but has not been diagnosed, tell him or her to see a doctor to be checked.
<h3><strong>2. Always make sure inhalers are easily accessible</strong></h3>
<img class="aligncenter size-full wp-image-216896" title="Always make sure inhalers are easily accessible - STACK" src="http://blog.stack.com/wp-content/uploads/2015/09/Always-make-sure-inhalers-are-easily-accessible-STACK.jpg" alt="Always make sure inhalers are easily accessible" width="654" height="368" />

Before practice starts, make sure everyone on your team who has asthma has their inhaler on the sidelines ready to go. The last thing you want is for one of your athletes to have an attack and be unprepared.
<h3><strong>3. Know the best times for athletes to use their medication</strong></h3>
<p style="text-align: center;"><img class="aligncenter size-full wp-image-216897" title="Know the best times for athletes to use their medication - STACK" src="http://blog.stack.com/wp-content/uploads/2015/09/3.-Know-the-best-times-for-athletes-to-use-their-medication-STACK.jpg" alt="Know the best times for athletes to use their medication" width="654" height="368" /></p>
According to <a href="http://www.beph.com/site;jsessionid=75A7BED9DA8C1E3C5A9562745206EA5A">Breathe Easy Play Hard Foundation</a>, most cases of asthma are different. Some athletes may be required to take medication before practice, while others require it after symptoms occur. Know when your asthmatic players need to take their medication, and make sure they do it.
<h3><strong>4. Know what can trigger an attack</strong></h3>
<p style="text-align: center;"><img class="aligncenter size-full wp-image-216898" title="Know what can trigger an attack - STACK" src="http://blog.stack.com/wp-content/uploads/2015/09/4.-Know-what-can-trigger-an-attack-STACK.jpg" alt="Know what can trigger an attack" width="654" height="368" /></p>
Knowing what can trigger an attack can really help control your athletes' asthma. Allergy season can really flare up an athlete's asthma, so be especially alert to those times. Also, according to the American Academy of Allergy Asthma &amp; Immunology, when it gets too cold outside, breathing in cold, dry air can trigger an attack, so maybe take a day to watch film or hit the weights.

A tip for <a href="http://www.stack.com/2014/12/18/exercise-in-cold/">exercising in the cold</a> is to make sure your players warm up properly. As they warm up, their airways get used to the temperature. While they are exercising, they could also cover their mouths with something, such as a scarf or a face mask.
<h3><strong>5. Never make them "push through it"</strong></h3>
<p style="text-align: center;"><img class="aligncenter size-full wp-image-216899" title="Never make them 'push through it' - STACK" src="http://blog.stack.com/wp-content/uploads/2015/09/5.-Never-make-them-push-through-it-STACK.jpg" alt="Never make them 'push through it'" width="654" height="368" /></p>
<p dir="ltr">According to Breathe Easy Play Hard Foundation, if an athlete with asthma is having a hard time breathing, he or she needs to slow down or take a break. Always let them recover. There's no such thing as pushing through it. That can trigger a more severe attack.</p>

<h3><strong>6. Stay positive about their condition and always support them</strong></h3>
<img class="aligncenter size-full wp-image-216900" title="Stay positive about their condition and always support them - STACK" src="http://blog.stack.com/wp-content/uploads/2015/09/Stay-positive-about-their-condition-and-always-support-them-STACK.jpg" alt="Stay positive about their condition and always support them" width="654" height="368" />

Just because athletes have asthma does not mean they cannot perform to the best of their abilities. Make them feel like they are no different from your other athletes. They can do most exercises as long as they have their medication handy. Always support your players and help them control their symptoms by following these tips.

<em><strong>READ MORE:</strong></em>
<ul>
    <li><strong><a href="http://www.stack.com/2006/09/01/dealing-with-asthma-and-sports/">Dealing with asthma and sports</a></strong></li>
    <li><strong><a href="http://www.stack.com/2015/08/26/6-amazing-benefits-of-eating-a-banana-every-day/?icn=homepage&amp;ici=Trending_5">How a banana a day could help asthma</a></strong></li>
    <li><strong><a href="http://www.stack.com/2013/11/20/pre-game-warm-up/">When to change your pre-game warm-up</a></strong></li>
</ul>
<div></div>
&nbsp;";s:12:"post_excerpt";s:0:"";s:11:"author_user";s:9:"rob-scott";s:11:"author_name";s:9:"Rob Scott";s:10:"author_url";s:0:"";s:12:"author_email";s:19:"rob.scott@stack.com";s:9:"author_id";s:3:"726";}} 
EOT;

$hugestr = trim($hugestr);


    $key = 's.Article.m.get_by_category_vertical.a.a:3:{i:0;i:8661;i:1;s:4:"8661";i:2;i:3;}';


    $result = \Cache::put($key, serialize($hugestr), 30);

    var_dump($result);


    }
} 
