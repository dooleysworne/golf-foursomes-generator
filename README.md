# golf-foursomes-generator

A web-based foursomes/threesomes random generator for golf leagues coded in PHP. No database required. This web app began life as a disc golf utility, but was easily adapted for the ball golfing community.

In this little application, players are entered and selected from a plain TXT file that is managed by someone in the league. When new players join the league, they're added to the players.txt file via the manage.php script.  If a player or players show up just to play as a guest or as a visitor, there's a button at the top that allows them to be added for that day's session only.  

You'll see a slider at the top that will switch the app between a foursomes/threesomes mode and a threesomes/twosomes mode.

Here's a demo that has the players.txt file set at read-only:

https://cloud.roe3.org/mdrone/foursomes/foursomes.php

All you have to do is download the files in this collection, place them in a directory on a PHP-enabled server, make the players.txt file writeable by the server and you're in business. If you uncomment the first line in the manage.php file, you can turn on a very basic user authorization function that will challenge anyone who tries to manipulate the players list. The default username is "player" and the default password is "manager".

The username and password can be changed by editing the userauth.php script.

Managing the players list is done by clicking the hyperlinked asterisk at the bottom left of the foursomes.php screen.

As a bonus, a doubles team randomizer is included. If there happens to be an odd number of players, the odd man out typically plays what is called "Cali", meaning that he/she plays as an individual, but is alloted an additional throw per hole without penalty.

I'm sure a better programmer could churn out some much cleaner code, but hey! . . . it works! It sure beats the heck out of picking cards from a deck.
