<template>

  <div class="col-md-8">
    <div class="card">
      <div class="card-header text-center">Coloca una descripción: </div>
      <div class="card-body">
        <form action="" id="formDates">
          <label for="age" class="form-label">Escribe aqui tu descripción: </label>
          <input type="text" class="form-control"/><br />
          <button type="submit" class="btn btn-success">enviar</button>
        </form>
      </div>
    </div>
  </div>

</template>

<script>

export default {
  mounted() {
    console.log("Form mounted.");
  },
};

</script>
