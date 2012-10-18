40K-Battle-Generator
====================

These files will produce a web app for generating all the information needed to fight a tabletop battle.
It will cover all of the randomly-generated components which are needed.  It will aggregate all of the rules
for the game onto one, easily referenced page.  I plan on implementing varying degrees of randomness granularity, 
so that players using the web app can choose which components of the battle they'd like the system to generate and 
which components they'd rather produce themselves.  Eventually, I would like the battle generator to integrate into 
a map-based campaign tracker, so that players can click on a map territory to attack and have the system automatically
generate an appropriate battle.

I would like the battle generator to incorporate graphical interface components, with a minimal number of text input 
fields.  I would like to provide pop-up tooltips for special rules and screen elements so that all the content for a 
single battle can be contained on a single page without being overly cluttered.  I would like to use CSS3 and reactive
design so that the page is equally usable on a monitor or smart phone (It would be nice to be able to use the web app
while out and about.).  I plan on using JavaScript, with some add-on libraries to handle the application logic.  I'm
thinking about using XML to store data used by the generator, with a MySQL or Postgres database as an option for storing
long-term records, or handling the later campaign tracker addon.  I would like to add aesthetic components which capture
the feel of the setting, so that besides being functional, the generator will be stylistically pleasing.

This component plan may sound aggressive, but I plan on completing small functional pieces of it at a time incrementally,
so as to get a working prototype produced as quickly as possible, with refinements being produced insofar as the 
application seems to be useful.