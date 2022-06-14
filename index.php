<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pokédex</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/x-icon" href="pokeball.svg">
</head>
<body>
<section class="row" id="EntirePokdex">
    <div class="left-column" id="LeftSidePokedex">
        <section class="PokedexField">
            <label for="SearchPokemon"></label>
            <form action="index.php" method="get">
                <input type="text" id="SearchPokemon" name="pokemonName" placeholder="Search Pokémon by ID or name!"/>
                <input type="submit" name="searchPokemonButton" id="searchPokemonButton"
                       class="button" value="Search Pokémon!" />
        </section>
        <?php $pokemonAPI = "https://pokeapi.co/api/v2/"; ?>

        <?php if(isset($_GET['pokemonName'])): ?>
        <?php
        //Adds the searched ID or name of the Pokémon to the API URL
        //In JS, you add something to a string by adding a '+' sign between strings, in PHP, you do this like how I did it here
        $searchedPokemon = "https://pokeapi.co/api/v2/pokemon/";
        $searchedPokemon .= $_GET["pokemonName"];
        ?>
        <?php endif; ?>


        <div class ="IDNumber" id="IDNumber"> ID Number of Pokémon:</div>
        <?php if(isset($_GET['pokemonName'])): ?>
        <?php
        //Get data of searched Pokémon
        $getPokemonData = file_get_contents($searchedPokemon);
        $getPokemonDataArray = json_decode($getPokemonData);
        ?>
        <?php
        echo $getPokemonDataArray->id;
        ?>
        <?php endif; ?>
        <section class="ScreenWrapper">
            <div class="ScreenBackground">
                <div class="PokemonImage">
                    <img src="images/pokeball.svg" id="PokemonPicture">
                </div>
            </div>
            <div class ="Name" id="Name">Name of Pokémon:</div>
            <?php if(isset($_GET['pokemonName'])): ?>
                <?php
                echo $getPokemonDataArray->name;
                ?>
            <?php endif; ?>

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


