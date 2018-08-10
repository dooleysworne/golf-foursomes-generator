# dg-foursomes-generator
A web-based foursomes/threesomes random generator for disc golf leagues (or regular golf leagues) coded in PHP. No database required.

After years of "flipping discs" and using a deck of playing cards to determine what the foursomes (and threesomes) were going to be at our Sunday afternoon league outings, I decided to see if I could develop a mobile-friendly web application that would allow us to select players as they showed up and let the programming randomly assign players to groups.

Our version is tied to a database-backed scoring system that we use, so the players are plucked from one of those data tables. In this system, the players are entered and selected from a plain TXT file that is managed by someone in the league.

We are trying to raise money to replace the 15+ year old baskets at the course in our local park. If you'd like to help us by kicking in a small contribution toward that goal, please use the PayPal button below.

<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_donations">
<input type="hidden" name="business" value="weltong01@gmail.com">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="item_name" value="Effingham Disc Golf Evangelists">
<input type="hidden" name="no_note" value="0">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
