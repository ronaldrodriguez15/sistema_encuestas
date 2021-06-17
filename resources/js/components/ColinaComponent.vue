<template>
    <div :class="$vuetify.breakpoint.width <= 381 ? 'pa-3 ' : 'pa-12'">
        <v-card-title
            class="d-flex justify-center"
        >
           <div>
                <h1
                    class="text-center title font-weight-semibold blue-grey--text text--darken-4 text--accent-3"
                >
                    Descarga de encuestas <strong>ECY Colinas </strong>
                </h1>
                <div style="border-top: 5px solid #039be6; width: 70px; border-radius: 40px;" class="mx-auto"></div>
           </div>
        </v-card-title>

        <v-card-subtitle
            class="pb-2"
        >
            <div class="mt-6 caption text-center">
                <p>Realiza la descarga de las encuestas del 
                    <strong>ECY Colinas</strong> 
                    a trav&eacute;s de este formulario.
                </p>
            </div>

        </v-card-subtitle>

        <v-card-text>
            <v-form 
                ref="form"
                v-model="valid"
                lazy-validation
            >
                <v-row>
                    <v-col
                        cols="12"
                        sm="12"
                    >
                        <v-dialog
                            ref="dialog"
                            :return-value.sync="date"
                            persistent
                            v-model="modal"
                            width="300px"
                        >
                            <template v-slot:activator="{ on, attrs }">
                                <v-text-field
                                    v-model="date"
                                    label="Selecciona las fechas"
                                    prepend-icon="mdi-calendar"
                                    readonly
                                    v-bind="attrs"
                                    v-on="on"
                                    color="light-blue darken-1"
                                    required
                                    :rules="dateRules"
                                ></v-text-field>
                            </template>

                            <v-date-picker
                                v-model="date"
                                range
                                :first-day-of-week="1"
                                locale="rla-es"
                                color="light-blue darken-3"
                                header-color="light-blue darken-1"
                            >
                                <v-spacer></v-spacer>
                                <v-btn
                                    text
                                    color="primary"
                                    @click="modal = false"
                                >
                                    Cancelar
                                </v-btn>
                                <v-btn
                                    text
                                    color="primary"
                                    @click="$refs.dialog.save(date)"
                                >
                                    OK
                                </v-btn>
                            </v-date-picker>

                        </v-dialog>
                    </v-col>
                        {{ date }}
                        {{ allColumns }}
                        {{ columns }}
                        {{ valid }}
                    <v-container class="py-0 mt-n5">
                        <v-checkbox 
                            v-model="allColumns"
                            color="info"
                            @click="checkAllColumn"
                            :rules="columnsRules"
                        >
                            <template v-slot:label>
                                <div class="caption">
                                    Seleccionar todos los campos
                                </div>
                            </template>
                        </v-checkbox>
                  
                     </v-container>

                    <v-expansion-panels
                        v-model="panel"
                        :disabled="allColumns"
                        class="pa-4 mt-n4"
                        focusable
                    >
                        <v-expansion-panel>
                            <v-expansion-panel-header
                                class="caption"
                            >
                                Campos
                            </v-expansion-panel-header>
                            <v-expansion-panel-content>
                                <v-container fluid >
                                    <v-row>
                                        <v-col
                                            cols="12"
                                            sm="4"
                                            md="4"
                                        >
                                            <v-checkbox
                                                color="info"
                                                v-model="columns"
                                                value="code"
                                                :rules="columnsRules"
                                            >
                                                <template v-slot:label>
                                                    <div class="caption">
                                                        C&oacute;digo
                                                    </div>
                                                </template>
                                            </v-checkbox>
                                            <v-checkbox 
                                                color="info"
                                                v-model="columns"
                                                value="dateCol"
                                                :rules="columnsRules"
                                            >
                                                <template v-slot:label>
                                                    <div class="caption">
                                                        Fecha
                                                    </div>
                                                </template>
                                            </v-checkbox>
                                            <v-checkbox 
                                                color="info"
                                                v-model="columns"
                                                value="phone"
                                                :rules="columnsRules"
                                            >
                                                <template v-slot:label>
                                                    <div class="caption">
                                                        Tel&eacute;fono
                                                    </div>
                                                </template>
                                            </v-checkbox>
                                        </v-col>
                         
                                        <v-col
                                            cols="12"
                                            sm="4"
                                            md="4"
                                        >
                                            <v-checkbox
                                                color="info"
                                                v-model="columns"
                                                value="question1"
                                                :rules="columnsRules"

                                            >
                                                <template v-slot:label>
                                                    <div class="caption">
                                                        Pregunta 1
                                                    </div>
                                                </template>
                                            </v-checkbox>

                                            <v-checkbox 
                                                color="info"
                                                v-model="columns"
                                                value="question2"
                                                :rules="columnsRules"
                                            >
                                                <template v-slot:label>
                                                    <div class="caption">
                                                        Pregunta 2
                                                    </div>
                                                </template>
                                            </v-checkbox>
                                        </v-col>
                              
                                        <v-col
                                            cols="12"
                                            sm="4"
                                            md="4"
                                        >
                                            <v-checkbox
                                                color="info"
                                                v-model="columns"
                                                value="question3"
                                                :rules="columnsRules"
                                            >
                                                <template v-slot:label>
                                                    <div class="caption">
                                                        Pregunta 3
                                                    </div>
                                                </template>
                                            </v-checkbox>
                                            <v-checkbox 
                                                color="info"
                                                v-model="columns"
                                                value="registerCode"
                                                :rules="columnsRules"
                                            >
                                                <template v-slot:label>
                                                    <div class="caption">
                                                        C&oacute;digo registro
                                                    </div>
                                                </template>
                                            </v-checkbox>
                                        </v-col>
                                    </v-row>
                                </v-container>
                    
                            </v-expansion-panel-content>
                        </v-expansion-panel>
                    </v-expansion-panels>
                </v-row>
            </v-form>
        </v-card-text> 

        <v-card-actions >
            <v-btn
                :disabled="!valid"
                color="light-blue darken-1"
                class="mx-auto body-2 white--text font-weight-bold py-5 rounded-xl px-6"
                @click="validate"
            >
                Descargar
            </v-btn>
        </v-card-actions>  
    </div>
</template>


<style scoped>
    .border1 {
        border: 1px solid red;
    }
</style>

<script>
export default {
    name: 'ColinaComponent',

    data: () => ({
        date: new Date().toISOString().substr(0, 10),
        valid: false,
        panel: [0],
        allColumns: true,
        modal: false,
        columns: [],
        dateRules: [
            v => (Array.isArray(v) && v.length > 1) || 'El rango de fechas es requerido'
        ],
    }),

    computed: {       

        columnsRules() {
            const rules = []

            if (!this.allColumns) {
                const rule = 
                    v => (this.columns.length > 0) || 'Requerido'

                rules.push(rule)
            }
          
            if (this.columns.length === 0) {
                const rule = v => (this.allColumns)
                rules.push(rule)
            }
            return rules
        }

    },

    methods: {

        validate () {
           this.$refs.form.validate()
        },

        checkAllColumn() {
            if (this.allColumns != !this.allColumns) {
                this.panel = []
                this.columns = []
            }
        }
    }
  
  }
</script>