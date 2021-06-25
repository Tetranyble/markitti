<template>
    <div>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Vehicle</h1>
        </div>
        <div class="row">
            <div class="offset-3 col-md-6" >
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Name: {{ vehicle.name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Model: {{ vehicle.model }}</h6>
                        <p class="card-text">manufacturer: {{ vehicle.manufacturer }}</p>
                        <p class="card-text">Cost in Credits: {{ vehicle.cost_in_credits }}</p>
                        <p class="card-text">Length: {{ vehicle.length }}</p>
                        <p class="card-text">Max atmosphering Speed: {{  vehicle.max_atmosphering_speed }}</p>
                        <p class="card-text">Crew: {{ vehicle.crew }}</p>
                        <p class="card-text">Passengers: {{ vehicle.passengers }}</p>
                        <p class="card-text">Cargo Capacity: {{ vehicle.cargo_capacity }}</p>
                        <p class="card-text">Consumables: {{ vehicle.consumables }}</p>
                        <p class="card-text">Vehicle Class: {{ vehicle.vehicle_class }}</p>
                        <router-link :to="{name: 'vehicles'}" class="card-link"> Vehicles</router-link>
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
                vehicle: '',
            };
        },
        created() {
            this.getVehicle();
        },
        methods: {
            getVehicle(){
                axios.get(this.$route.params.url)
                    .then(res => {
                        this.vehicle = res.data;

                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
        }
    };
</script>

<style></style>
