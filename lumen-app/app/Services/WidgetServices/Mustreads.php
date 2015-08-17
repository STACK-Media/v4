<?php 

namespace App\Services\WidgetServices;

class Mustreads extends WidgetService
{
	function get($page)
	{
		// intiialize method
		$method 	= '_'.$page->sport;

		// grab sport data from config
		$articles 	= $this->$method();

		return array(
			'sport'			=> $page->sport,
			'articles'		=> $articles
		);
	}

	private function _football()
	{
		return array(
			'Football Exercises and Workouts'	=> array(
				'off-season-football-workout'			=> 'The Complete Off-Season Football Workout Plan',
				'summer-speed-training-football'		=> 'Football Summer Speed Training Program',
				'football-conditioning-drills-2'		=> '4 Football Conditioning Drills That Work',
				'football-summer-training-guide-2013'	=> 'Football Summer Training Guide 2013',
				'nfl-football-exercises'				=> '16 Cutting-Edge Exercises From the Best Players in the NFL'
			),
			'Football Nutrition'				=> array(
				'nfl-training-camp-nutrition' 				=> 'Feeding the Beasts: NFL Training Camp Nutrition',
				'healthy-eating-tips-for-football-players'	=> 'Healthy Eating Tips for Football Players',
				'nutrition-plan-for-football'				=> 'Nutrition Plan for Football',
				'the-football-players-grocery-list'			=> 'The Football Player\'s Grocery List'
			),
			'Football Drills'					=> array(
				'quarterback-throwing-drills-with-drew-brees'						=> 'Quarterback Throwing Drills With Drew Brees',
				'running-back-drills'												=> 'Running Back Drills: Hit the Right Hole',
				'defensive-back-footwork-drills'									=> 'Defensive Back Drills to Improve Your Footwork',
				'defensive-linemen-drills'											=> '5 Must-Do Drills for Defensive Linemen',
				'youth-football-offensive-line-drills'								=> 'Youth Football Offensive Line Drills: The Fundamentals'
			),
			'Football Injury Prevention'		=> array(
				'returning-to-football-after-an-acl-injury-the-adrian-peterson-way'	=> 'Returning to Football After an ACL Injury: The Adrian Peterson Way',
				'study-football-hits-cause-brain-changes-even-without-concussion'	=> 'Study: Football Hits Cause Brain Changes, Even Without Concussion',
				'develop-neck-strength-to-prevent-head-and-neck-injuries'			=> 'Develop Neck Strength to Prevent Head and Neck Injuries',
				'nfl-concussions'													=> 'Opinion: The NFL Is Not Causing the Concussion Epidemic'
			)
		);
	}
}