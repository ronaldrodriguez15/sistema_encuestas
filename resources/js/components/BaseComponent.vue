<template>
    <v-app>
        <v-main style="background-color:#f3f4f6;">
            <v-app-bar
             color="light-blue darken-1"
             dense
             dark
            >
                <v-toolbar-title>
                    <div class="icon-container">
                        <div class="icon-span">
                            <v-icon size="36">mdi-file-document-outline</v-icon>
                        </div>
                        <div class="icon-font font-span ">
                            Ecy
                        </div>
                        <div class="icon-font icon-font-primary">
                            Salud
                        </div>
                    </div>
                </v-toolbar-title>
            </v-app-bar>

            <v-container class="mt-4">

                <v-row align="center" justify="center">

                    <v-col cols="12" md="12" sm="12">

                        <v-card elevation="12">
                            <v-row no-gutters>
                                <v-col cols="12" md="6">
                                    <colina-component></colina-component>
                                </v-col>
                                <v-col cols="12" md="6">
                                    <country-component></country-component>
                                </v-col>
                            </v-row>
                        </v-card>

                    </v-col>

                </v-row>

            </v-container>
        </v-main>
    </v-app>
</template>


<style  scoped>

    .icon-container {
        display: grid;
        grid-template: repeat(2, 1fr) / repeat(2, 1fr);
        align-items: center;
        justify-content: center;
    }
    
    .icon-span {
        grid-row: 1 / span 2;
        justify-self: end;
    }

    .font-span {
        align-self: end;
    }

    .icon-font {
        font-size: 15px;
        text-transform: uppercase;
        font-weight: bolder;
        letter-spacing: 2px;
        font-family: 'Staatliches', cursive;
    }

    .icon-font-primary {
        font-size: 20px;
        margin-top: -8px;
    }
</style>

<script>
    import ColinaComponent from './ColinaComponent.vue'
    import CountryComponent from './CountryComponent.vue'

    export default {

        components: {
            ColinaComponent,
            CountryComponent
        },
    }
</script>


