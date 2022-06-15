# PHP, (not that) Pretty Huge (of a) Problem
For this challenge, I will be making a Pokédex again, but this time I will make it with PHP, and not with Javascript.<br>
If you want to check out my previous JS Pokédex, [here is the repository](https://github.com/besartelezi/ajax-pokedex), and [here is the Pokédex itself](https://besartelezi.github.io/ajax-pokedex/). </br>

This will be the very first time in my entire life that I will be using PHP. 
But, because I know Javascript, PHP should not be that huge of a problem. 
I will be using the HTML and JS I already wrote for my previous Pokédex for this one, but I will be changing all the JS to PHP. </br>

I'm assuming there are a lot of similarities between JS and PHP, but at the end of the day they are two different programming languages.
issues will most definitely occur, but I will handle them accordingly. <br>

I really like this challenge, since it will prove that once I have learned my first programming language, I can learn other programming languages way faster.
It also goes to show how adaptability and a strong drive to learn are some of the most important qualities you can have in the IT sector.

## The most ample way to learn things, is by ex-ample
I won't be expecting to be a PHP master at the end of this assignment, but I will be expecting to have a better understanding of the fundamentals of PHP.
I also expect to learn these things, through the knowledge I have gained from Javascript.
By using everything I did in Javascript as an example, I'm more that confident enough that I wil learn PHP at an adequate speed.
**The most ample way to learn things, is by ex-ample.** <br>

I have found a rather strange problem with PHP though, but I was able to resolve it.
When I wanted to check out my website locally, I was greeted by a 502 bad gateway error.
First I thought there was a problem with how I installed PHP, Apache and MySQL on my computer, but this was thankfully not the case.
I had to pick a CLI interpreter for my PHPStorm.
Once I added the locally installed PHP.exe file on my computer as the CLI interpreter, the error disappeared and everything went smoothly.

## The PHP Experience
Starting out, I thought that I would get the hang of it pretty quickly because I understand Javascript, but boy did this assignment humble me very fast.
PHP is no laughing matter, and I lost quite a bit of time because I went in on this assignment with a very bad mentality.
For now, I will start out by creating some smaller goals that I want to achieve.
I'll go back to my roots, split up the big bad assignment, into smaller do-able tasks that I'll be able to complete.
I added a picture that perfectly encapsulates how I started out with this assignment.

![Me starting out with PHP.](/images/risktaker.webp)

## To-Do or not To-Do? That's not even a good question of course I have to do it!
For now, these are some small tasks that I want to achieve:
* Add a function that will do something small when the Search Pokémon button is clicked. 
* Get the user input when the button is clicked.
* Fetch the PokéAPI and get data of one specific Pokémon.

I will mainly focus on the button.
I also really want to know what the best way is to write code in PHP.
Can I separate the HTML and the PHP completely from each other? Or do I need to mix both languages together? 
Find out next time on the new episode of Besart PHP Z!

###### Editor's note: I do have to mix both languages together. I figured that out the hard way, but I figured it out nonetheless!

## The first step is always the hardest one to take
Starting out with smaller, more do-able goals was exactly the way to go. 
After I figured out how to var_dump() the user's input, I was quickly able to do more things.
As of now, my Pokédex **can show the ID, Name, and an image of the Pokémon the user has searched for!** <br>
The next thing I will focus on, is to try and show the entire evolutionary line of the Pokémon.
After I'm done with that, I will also add the CSS I prepared for my previous Pokédex, to this Pokédex.

## Evolution definition, make them Professors go crazy!
Getting the names of all the evolutions of the Pokémon was something that I already did in my last Pokédex, so that wasn't that complicated.
The biggest obstacle with PHP was showing the images of the evolutions.
I was looking for something similar to the "createElement" function of Javascript but in PHP.
I did found some things that seemed interesting, but they didn't seem like what I was exactly looking for.
Eventually, I just added img tags in HTML and added the URL links of the images to the src. <br>

The problem here was that, not all Pokémon have evolutions, and on the website itself you could see that there was a broken image URL.
But wait, I got an idea! <br>

![Idea time!](images/homer.gif) <br>

By using if(isset()) I can make something visible, only when what I selected has a value set to it.
You can see the code I used here:

````
<img src="<?php if(isset($evolutionImage[0])): ?>
<?php echo $evolutionImage[0] ?><?php endif; ?>">
<img src="<?php if(isset($evolutionImage[1])): ?>
<?php echo $evolutionImage[1] ?><?php endif; ?>">
...
````
