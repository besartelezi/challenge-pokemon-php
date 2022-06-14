<?php
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pokédex</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/x-icon" href="images/pokeball.svg">
</head>
<body>
<section class="row" id="EntirePokdex">
    <div class="left-column" id="LeftSidePokedex">
        <section class="PokedexField">

            <?php

            if(isset($_POST["searchPokemonButton"])) {
                var_dump("button is working!");
            }

            ?>

            <label for="SearchPokemon"></label>
            <form method="post">
                <input type="text" id="SearchPokemon" placeholder="Search Pokémon by ID or name!"/>
                <input type="submit" name="searchPokemonButton" id="searchPokemonButton"
                       class="button" value="Search Pokémon!" />



        </section>
        <div class ="IDNumber" id="IDNumber"> ID Number of Pokémon</div>
        <section class="ScreenWrapper">
            <div class="ScreenBackground">
                <div class="PokemonImage">
                    <img src="images/pokeball.svg" id="PokemonPicture">
                </div>
            </div>
            <div class ="Name" id="Name">Name of Pokémon</div>
            <div class="EvolutionRow" id="EvolutionRow">

            </div>
        </section>
        <section class="BottomSide">
        </section>
    </div>
    <div class="middle-column" id="PokedexFlipThing">

    </div>
    <div class="right-column" id="RightSidePokedex">
        <div class="PokemonDescriptionScreen">
            <div id = "PokemonDescriptionText">Pokémon Description</div>
        </div>
        <div class="BlueButtonsTitle" id="PokemonMovesTitle"></div>
        <div class="BlueButtonsComplete" id="PokemonMoves">
            <div class ="BlueButtons" id="PokemonMove1"></div>
            <div class ="BlueButtons" id="PokemonMove2"></div>
            <div class ="BlueButtons" id="PokemonMove3"></div>
            <div class ="BlueButtons" id="PokemonMove4"></div>
        </div>
        <div class="Typing" id = "TypingTitle">
        </div>
        <div class="Abilities">
            <div id = "AbilityTitles">The Pokémon can have the following abilities:</div>
            <div class ="AbilityWrapper">
                <div class="Ability" id="Ability1"></div>
                <div class="Ability" id="Ability2"></div>
            </div>
        </div>

    </div>
</section>
</body>
</html>


