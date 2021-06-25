<template>
  <div :class="$vuetify.breakpoint.width <= 381 ? 'pa-3 ' : 'pa-12'">
    <v-card-title class="d-flex justify-center">
      <div>
        <h1
          class="
            text-center
            title
            font-weight-semibold
            blue-grey--text
            text--darken-4 text--accent-3
          "
        >
          Descarga de encuestas <strong>ECY Contry </strong>
        </h1>
        <div
          style="
            border-top: 5px solid #039be6;
            width: 70px;
            border-radius: 40px;
          "
          class="mx-auto"
        ></div>
      </div>
    </v-card-title>

    <v-card-subtitle class="pb-2">
      <div class="mt-6 caption text-center">
        <p>
          Realiza la descarga de las encuestas del
          <strong>ECY Contry</strong>
          a trav&eacute;s de este formulario.
        </p>
      </div>
    </v-card-subtitle>

    <v-card-text>
      <v-form ref="form" v-model="valid" lazy-validation>
        <v-row>
          <v-col cols="12" sm="12">
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
                <v-btn text color="primary" @click="modal = false">
                  Cancelar
                </v-btn>
                <v-btn text color="primary" @click="$refs.dialog.save(date)">
                  OK
                </v-btn>
              </v-date-picker>
            </v-dialog>
          </v-col>
          <v-container class="py-0 mt-n5">
            <v-checkbox
              v-model="allColumns"
              color="info"
              @click="checkAllColumn"
              :rules="columnsRules"
            >
              <template v-slot:label>
                <div class="caption">Seleccionar todos los campos</div>
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
              <v-expansion-panel-header class="caption">
                Campos
              </v-expansion-panel-header>
              <v-expansion-panel-content>
                <v-container fluid>
                  <v-row>
                    <v-col
                      cols="12"
                      sm="4"
                      md="4"
                      v-for="column in columnsLoad"
                      :key="column"
                    >
                      <v-checkbox
                        color="info"
                        v-model="columns"
                        :value="column"
                        :rules="columnsRules"
                      >
                        <template v-slot:label>
                          <div class="caption">
                            {{ column }}
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

    <v-card-actions>
      <downloadExcel
        :class="
          valid ? 'buttonDownload' : 'buttonDownload buttonDownloadCancel'
        "
        :fetch="validate"
        :before-finish="finishDownload"
        name="Country.xls"
      >
        Descargar
      </downloadExcel>
    </v-card-actions>
  </div>
</template>


<style scoped>
.buttonDownload {
  background-color: #029be6;
  padding: 12px 17px;
  text-transform: uppercase;
  margin: 0 auto;
  border-radius: 25px;
  cursor: pointer;
  font-weight: bold;
  color: #ffffff;
  box-shadow: 0px 6px 6px -3px rgba(0, 0, 0, 0.27);
}

.buttonDownloadCancel {
  background-color: #e0e0e0;
  color: #a5a5a5;
}
</style>

<script>
export default {
  name: "CountryComponent",

  data: () => ({
    date: new Date().toISOString().substr(0, 10),
    valid: false,
    panel: [0],
    allColumns: true,
    modal: false,
    columns: [],
    columnsLoad: [],
    data: [],
    dateRules: [
      (v) =>
        (Array.isArray(v) && v.length > 1) || "El rango de fechas es requerido",
    ],
  }),

  watch: {
    /*
     * asigna el valor del formulario
     * a la propiedad
     */
    validateForm: function (value) {
      this.valid = this.$refs.form.validate();
    },
  },

  computed: {
    /**
     * se encarga de las reglas de los checkbox
     */

    columnsRules() {
      const rules = [];

      if (!this.allColumns) {
        const rule = (v) => this.columns.length > 0 || "Requerido";

        rules.push(rule);
      }

      if (this.columns.length === 0) {
        const rule = (v) => this.allColumns;
        rules.push(rule);
      }
      return rules;
    },
  },

  methods: {
    finishDownload() {
      Vue.swal({
        icon: "success",
        title: "¡Tu descarga ha comenzado!",
        showConfirmButton: false,
        showCloseButton: false,
        allowOutsideClick: true,
        keydownListenerCapture: true,
        timer: 3000
      });
    },

    /**
     * valida el formulario y posteriormente
     * envia los datos
     */
    async validate() {
      if (this.$refs.form.validate()) {
        this.data.push(...this.date);
        this.data.push(this.allColumns);
        this.data.push(...this.columns);

        const response = await axios.post("/excelDownloadCountry", {
          data: this.data,
        });

        if (response.status == 200) {
          this.data = [];
        }

        if (response.data.length === 0) {
          Vue.swal({
            icon: "error",
            title: "Oops...",
            text: "¡No hay registros con ese rango de fechas!",
            showConfirmButton: false,
            showCloseButton: false,
            allowOutsideClick: true,
            keydownListenerCapture: true,
            timer: 3000
          });
        }
        return response.data;
      }
    },

    /**
     * si los campos y checkboxs son false el arreglo
     * y el panel se limpian
     */
    checkAllColumn() {
      if (this.allColumns != !this.allColumns) {
        this.panel = [];
        this.columns = [];
      }
    },

    /**
     * carga las columnas en el panel
     */
    loadAllColumns() {
      axios
        .get("/loadColumnsCountry")

        .then((response) => {
          [...(this.columnsLoad = response.data)];
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },

  mounted() {
    this.loadAllColumns();
  },
};
</script>