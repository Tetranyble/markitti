<template>
    <div>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">People</h1>
        </div>
        <div class="row">
            <div class="col-md-3 mb-2" v-for="people in peoples">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><router-link :to="{
                                            name: 'showPeople',
                                            params: { url: people.url }
                                        }"> {{ people.name }}</router-link></h5>

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
                peoples: [],
            };
        },
        created() {
            this.getPeople();
        },
        methods: {
            getPeople(){
                axios.get("https://swapi.dev/api/people")
                    .then(res => {
                        this.peoples = res.data.results;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
        }
    };
</script>

<style></style>
