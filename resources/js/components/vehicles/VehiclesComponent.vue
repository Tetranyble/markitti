<template>
    <div>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Vehicles</h1>
        </div>
        <div class="row">
            <div class="col-md-3 mb-2" v-for="vehicle in vehicles">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><router-link :to="{
                                            name: 'showVehicle',
                                            params: { url: vehicle.url }
                                        }"> {{ vehicle.name }}</router-link></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Model: {{ vehicle.model }}</h6>
                        <router-link :to="{
                                            name: 'showVehicle',
                                            params: { url: vehicle.url }
                                        }" class="card-link"> {{ vehicle.name }} Details</router-link>
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
                vehicles: [],
            };
        },
        created() {
            this.getVehicles();
        },
        methods: {
            getVehicles(){
                axios.get("https://swapi.dev/api/vehicles")
                    .then(res => {
                        this.vehicles = res.data.results;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
        }
    };
</script>

<style></style>
