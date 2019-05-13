"use strict";

window.addEventListener('load', function() {





//start spr-countdown
var $action_text_timer_countdown__0 = $('#action-text-timer-countdown--0');
$action_text_timer_countdown__0.countdown('2019/03/11 23:59:59', function (event) {
    $action_text_timer_countdown__0.find('.days').html(event.strftime('%D'));
    $action_text_timer_countdown__0.find('.hours').html(event.strftime('%H'));
    $action_text_timer_countdown__0.find('.minutes').html(event.strftime('%M'));
    $action_text_timer_countdown__0.find('.seconds').html(event.strftime('%S'));
}).on('finish.countdown', function () {

}//end finish.countdown
);//end spr-countdown








});
