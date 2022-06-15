<!-- Getting all the needed information from the API -->
<?php $searchedPokemon = "https://pokeapi.co/api/v2/pokemon/"; ?>
<?php $pokemonSpecies = "https://pokeapi.co/api/v2/pokemon-species/"; ?>
<!-- the php if(isset()), according to me, will make something visible once the user has input something -->
<?php if(isset($_GET['pokemonName'])): ?>

    <?php
    //Adds the searched ID or name of the Pokémon to the API URL
    //In JS, you add something to a string by adding a '+' sign between strings, in PHP, you do this like how I did it here
    $searchedPokemon .= $_GET["pokemonName"];

    $pokemonSpecies .= $_GET["pokemonName"];
    ?>

    <?php
    //Get data of searched Pokémon
    $getPokemonData = file_get_contents($searchedPokemon);
    //Set data into an array
    $getPokemonDataArray = json_decode($getPokemonData);
    //Get image of searched Pokémon
    $pokemonImage = $getPokemonDataArray->sprites->other->home->front_default;
    ?>
<?php endif; ?>

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
        <div class ="IDNumber" id="IDNumber"> ID Number of Pokémon:</div>
        <?php if(isset($_GET['pokemonName'])): ?>
            <?php
            //show ID of searched Pokémon
            echo $getPokemonDataArray->id; ?>
        <?php endif; ?>

        <section class="ScreenWrapper">
            <div class="ScreenBackground">
                <div class="PokemonImage">
                    <!-- Shows image of Pokémon -->
                    <?php if(isset($_GET['pokemonName'])): ?>
                        <img src="<?php echo $pokemonImage;?>" alt="The Pokémon that the user has searched for" id="PokemonPicture">
                    <?php endif; ?>
                </div>
            </div>
            <div class ="Name" id="Name">Name of Pokémon:</div>
            <!-- Shows name of Pokémon -->
            <?php if(isset($_GET['pokemonName'])): ?>
                <?php
                echo $getPokemonDataArray->name;
                ?>
            <?php endif; ?>
            <div class="EvolutionRow" id="EvolutionRow">
                <?php if(isset($_GET['pokemonName'])): ?>

                    <?php
                    //Get data of the species searched Pokémon
                    $getSpeciesData = file_get_contents($pokemonSpecies);
                    //Set data into an array
                    $getSpeciesDataArray = json_decode($getSpeciesData);

                    $getEvolutionChainURL = $getSpeciesDataArray->evolution_chain->url;
                    $getEvolutionsData = file_get_contents($getEvolutionChainURL);
                    $getEvolutions = json_decode($getEvolutionsData);

                    ?>

                    <?php
                //getting the name of the first pokemon in the evolutionary line
                $baseFormName = $getEvolutions->chain->species->name;
                //getting the API link to said pokemon
                $fetchBaseFormAPI = "https://pokeapi.co/api/v2/pokemon/";
                $fetchBaseFormAPI .= $baseFormName;
                $fetchBaseFormImage = file_get_contents($fetchBaseFormAPI);
                $getBaseFormImage = json_decode($fetchBaseFormImage);
                //getting the image URL of said pokemon
                $baseFormImage = $getBaseFormImage->sprites->front_default;
                    if ($getEvolutions->chain->evolves_to){
                        for ($i = 0; $i < count($getEvolutions->chain->evolves_to); $i++){
                            $evolutionNames = $getEvolutions->chain->evolves_to[$i]->species->name;
                            $fetchEvolutionAPI = "https://pokeapi.co/api/v2/pokemon/";
                            $fetchEvolutionAPI .= $getEvolutions->chain->evolves_to[$i]->species->name;
                            $fetchEvolutionImage = file_get_contents($fetchEvolutionAPI);
                            $getEvolutionImage = json_decode($fetchEvolutionImage);
                            $evolutionImage[$i] = $getEvolutionImage->sprites->front_default;
                            if ($getEvolutions->chain->evolves_to[$i]->evolves_to){
                                for ($j = 0; $j < count($getEvolutions->chain->evolves_to[$i]->evolves_to); $j++){
                                    $secondEvolution = $getEvolutions->chain->evolves_to[$i]->evolves_to[$j]->species->name;
                                    var_dump($secondEvolution);
                                }
                            }
                        }
                    }
                    ?>
                <!-- Using php if(isset()), the img src will only be visible if there has been an src assigned to it.
                This means, that the images are invisible until the user has searched for a Pokémon
                 I added 8 img tags for the first evolutions, because the current pokemon with the most evolutions is Eevee with 8 Eeveelutions
                 However, this can still change in the future, so this isn't the best way to code this in my opinion
                 If i can find a better way to code this part, I will definitely try to do that -->
                <?php endif; ?>
                <img src="<?php echo $baseFormImage ?>" alt="the base form of the searched Pokémon">
                <img src="<?php if(isset($evolutionImage[0])): ?>
                <?php echo $evolutionImage[0] ?><?php endif; ?>">
                <img src="<?php if(isset($evolutionImage[1])): ?>
                <?php echo $evolutionImage[1] ?><?php endif; ?>">
                <img src="<?php if(isset($evolutionImage[2])): ?>
                <?php echo $evolutionImage[2] ?><?php endif; ?>">
                <img src="<?php if(isset($evolutionImage[3])): ?>
                <?php echo $evolutionImage[3] ?><?php endif; ?>">
                <img src="<?php if(isset($evolutionImage[4])): ?>
                <?php echo $evolutionImage[4] ?><?php endif; ?>">
                <img src="<?php if(isset($evolutionImage[5])): ?>
                <?php echo $evolutionImage[5] ?><?php endif; ?>">
                <img src="<?php if(isset($evolutionImage[6])): ?>
                <?php echo $evolutionImage[6] ?><?php endif; ?>">
                <img src="<?php if(isset($evolutionImage[7])): ?>
                <?php echo $evolutionImage[7] ?><?php endif; ?>">
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


