<template>
    <div>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Employees</h1>
        </div>
        <div class="row">
            <div class="offset-3 col-md-6" >
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Name: {{ people.name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Height: {{ people.height }}</h6>
                        <p class="card-text">Mass: {{ people.mass}}</p>
                        <p class="card-text">Hair Color: {{ people.hair_color }}</p>
                        <p class="card-text">Skin Color: {{ people.skin_color }}</p>
                        <p class="card-text">Eye Color: {{ people.eye_color }}</p>
                        <p class="card-text">Birth Year: {{ people.birth_year }}</p>
                        <p class="card-text">Gender: {{ people.gender }}</p>
                        <router-link :to="{
                                            name: 'showPeople',
                                            params: { url: people.url }
                                        }" class="card-link"> {{ people.name }} Details</router-link>
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
                people: '',
            };
        },
        created() {
            this.getPeople();
        },
        methods: {
            getPeople(){
                axios.get(this.$route.params.url)
                    .then(res => {
                        this.people = res.data;

                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
        }
    };
</script>

<style></style>
