<template>
  <div class="text-center">
    <v-container>
      <v-row justify="space-between">
        <v-col v-for="n in 4" :key="n" cols="auto">
          <v-card :elevation="3" height="100" width="250">
            <v-row class="fill-height" align="center" justify="center" v-text="n - 1"></v-row>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
    <v-progress-circular :size="50" color="primary" indeterminate></v-progress-circular>

    <v-progress-circular :width="3" color="red" indeterminate></v-progress-circular>

    <v-progress-circular :size="70" :width="7" color="purple" indeterminate></v-progress-circular>

    <v-progress-circular :width="3" color="green" indeterminate></v-progress-circular>

    <v-progress-circular :size="50" color="amber" indeterminate></v-progress-circular>
  </div>
</template>

<style scoped>
.v-progress-circular {
  margin: 1rem;
}
</style>