<template>
    <div>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Planet</h1>
        </div>
        <div class="row">
            <div class="offset-3 col-md-6" >
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Name: {{ planet.name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Rotation Period: {{ planet.rotation_period }}</h6>
                        <p class="card-text">Orbital Period: {{ planet.orbital_period }}</p>
                        <p class="card-text">Diameter: {{ planet.diameter }}</p>
                        <p class="card-text">Climate: {{ planet.climate }}</p>
                        <p class="card-text">Gravity: {{ planet.gravity }}</p>
                        <p class="card-text">Terrain: {{ planet.terrain }}</p>
                        <p class="card-text">Surface Water: {{ planet.surface_water }}</p>
                        <p class="card-text">Population: {{ planet.population }}</p>
                        <router-link :to="{name: 'planets'}" class="card-link"> Planets</router-link>
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
                planet: '',
            };
        },
        created() {
            this.getPlanet();
        },
        methods: {
            getPlanet(){
                axios.get(this.$route.params.url)
                    .then(res => {
                        this.planet = res.data;

                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
        }
    };
</script>

<style></style>
