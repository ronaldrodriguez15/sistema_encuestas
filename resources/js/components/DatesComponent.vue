<template>
  <v-app>
    <v-main style="background-color: #f3f4f6">
      <v-container class="fill-height" fluid>
        <v-row align="center" justify="center">
          <v-col cols="12" sm="12" md="12">
            <v-card
              elevation="12"
              class="rounded-lg d-flex align-center justify-center pa-0"
            >
              <v-row no-gutters :style="{ height: height + 'px' }">
                <v-col
                  cols="12"
                  md="6"
                  class="
                    d-flex
                    align-center
                    flex-column
                    justify-center
                    text-center
                    pa-14
                  "
                >
                  <v-card-title>
                    <div>
                      <h1
                        class="
                          text-center
                          headline
                          font-weight-bold
                          blue-grey--text
                          text--darken-4 text--accent-3
                        "
                      >
                        Signin
                      </h1>
                      <div
                        style="
                          border-top: 5px solid #f44236;
                          width: 40px;
                          border-radius: 40px;
                        "
                        class="mx-auto"
                      ></div>
                    </div>
                  </v-card-title>
                  <v-card-text class="">
                    <v-form
                      color="deep-purple accent-4"
                      ref="form"
                      v-model="valid"
                      lazy-validation
                    >
                      <v-text-field
                        color="blue-grey darken-4"
                        v-model="email"
                        :rules="emailRules"
                        label="E-mail"
                        required
                      >
                      </v-text-field>

                      <v-text-field
                        color="blue-grey darken-4"
                        v-model="name"
                        :rules="passwordRules"
                        label="Password"
                        type="password"
                        required
                      >
                      </v-text-field>
                    </v-form>
                  </v-card-text>
                  <v-card-actions>
                    <v-btn
                      :disabled="!valid"
                      color="red"
                      class="
                        mr-4
                        white--text
                        font-weight-bold
                        py-6
                        rounded-xl
                        px-12
                      "
                      @click="validate"
                    >
                      sign up
                    </v-btn>
                  </v-card-actions>
                </v-col>
                <v-col
                  cols="12"
                  md="6"
                  :class="
                    $vuetify.breakpoint.width <= 767
                      ? 'small-border '
                      : 'normal-border'
                  "
                  class="
                    red
                    darken-1
                    order-md-first
                    d-flex
                    align-center
                    flex-column
                    justify-center
                    text-center
                  "
                >
                  <v-card-text class="white--text">
                    <h1
                      class="font-weight-bold"
                      :style="{
                        display: $vuetify.breakpoint.xs ? 'none' : 'block',
                      }"
                    >
                      Welcome Back!
                    </h1>
                    <p
                      class="text-md-body-1 mx-12"
                      :style="{
                        display: $vuetify.breakpoint.xs ? 'none' : 'block',
                      }"
                    >
                      To keep connected with us please login with your personal
                      info
                    </p>
                  </v-card-text>
                </v-col>
              </v-row>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>

<style scoped>
.normal-border {
  border-top-left-radius: 10px;
  border-bottom-left-radius: 10px;
}

.small-border {
  border-bottom-right-radius: 10px;
  border-bottom-left-radius: 10px;
}
</style>



<script>
export default {
  name: "LoginComponent",

  data() {
    return {
      valid: true,
      name: "",
      email: "",
      emailRules: [
        (v) => !!v || "e-mail is required",
        (v) => /.+@.+\..+/.test(v) || "The e-mail must be valid",
      ],
      passwordRules: [(v) => !!v || "password is required"],
    };
  },

  computed: {
    height() {
      switch (this.$vuetify.breakpoint.name) {
        case "xs":
          return 450;
        case "sm":
          return 500;
        case "md":
          return 500;
        case "lg":
          return 600;
        case "xl":
          return 600;
      }
    },
  },

  methods: {
    validate() {
      if (this.$refs.form.validate()) {
        if (this.email == "admin@mail.com" && this.name == "123456") {
          alert("happy!");
        } else {
          alert("not valid");
        }
      }
    },
  },
};
</script>