<template>
    <div class="container my-5 col-md-5">
        <!--Busca Pokémon-->
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <form @submit.prevent="searchPokemon">
                    <div class="form-group">
                        <label class="text-light text-label">Busca Pokémon</label>
                        <div class="input-group">
                            <input class="form-control" v-model="pokemon" placeholder="Digite o nome de um pokémon, Ex: Pikachu">
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-outline-primary">
                                    <img class="img-fluid" :src="'img/pokemon/search.png'">
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!--Nome e Foto-->
        <div class="my-5">
            <div class="row justify-content-center">
                <h3 class="text-light ml-2">{{ucFirst(data.species.name)}}</h3>
            </div>
            <div class="row justify-content-center">
                <img :src="data.sprites.front_default" class="img-fluid ml-4">
            </div>
            <hr class="bg-light">
            <div class="row text-light">
                <h4 class="jumbotron-heading">Tipo</h4>
            </div>
            <div class="row col-sm-18 col-md-18 col-lg-16 col-xl-15 text-light" >
                <div class="col" v-for="types in data.types" :key="types.length">
                    <p class="nav-link lead">
                        {{ucFirst(types.type.name)}}
                    </p>
                </div>
            </div>

            <!--Habilidades-->
            <div class="row col-sm-18 col-md-18 col-lg-16 col-xl-15 text-light">
                    <h4 class="jumbotron-heading">Habilidades</h4>
            </div>
            <div class="row col-sm-18 text-light" v-for="abilities in data.abilities" :key="abilities.length">
                <div class="col" >
                    <p class="nav-link lead">
                        {{ucFirst(abilities.ability.name)}}
                    </p>
                </div>
            </div>

            <!--Status-->
            <div class="row col-sm-18 col-md-18 col-lg-16 col-xl-15 text-light">
                <h4 class="jumbotron-heading">Status</h4>
            </div>
            <div class="row col-12 text-light">
                <ul class="nav">
                    <li class="nav-item">
                        <p class="nav-link lead">HP: {{data.stats[0].base_stat}}</p>
                    </li>
                    <li class="nav-item">
                        <p class="nav-link lead">Ataque: {{data.stats[1].base_stat}}</p>
                    </li>
                    <li class="nav-item">
                        <p class="nav-link lead">Defesa: {{data.stats[2].base_stat}}</p>
                    </li>
                    <li class="nav-item">
                        <p class="nav-link lead">Ataque Especial: {{data.stats[3].base_stat}}</p>
                    </li>
                    <li class="nav-item">
                        <p class="nav-link lead">Defesa Especial: {{data.stats[4].base_stat}}</p>
                    </li>
                    <li class="nav-item">
                        <p class="nav-link lead">Velocidade: {{data.stats[5].base_stat}}</p>
                    </li>
                </ul>
            </div>


            <div class="row col-sm-18 col-md-18 col-lg-16 col-xl-15 text-light">
                <h4 class="jumbotron-heading">Movimentos</h4>
            </div>
            <div class="row col-sm-18 col-md-18 col-lg-16 col-xl-15 text-light">
                <div class="col">
                    <p class="nav-link lead">
                        Quantidade: {{arrayLength(data.moves)}}
                    </p>
                </div>
            </div>
        </div>
    </div>


    <!-- Dados Exibidos -->



</template>
<script>
    export default {
        data () {
            return {
                pokemon: 'charmander',
                data: []
            }
        },
        mounted () {
            this.searchPokemon(); //metodo de busca
        },
        methods: {
            searchPokemon(){
                if(this.pokemon !== null && this.pokemon !== ''){
                    axios.get('https://pokeapi.co/api/v2/pokemon/' + this.pokemon.toLowerCase() + '/') //requisitando api
                    .then((response) => {
                        this.data = response.data; //atribuindo a resposta a variavel
                    })
                    .catch(function(error){ //caso erro, escreva no console
                        console.log(error);
                    });
                }
            },
            ucFirst(string){ //String para primeira letra em maiúsculo
                return string.charAt(0).toUpperCase() + string.slice(1);
            },
            arrayLength(array){ //Retorna Tamanho do array
                return array.length;
            }
        }
    }
</script>
