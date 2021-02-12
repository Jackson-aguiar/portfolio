<template>
    <div class="container col-md-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <form @submit.prevent="searchPokemon">
                    <div class="form-group">
                        <label class="text-light text-label">Buscar Pokémon</label>
                        <div class="input-group">
                            <input class="form-control" v-model="pokemon" placeholder="Digite o nome de um pokémon, Ex: Pikachu">
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-outline-primary">
                                    Buscar<img class="img-fluid" src="">
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

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
                <div class="col" v-for="types in data.types" :key="types">
                    <p class="nav-link lead">
                        {{ucFirst(types.type.name)}}
                    </p>
                </div>
            </div>


            <div class="row col-sm-18 col-md-18 col-lg-16 col-xl-15 text-light">
                    <h4 class="jumbotron-heading">Habilidades</h4>
            </div>
            <div class="row col-sm-7 text-light" v-for="abilities in data.abilities" :key="abilities">
                <div class="col">
                    <p class="nav-link lead">
                        {{ucFirst(abilities.ability.name)}}
                    </p>
                </div>
            </div>


            <div class="row col-sm-4 col-md-18 col-lg-16 col-xl-15 text-light">
                <h4 class="jumbotron-heading">Status</h4>
            </div>
            <div class="row col-sm-7 text-light" v-for="stats in data.stats" :key="stats">
                <div class="col">
                    <p class="nav-link lead">
                        {{ucFirst(stats.stat.name)}}: {{stats.base_stat}}
                    </p>
                </div>
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
            this.searchPokemon();
        },
        methods: {
            searchPokemon(){
                axios.get('https://pokeapi.co/api/v2/pokemon/' + this.pokemon + '/')
                .then((response) => {
                    this.data = response.data;
                })
                .catch(function(error){
                    console.log(error);
                });
            },
            ucFirst(string){
                return string.charAt(0).toUpperCase() + string.slice(1);
            },
            arrayLength(array){
                return array.length;
            }
        }
    }
</script>
