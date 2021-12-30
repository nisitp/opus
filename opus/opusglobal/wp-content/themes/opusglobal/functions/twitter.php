<?php

require __DIR__.'/vendor/TwitterAPIExchange.php';
require __DIR__.'/vendor/TwitterTextFormatter.php';

function opus_twitter_time_function($datetime) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'y',
        'm' => 'm',
        'w' => 'w',
        'd' => 'd',
        'h' => 'h',
        'i' => 'm',
        's' => 's',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k.$v;
        } else {
            unset($string[$k]);
        }
    }
    $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) : 'just now';
}

function opus_twitter_feed() {
    $twitter = new TwitterAPIExchange([
        'oauth_access_token' => "144267338-1EydtEuL224o814kPoYQRyuSmzxFtkITp9vTFz5X",
        'oauth_access_token_secret' => "3qYXtSMoSStEKDlJl1XZjz8pm0KQkMmmZsqu30cRQDZTB",
        'consumer_key' => "QW6fWc0ESLBxoUJzkaHQY5eNC",
        'consumer_secret' => "6BSk4LI7jWa2ZLt37xYbzHCvAUcSDmyxdMpBg1yVC2E2AWP82M"
    ]);
    $result = $twitter->setGetfield('?screen_name=opus&count=4&tweet_mode=extended')
        ->buildOauth('https://api.twitter.com/1.1/statuses/user_timeline.json', 'GET')
        ->performRequest();
    $result = json_decode($result);
    foreach ($result as $tweet) {
        $content = TwitterTextFormatter::format_text($tweet, [ 'show_retweeted_by' => false ]);
        $user = htmlentities($tweet->user->screen_name);
        $time = htmlentities(opus_twitter_time_function($tweet->created_at));

        echo <<<HTML
        <div class="home2-social__tweet">
            <h4 class="home2-social__title"><i class="fa fa-twitter" aria-hidden="true"></i> @{$user}&nbsp;•&nbsp;{$time}</h4>
            <p class="home2-social__content">{$content}</p>
        </div>
HTML;
    }
}
