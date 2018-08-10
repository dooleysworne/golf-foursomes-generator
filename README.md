# discgolf-foursomes-generator
A web-based foursomes/threesomes random generator for disc golf leagues (or regular golf leagues) coded in PHP. No database required.

After years of "flipping discs" and using a deck of playing cards to determine what the foursomes (and threesomes) were going to be at our Sunday afternoon league outings, I decided to see if I could develop a mobile-friendly web application that would allow us to select players as they showed up and let the programming randomly assign players to groups.

Our version is tied to a database-backed scoring system that we use, so the players are plucked from one of those data tables. In this system, the players are entered and selected from a plain TXT file that is managed by someone in the league. When new players join the league, they're added to the players.txt file via the manage.php script.  If players show up just to play as a guest or as a visitor, there's a button at the top that allows them to be added for that day's session only.

All you have to do is place these files in a directory on a server, make the players.txt file writeable by the server and you're in business. If you uncomment the first line in the manage.php file, you can turn on a very basic user authorization function that will challenge anyone who tries to manipulate the players list. The default credentials are:

username: disc
password: golf

These can be changed by editing the userauth.php script.

Managing the players list is done by clicking the hyperlinked asterisk at the bottom left of the foursomes.php screen.

As a bonus, a doubles team randomizer is included. If there happens to be an odd number of players, the odd man out typically plays what we call "Cali" (short for California style), meaning that he plays as an individual, but is alloted on additional throw per hole without penalty. Sort of a legal "mulligan".

We are trying to raise money to replace the 15+ year old baskets at the course in our local park. If you'd like to help us by kicking in a small contribution toward that goal, please consider a PayPal donation.

http://edge.byethost18.com/demo/contribute.html
