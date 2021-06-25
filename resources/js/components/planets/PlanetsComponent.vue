<template>
    <div>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Planets</h1>
        </div>
        <div class="row">
            <div class="col-md-3 mb-2" v-for="planet in planets">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><router-link :to="{
                                            name: 'showPlanet',
                                            params: { url: planet.url }
                                        }"> {{ planet.name }}</router-link></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Diameter: {{ planet.diameter}}</h6>
                        <router-link :to="{
                                            name: 'showPeople',
                                            params: { url: planet.url }
                                        }" class="card-link"> {{ planet.name }} Details</router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                planets: [],
            };
        },
        created() {
            this.getPlanets();
        },
        methods: {
            getPlanets(){
                axios.get("https://swapi.dev/api/planets")
                    .then(res => {
                        this.planets = res.data.results;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
        }
    };
</script>

<style></style>
